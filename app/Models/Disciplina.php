<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'disciplina_base_id',
        'etapa_periodo_letivo_id',
        'id_modulo',
        'descricao',
        'nome_reduzido',
        'modalidade',
        'professor_padrao_id',
        'codigo_mec',
        'codigo_inep',
        'area_conhecimento_id',
        'ch_padrao',
        'ch_cobrada',
        'ch_teorica',
        'ch_pratica',
        'ch_corrida',
        'ch_extensao',
        'ch_presencial',
        'ch_ead',
        'qtd_aulas',
        'creditos',
        'utiliza_freq_resumida',
        'avaliacao',
        'tipo_avaliacao',
        'obrigatoriedade',
        'complementaridade',
        'area_avaliacao_id',
        'disciplina_tcc',
        'nao_apresentar_nota',
        'reprovar_por_frequencia',
        'nao_apresentar_frequencia',
        'nao_contabilizar_reprovacao',
        'nao_enviar_educacenso',
        'nao_validar_conflito',
        'nao_contar_minimo',
        'ter_cursado_pct',
        'id_estrutura',
    ];

    public function base()
    {
        return $this->belongsTo(DisciplinaBase::class, 'disciplina_base_id');
    }

    public function etapa()
    {
        return $this->belongsTo(EtapaPeriodoLetivo::class, 'etapa_periodo_letivo_id');
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_padrao_id');
    }

    public function areaConhecimento()
    {
        return $this->belongsTo(AreaConhecimento::class, 'area_conhecimento_id');
    }

    public function areaAvaliacao()
    {
        return $this->belongsTo(AreaConhecimento::class, 'area_avaliacao_id');
    }

    // public function matriculas()
    // {
    //     return $this->belongsToMany(Matricula::class, 'matricula_disciplinas');
    // }

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('id_estrutura', session('estrutura_id'));
            }
        });
    }

}