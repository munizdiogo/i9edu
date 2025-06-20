<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_curso_admissao_id',
        'turma_id',
        'contrato_id',
        'data_matricula',
        'data_ocorrencia',
        'status',
    ];

    public function admissao()
    {
        return $this->belongsTo(AlunoCursoAdmissao::class, 'aluno_curso_admissao_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}