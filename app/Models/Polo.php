<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    use HasFactory;

    protected $table = 'polos';
    protected $fillable = [
        'nome',
        'nome_impressao',
        'email',
        'cidade',
        'logradouro',
        'bairro',
        'complemento',
        'link_maps',
        'sigla',
        'cnpj',
        'codigo_inep',
        'numero',
        'cep',
        'fones',
        'status',
        'tipo_unidade',
        'tipo_contrato',
        'perc_comissao',
        'nao_apresentar_atendimento',
        'data_ativacao',
        'data_inativacao',
        'gestor_id',
        'gestor_faturamento_id',
        'supervisor_id',
        'data_contrato_inicio',
        'data_contrato_termino'
    ];

    public function gestor()
    {
        return $this->belongsTo(Perfil::class, 'gestor_id');
    }
    public function gestorFaturamento()
    {
        return $this->belongsTo(Perfil::class, 'gestor_faturamento_id');
    }
    public function supervisor()
    {
        return $this->belongsTo(Perfil::class, 'supervisor_id');
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