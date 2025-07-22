<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_aluno_curso_admissao',
        'id_turma',
        'id_contrato',
        'data_matricula',
        'data_ocorrencia',
        'status',
        'id_estrutura',
    ];

    public function admissao()
    {
        return $this->belongsTo(AlunoCursoAdmissao::class, 'id_aluno_curso_admissao');
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
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}