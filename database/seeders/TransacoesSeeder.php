<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transacao;
use Carbon\Carbon;

class TransacoesSeeder extends Seeder
{
    public function run()
    {
        $alunos = [10001, 10002, 10003, 10004, 10005];
        $pagadores = [20001, 20002, 20003, 20004, 20005];
        $descricoes = [
            'Mensalidade Junho 2025',
            'Mensalidade Julho 2025',
            'Taxa de Material',
            'Renovação de Matrícula',
            'Mensalidade Agosto 2025',
            'Taxa de Prova',
            'Taxa de Biblioteca',
            'Mensalidade Setembro 2025',
            'Reemissão de Boleto',
            'Mensalidade Outubro 2025'
        ];

        for ($i = 0; $i < 10; $i++) {
            Transacao::create([
                'id_matricula' => $alunos[array_rand($alunos)],
                'id_pagador' => $pagadores[array_rand($pagadores)],
                'descricao' => $descricoes[$i],
                'competencia' => Carbon::now()->addMonths($i)->format('m/Y'),
                'data_vencimento' => Carbon::now()->addDays(30 + $i * 10),
                'valor' => rand(300, 1200),
                'valor_pago' => $i % 3 == 0 ? rand(300, 1200) : 0,
                'situacao' => $i % 3 == 0 ? 'PAGO' : 'ABERTO',
                'status' => 'ativo',
            ]);
        }
    }
}
