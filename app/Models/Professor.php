<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = "professores";

    protected $fillable = [
        'id',
        'funcionario_id',
        'graduacao',
        'titulacao_principal',
        'tipo_docente',
        'regime_trabalho',
        'situacao_docente',
        'id_inep',
        'registro_docente',
        'nis',
        'tipo_ensino_medio',
        'pos_graduacao',
        'tipo_contrato',
        'tipo_vinculo',
        'cod_urania',
        'atuacao_formacao_especifica',
        'atuacao_pesquisa',
        'atuacao_extensao',
        'atuacao_grad_presencial',
        'atuacao_pos_grad_presencial',
        'atuacao_gestao_plano',
        'atuacao_grad_distancia',
        'atuacao_pos_grad_distancia',
        'atuacao_bolsa_pesquisa',
        'id_estrutura',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
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