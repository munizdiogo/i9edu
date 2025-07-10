<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Estrutura extends Model
{
    protected $fillable = [
        'descricao',
        'status',
        'nome_fantasia',
        'nome_comercial',
        'nome_complementar',
        'nome_reduzido',
        'nome_portal_diplomados',
        'cnpj',
        'inscricao_estadual',
        'inscricao_municipal',
        'fone',
        'modelo_negocio'
    ];
}