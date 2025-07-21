<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditalProcessoSeletivo extends Model
{
    use HasFactory;

    protected $table = 'editais_processo_seletivo';

    protected $fillable = [
        'descricao',
        'id_periodo_letivo',
        'data_inicio',
        'data_fim',
        'visivel_ate',
        'modalidade',
        'status',
        'nota_minima_enade',
        'enade_ano_inicio',
        'enade_ano_fim',
        'id_estrutura',
    ];

    public function periodoLetivo()
    {
        return $this->belongsTo(PeriodoLetivo::class, 'id_periodo_letivo');
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