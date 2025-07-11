<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleSeeder extends Seeder
{
    public function run()
    {
        // 1. Lista de fluxos/telas e suas collections
        $collections = [
            'estruturas' => 'Estruturas',
            'documentos' => 'Documentos',
            'grupo_contas' => 'Grupo de Contas',
            'plano_contas' => 'Plano de Contas',
            'convenios' => 'Convênios',
            'cupons' => 'Cupons',
            'liberacoes_cupons_curso' => 'Liberações Cupons Curso',
            'liberacoes_cupons_polos' => 'Liberações Cupons Polos',
            'planos_pagamento' => 'Planos de Pagamento',
            'parcelas_plano_pagamento' => 'Parcelas Plano de Pagamento',
            'cursos_plano_pagamento' => 'Cursos Plano de Pagamento',
            'polos_plano_pagamento' => 'Polos Plano de Pagamento',
            'restricoes_plano_pagamento' => 'Restrições Plano de Pagamento',
            'requerimentos_departamento' => 'Requerimentos Departamento',
            'requerimentos_assuntos' => 'Requerimentos Assuntos',
            'requerimentos_status' => 'Requerimentos Status',
            'requerimentos_solicitacoes' => 'Requerimentos Solicitações',
            'requerimentos_interacoes' => 'Requerimentos Interações',
            'requerimentos_anexos' => 'Requerimentos Anexos',
            'periodos_letivos' => 'Períodos Letivos',
            'funcionarios' => 'Funcionários',
            'perfis' => 'Perfis',
            'setores' => 'Setores',
            'funcoes' => 'Funções',
            'cursos' => 'Cursos',
            'matrizes_curriculares' => 'Matrizes Curriculares',
            'disciplinas' => 'Disciplinas',
            'modulos' => 'Módulos',
            'areas_conhecimento' => 'Áreas de Conhecimento',
            'usuarios' => 'Usuários',
            'roles' => 'Perfis de Acesso (Roles)',
        ];

        $actions = [
            'view' => 'Visualizar',
            'create' => 'Cadastrar',
            'edit' => 'Editar',
            'delete' => 'Excluir',
        ];

        $permissions = [];
        foreach ($collections as $slug => $label) {
            foreach ($actions as $action => $actionLabel) {
                $name = "$slug.$action";
                $permissions[] = [
                    'name' => $name,
                    'label' => $actionLabel . ' ' . $label,
                    'collection' => $label,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insere permissões, se ainda não existirem
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm['name']],
                $perm
            );
        }

        // 2. Cria role Administrador (todas as permissões)
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Administrador do Sistema']
        );
        $adminRole->permissions()->sync(Permission::pluck('id')->toArray());

        // 3. Exemplo: role Atendimento (apenas visualizar/cadastrar em requerimentos)
        $atendimentoPerms = Permission::whereIn('name', [
            'requerimentos_solicitacoes.view',
            'requerimentos_solicitacoes.create',
            'requerimentos_solicitacoes.edit',
            'requerimentos_solicitacoes.delete',
            'requerimentos_assuntos.view',
            'requerimentos_status.view',
        ])->pluck('id')->toArray();

        $roleAtendimento = Role::firstOrCreate(
            ['name' => 'atendimento'],
            ['description' => 'Equipe de Atendimento']
        );
        $roleAtendimento->permissions()->sync($atendimentoPerms);

        // 4. Exemplo: Comercial
        $roleComercial = Role::firstOrCreate(
            ['name' => 'comercial'],
            ['description' => 'Equipe Comercial']
        );
        $roleComercial->permissions()->sync([]); // Defina conforme necessário

        // Adicione quantos roles desejar!
    }
}