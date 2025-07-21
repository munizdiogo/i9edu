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
        'id_convenio',
        'status',
        'quantidade_maxima',
        'criar_convenio_pagador',
        'validar_matricula_ativa',
        'id_plano_conta',
        'id_estrutura',
    ];

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'id_convenio');
    }

    public function planoConta()
    {
        return $this->belongsTo(PlanoConta::class, 'id_plano_conta');
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
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}
