<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoCursoAdmissao extends Model
{
    use HasFactory;

    protected $table = 'alunos_curso_admissao';

    protected $fillable = [
        'id_aluno',
        'id_matriz_curricular',
        'campus_id_polo',
        'periodo_letivo_ingresso_id',
        'turma_base_id',
        'edital_processo_seletivo_id',
        'data_ingresso',
        'data_inicio_curso',
        'data_conclusao',
        'periodo_conclusao',
        'turno',
        'numero_matricula',
        'forma_ingresso_id',
        'instituicao_id',
        'classificacao',
        'pontos',
        'vagas',
        'numero_chamada',
        'data_vestibular',
        'procedencia_escola_publica',
        'nota_redacao',
        'observacao',
        'data_estagio',
        'horas_estagio',
        'instituicao_transferencia_id',
        'status',
        'id_estrutura',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
    public function matriz()
    {
        return $this->belongsTo(MatrizCurricular::class, 'id_matriz_curricular');
    }
    public function polo()
    {
        return $this->belongsTo(Polo::class, 'campus_id_polo');
    }
    public function periodo()
    {
        return $this->belongsTo(PeriodoLetivo::class, 'periodo_letivo_ingresso_id');
    }
    public function turmaBase()
    {
        return $this->belongsTo(Turma::class, 'turma_base_id');
    }
    public function edital()
    {
        return $this->belongsTo(EditalProcessoSeletivo::class, 'edital_processo_seletivo_id');
    }
    // outros relacionamentos: formaIngresso, instituicao, instituicaoTransferencia...
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}