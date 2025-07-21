<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;


    protected $table = 'transacoes';

    protected $fillable = [
        'id_matricula',
        'id_pagador',
        'id_contrato',
        'id_plano_pagamento',
        'id_convenio',
        'id_plano_conta',
        'id_parcela_plano_pagamento',
        'descricao',
        'tipo_ref',
        'referencia',
        'data_emissao',
        'data_vencimento',
        'data_pagamento',
        'valor',
        'valor_pago',
        'descontos',
        'encargos',
        'devedor',
        'pago',
        'pago_enc',
        'situacao',
        'origem',
        'nf',
        'ac',
        'status',
        'competencia',
        'dre',
        'mensalidade',
        'relatorio',
        'id_estrutura',
    ];

    // Relacionamentos principais
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'id_matricula');
    }
    public function pagador()
    {
        return $this->belongsTo(Perfil::class, 'id_pagador');
    }
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato');
    }
    public function planoPagamento()
    {
        return $this->belongsTo(PlanoPagamento::class, 'id_plano_pagamento');
    }
    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'id_convenio');
    }
    public function planoConta()
    {
        return $this->belongsTo(PlanoConta::class, 'id_plano_conta');
    }
    public function parcelaPlanoPagamento()
    {
        return $this->belongsTo(ParcelaPlanoPagamento::class, 'id_parcela_plano_pagamento');
    }

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('transacoes.id_estrutura', session('estrutura_id'));
            }
        });
    }
}
