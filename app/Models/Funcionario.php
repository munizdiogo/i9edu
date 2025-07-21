<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = "funcionarios";

    protected $fillable = [
        'codigo',
        'id_perfil',
        'nome_conjuge',
        'fone_conjuge',
        'nr_dependentes',
        'email_empresa',
        'senha_email',
        'status',
        'data_admissao',
        'data_demissao',
        'setor_id',
        'funcao_id',
        'nr_folha',
        'nr_horas_mes',
        'tipo_contrato',
        'id_estrutura',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }

    // relation with Professor, if necessário
    public function professor()
    {
        return $this->hasOne(Professor::class, 'funcionario_id');
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