<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoConta extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'sigla',
        'nivel',
        'ordem',
        'tipo_resultado',
        'operacao',
        'eh_dre',
        'mensalidade',
        'apresentar_relatorio',
    ];
}