<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequerimentoSolicitacao extends Model
{
    // use SoftDeletes;

    protected $table = 'requerimentos_solicitacoes';

    protected $fillable = [
        'id_aluno',
        'id_matricula',
        'id_polo',
        'id_assunto',
        'id_curso',
        'id_status',
        'observacao',
        'descricao_anexos',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'id_matricula');
    }

    public function polo()
    {
        return $this->belongsTo(Polo::class, 'id_polo');
    }

    public function assunto()
    {
        return $this->belongsTo(RequerimentoAssunto::class, 'id_assunto');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function status()
    {
        return $this->belongsTo(RequerimentoStatus::class, 'id_status');
    }

    // public function anexos()
    // {
    //     return $this->hasMany(RequerimentoAnexo::class, 'id_requerimento_solicitacao');
    // }

    // public function interacoes()
    // {
    //     return $this->hasMany(RequerimentoInteracao::class, 'id_requerimento_solicitacao');
    // }
}
