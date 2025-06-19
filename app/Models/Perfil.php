<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfis';

    protected $fillable = [
        'tipo_cadastro',
        'nome',
        'sobrenome',
        'social_name',
        'data_nascimento',
        'cpf',
        'rg',
        'orgao_expedidor',
        'uf_expedidor',
        'passaporte',
        'sexo',
        'estado_civil',
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'inscricao_estadual',
        'inscricao_municipal',
        'email',
        'tipo_perfil',
        'photo_url',
        'logradouro',
        'numero',
        'cep',
        'cidade',
        'bairro',
        'complemento',
        'ddi',
        'fone',
        'celular',
        'fax',
        'fone_comercial'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    // Escopos
    public function scopeFisicas($query)
    {
        return $query->where('tipo_cadastro', 'fisica');
    }

    public function scopeJuridicas($query)
    {
        return $query->where('tipo_cadastro', 'juridica');
    }
}
