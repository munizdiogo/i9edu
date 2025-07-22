<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcelaPlanoPagamento extends Model
{
    protected $table = 'parcelas_plano_pagamento';

    protected $fillable = [
        'id_plano_pagamento',
        'descricao',
        'quantidade_parcelas',
        'valor',
        'calculo_vencimento',
        'tipo_parcela',
        'id_estrutura',
    ];

    public function plano()
    {
        return $this->belongsTo(PlanoPagamento::class, 'id_plano_pagamento');
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
