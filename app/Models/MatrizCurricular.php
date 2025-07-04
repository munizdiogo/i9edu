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
        'curso_id',
        'centro_custo_id',
        'habilitacao',
        'data_habilitacao',
        'status',
        'modalidade',
        'inep_id',
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
        'possivel_trancar_1periodo'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
    public function gradeDisciplinas()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
    public function centroCusto()
    {
        return $this->belongsTo(Polo::class, 'centro_custo_id');
    }
}