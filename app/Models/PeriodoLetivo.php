<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoLetivo extends Model
{
    use HasFactory;

    protected $table = 'periodos_letivos';
    protected $fillable = [
        'descricao',
        'nome_impressao',
        'data_inicio',
        'data_termino',
        'ano',
        'dias_letivos',
        'tipo',
        'semestre',
        'periodo_especial',
        'periodo_atual',
        'situacao',
        'id_estrutura',
    ];

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('id_estrutura', session('estrutura_id'));
            }
        });
    }

}
