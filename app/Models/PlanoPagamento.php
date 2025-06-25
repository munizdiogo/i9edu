<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanoPagamento extends Model
{
    protected $table = 'planos_pagamento';

    protected $fillable = [
        'nome',
        'disponivel_todos_cursos',
        'permite_cupom',
    ];

    public function parcelas()
    {
        return $this->hasMany(ParcelaPlanoPagamento::class, 'plano_pagamento_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_plano_pagamento');
    }

    public function polos()
    {
        return $this->belongsToMany(Polo::class, 'polo_plano_pagamento');
    }
}
