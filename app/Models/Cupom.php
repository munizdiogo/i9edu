<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    use HasFactory;

    protected $table = "cupons";

    protected $fillable = [
        'codigo',
        'descricao',
        'data_inicio',
        'data_fim',
        'convenio_id',
        'status',
        'quantidade_maxima',
        'criar_convenio_pagador',
        'validar_matricula_ativa',
        'plano_conta_id'
    ];

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id');
    }

    public function planoConta()
    {
        return $this->belongsTo(PlanoConta::class, 'plano_conta_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'liberacoes_cupons_curso')
            ->withPivot('quantidade_disponivel')
            ->withTimestamps();
    }

    public function polos()
    {
        return $this->belongsToMany(Polo::class, 'liberacoes_cupons_polos')
            ->withPivot('quantidade_disponivel')
            ->withTimestamps();
    }
}
