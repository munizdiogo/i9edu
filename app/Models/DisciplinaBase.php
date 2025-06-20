<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaBase extends Model
{
    use HasFactory;
    protected $table = 'disciplinas_base';

    protected $fillable = [
        'codigo',
        'status',
        'nome',
        'nome_reduzido',
        'area_conhecimento_id',
        'equivalencia_automatica',
        'ch_padrao',
        'ch_cobrada',
        'ch_teorica',
        'ch_corrida',
        'ch_extensao',
        'ch_presencial',
        'ch_ead',
        'ch_pratica',
        'creditos',
        'qtd_aulas',
        'avaliacao',
        'tipo_avaliacao',
        'obrigatoriedade',
        'complementaridade',
        'area_avaliacao_id'
    ];

    public function areaConhecimento()
    {
        return $this->belongsTo(AreaConhecimento::class, 'area_conhecimento_id');
    }

    public function areaAvaliacao()
    {
        return $this->belongsTo(AreaConhecimento::class, 'area_avaliacao_id');
    }
}