<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'graduacao_id',
        'titulacao_principal_id',
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
        'atuacao_bolsa_pesquisa'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
    public function graduacao()
    {
        return $this->belongsTo(Graduacao::class);
    }
    public function titulacaoPrincipal()
    {
        return $this->belongsTo(Titulacao::class, 'titulacao_principal_id');
    }
}