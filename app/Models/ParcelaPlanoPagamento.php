<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcelaPlanoPagamento extends Model
{
    protected $table = 'parcelas_plano_pagamento';

    protected $fillable = [
        'plano_pagamento_id',
        'descricao',
        'quantidade_parcelas',
        'valor',
        'calculo_vencimento',
        'tipo_parcela',
        'id_estrutura',
    ];

    public function plano()
    {
        return $this->belongsTo(PlanoPagamento::class, 'plano_pagamento_id');
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
