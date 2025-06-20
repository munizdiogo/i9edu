<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtapaPeriodoLetivo extends Model
{
    use HasFactory;

    protected $table = 'etapas_periodos_letivos';

    protected $fillable = [
        'codigo',
        'descricao',
        'status',
        'periodo_letivo_id'
    ];

    public function periodoLetivo()
    {
        return $this->belongsTo(PeriodoLetivo::class);
    }
}