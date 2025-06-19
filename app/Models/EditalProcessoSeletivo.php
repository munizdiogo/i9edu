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
        'periodo_letivo_id',
        'data_inicio',
        'data_fim',
        'visivel_ate',
        'modalidade',
        'status',
        'nota_minima_enade',
        'enade_ano_inicio',
        'enade_ano_fim'
    ];

    public function periodoLetivo()
    {
        return $this->belongsTo(PeriodoLetivo::class, 'periodo_letivo_id');
    }
}