<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiberacaoCupomPolo extends Model
{
    protected $table = 'liberacoes_cupons_polos';

    protected $fillable = [
        'cupom_id',
        'polo_id',
        'quantidade_disponivel'
    ];

    public function cupom()
    {
        return $this->belongsTo(Cupom::class);
    }

    public function polo()
    {
        return $this->belongsTo(Polo::class);
    }
}