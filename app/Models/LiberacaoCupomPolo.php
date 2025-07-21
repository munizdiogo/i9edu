<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiberacaoCupomPolo extends Model
{
    protected $table = 'liberacoes_cupons_polos';

    protected $fillable = [
        'id_cupom',
        'id_polo',
        'quantidade_disponivel',
        'id_estrutura',
    ];

    public function cupom()
    {
        return $this->belongsTo(Cupom::class);
    }

    public function polo()
    {
        return $this->belongsTo(Polo::class);
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