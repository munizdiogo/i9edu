<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizCurricular extends Model
{
    use HasFactory;
    protected $table = 'matrizes_curriculares';
    protected $fillable = [
        'nome',
        'nome_reduzido',
        'id_curso',
        'id_centro_custo',
        'habilitacao',
        'data_habilitacao',
        'status',
        'modalidade',
        'id_inep',
        'data_curriculo',
        'tipo_horas_atividades',
        'min_hr_aula',
        'creditos',
        'carga_horaria',
        'ch_teorica',
        'ch_presencial',
        'ch_ativ_exigidas',
        'ch_ativ_extensao',
        'ch_itinerario',
        'ch_tcc',
        'ch_estagio',
        'ch_pratica',
        'ch_ead',
        'media_periodo',
        'media_minima',
        'freq_periodo',
        'media_recuperacao',
        'media_minima_rec',
        'freq_recuperacao',
        'nota_minima',
        'nota_maxima',
        'prazo_em',
        'prazo_inicial',
        'prazo_maximo',
        'periodicidade',
        'possivel_trancar_1periodo',
        'id_estrutura',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
    public function gradeDisciplinas()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
    public function centroCusto()
    {
        return $this->belongsTo(Polo::class, 'id_centro_custo');
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