<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiberacaoCupomCurso extends Model
{
    protected $table = 'liberacoes_cupons_curso';

    protected $fillable = [
        'cupom_id',
        'curso_id',
        'quantidade_disponivel'
    ];

    public function cupom()
    {
        return $this->belongsTo(Cupom::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
