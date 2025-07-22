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
        'id_gestor',
        'id_gestor_faturamento',
        'id_supervisor',
        'data_contrato_inicio',
        'data_contrato_termino',
        'id_estrutura',
    ];

    public function gestor()
    {
        return $this->belongsTo(Perfil::class, 'id_gestor');
    }
    public function gestorFaturamento()
    {
        return $this->belongsTo(Perfil::class, 'id_gestor_faturamento');
    }
    public function supervisor()
    {
        return $this->belongsTo(Perfil::class, 'id_supervisor');
    }

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('polos.id_estrutura', session('id_estrutura'));
            }
        });
    }


}