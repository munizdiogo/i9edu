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
        'id_periodo_letivo',
        'id_estrutura',
    ];

    public function periodoLetivo()
    {
        return $this->belongsTo(PeriodoLetivo::class);
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