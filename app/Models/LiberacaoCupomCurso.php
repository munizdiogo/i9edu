<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiberacaoCupomCurso extends Model
{
    protected $table = 'liberacoes_cupons_curso';

    protected $fillable = [
        'cupom_id',
        'curso_id',
        'quantidade_disponivel',
        'id_estrutura',
    ];

    public function cupom()
    {
        return $this->belongsTo(Cupom::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('id_estrutura', session('estrutura_id'));
            }
        });
    }

}
