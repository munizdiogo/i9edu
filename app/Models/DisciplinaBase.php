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
        'id_area_conhecimento',
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
        'id_area_avaliacao',
        'id_estrutura',
    ];

    public function areaConhecimento()
    {
        return $this->belongsTo(AreaConhecimento::class, 'id_area_conhecimento');
    }

    public function areaAvaliacao()
    {
        return $this->belongsTo(AreaConhecimento::class, 'id_area_avaliacao');
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