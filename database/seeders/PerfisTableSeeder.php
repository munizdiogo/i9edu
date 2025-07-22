<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PerfisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inicializa o Faker para gerar dados em português do Brasil
        $faker = Faker::create('pt_BR');

        // Limpa a tabela antes de popular para evitar duplicatas em re-execuções
        DB::table('perfis')->truncate();

        // Loop para criar 20 registros
        for ($i = 0; $i < 20; $i++) {
            // Define aleatoriamente o tipo de cadastro (física ou jurídica)
            $tipoCadastro = $faker->randomElement(['fisica', 'juridica']);

            // Define aleatoriamente o tipo de perfil
            $tipoPerfil = $faker->randomElement(['aluno', 'docente', 'tecnico', 'parceiro', 'outro']);

            // Array base com dados comuns a ambos os tipos de cadastro
            $perfilData = [

                'tipo_cadastro' => $tipoCadastro,
                'email' => $faker->unique()->safeEmail,
                'tipo_perfil' => $tipoPerfil,
                'photo_url' => 'https://placehold.co/400x400/EBF4FF/76A9FA?text=Perfil',
                'cep' => $faker->postcode,
                'logradouro' => $faker->streetName,
                'numero' => $faker->buildingNumber,
                'complemento' => '',
                'bairro' => $faker->city, // Faker pode usar city para bairro
                'cidade' => $faker->city,
                'uf' => 'SP',
                'pais' => 'Brasil',
                'ddi' => '+55',
                'fone' => $faker->phoneNumber,
                'celular' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Adiciona dados específicos para Pessoa Física
            if ($tipoCadastro === 'fisica') {
                $perfilData = array_merge($perfilData, [
                    'nome' => $faker->firstName,
                    'sobrenome' => $faker->lastName,
                    'social_name' => null,
                    'data_nascimento' => $faker->date('Y-m-d', '2005-01-01'),
                    'cpf' => $faker->unique()->cpf(false), // Gera CPF sem formatação
                    'rg' => $faker->rg(false), // Gera RG sem formatação
                    'orgao_expedidor' => 'SSP',
                    'uf_expedidor' => 'SP',
                    'passaporte' => null,
                    'sexo' => $faker->randomElement(['M', 'F']),
                    'estado_civil' => $faker->randomElement(['solteiro', 'casado', 'divorciado']),
                    'razao_social' => null,
                    'nome_fantasia' => null,
                    'cnpj' => null,
                    'inscricao_estadual' => null,
                    'inscricao_municipal' => null,
                ]);
            }
            // Adiciona dados específicos para Pessoa Jurídica
            else {
                $perfilData = array_merge($perfilData, [
                    'nome' => null,
                    'sobrenome' => null,
                    'social_name' => null,
                    'data_nascimento' => null,
                    'cpf' => null,
                    'rg' => null,
                    'orgao_expedidor' => null,
                    'uf_expedidor' => null,
                    'passaporte' => null,
                    'sexo' => null,
                    'estado_civil' => null,
                    'razao_social' => $faker->company,
                    'nome_fantasia' => $faker->company,
                    'cnpj' => $faker->unique()->cnpj(false), // Gera CNPJ sem formatação
                    'inscricao_estadual' => $faker->numerify('###.###.###.###'),
                    'inscricao_municipal' => $faker->numerify('########'),
                ]);
            }

            // Insere o registro no banco de dados
            DB::table('perfis')->insert($perfilData);
        }
    }
}
