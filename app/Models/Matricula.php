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

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function polo()
    {
        return $this->belongsTo(Polo::class);
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'matricula_disciplinas');
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