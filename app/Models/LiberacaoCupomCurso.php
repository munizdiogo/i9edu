<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiberacaoCupomCurso extends Model
{
    protected $table = 'liberacoes_cupons_curso';

    protected $fillable = [
        'id_cupom',
        'id_curso',
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
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}
