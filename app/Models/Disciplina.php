<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_disciplina_base',
        'etapa_id_periodo_letivo',
        'id_modulo',
        'descricao',
        'nome_reduzido',
        'modalidade',
        'id_professor_padrao',
        'codigo_mec',
        'codigo_inep',
        'id_area_conhecimento',
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
        'id_area_avaliacao',
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
        return $this->belongsTo(DisciplinaBase::class, 'id_disciplina_base');
    }

    public function etapa()
    {
        return $this->belongsTo(EtapaPeriodoLetivo::class, 'etapa_id_periodo_letivo');
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'id_professor_padrao');
    }

    public function areaConhecimento()
    {
        return $this->belongsTo(AreaConhecimento::class, 'id_area_conhecimento');
    }

    public function areaAvaliacao()
    {
        return $this->belongsTo(AreaConhecimento::class, 'id_area_avaliacao');
    }

    // public function matriculas()
    // {
    //     return $this->belongsToMany(Matricula::class, 'matricula_disciplinas');
    // }

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}