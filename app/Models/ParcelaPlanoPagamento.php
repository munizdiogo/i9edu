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
    ];

    public function plano()
    {
        return $this->belongsTo(PlanoPagamento::class, 'plano_pagamento_id');
    }


}
