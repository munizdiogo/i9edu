<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    protected $table = 'turmas';
    protected $fillable = [
        'id_matriz_curricular',
        'periodo_letivo_id',
        'turma_base_id',
        'centro_custo_id',
        'professor_responsavel_id',
        'nome',
        'nome_reduzido',
        'descricao',
        'identificador',
        'parecer_descricao',
        'turno',
        'status',
        'media_periodo',
        'media_minima',
        'freq_periodo',
        'media_recuperacao',
        'media_minima_rec',
        'nota_minima',
        'nota_maxima',
        'ne_nota_exame',
        'nf_nota_final',
        'cidade',
        'data_inicio',
        'data_termino',
        'formato_venda',
        'inep_id',
        'seguro_escolar',
        'fech_diario',
        'data_limite_matriculas',
        'data_abono_faltas',
        'observacoes',
        'nucleo_comum',
        'acesso_biblioteca',
        'acesso_blackboard',
        'atendimento_online',
        'id_estrutura',
    ];

    // Relacionamentos
    public function matrizCurricular()
    {
        return $this->belongsTo(MatrizCurricular::class, 'id_matriz_curricular');
    }
    public function periodoLetivo()
    {
        return $this->belongsTo(PeriodoLetivo::class, 'periodo_letivo_id');
    }
    public function turmaBase()
    {
        return $this->belongsTo(Turma::class, 'turma_base_id');
    }
    public function centroCusto()
    {
        return $this->belongsTo(Polo::class, 'centro_custo_id');
    }
    public function professorResponsavel()
    {
        return $this->belongsTo(Perfil::class, 'professor_responsavel_id');
    }
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('turmas.id_estrutura', session('id_estrutura'));
            }
        });
    }

}
