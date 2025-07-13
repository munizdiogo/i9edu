<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_perfil',
        'id_curso',
        'id_matricula',
        'id_turma',
        'id_periodo_letivo',
        'id_plano_pagamento',
        'descricao',
        'status',
        'data_aceite',
        'data_inicio_vigencia',
        'data_fim_vigencia',
        'cancelado_por',
        'observacao'
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'id_matricula');
    }
    public function turma()
    {
        return $this->belongsTo(Turma::class, 'id_turma');
    }
    public function periodoLetivo()
    {
        return $this->belongsTo(PeriodoLetivo::class, 'id_periodo_letivo');
    }
    public function planoPagamento()
    {
        return $this->belongsTo(PlanoPagamento::class, 'id_plano_pagamento');
    }
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('id_estrutura', session('estrutura_id'));
            }
        });
    }
}