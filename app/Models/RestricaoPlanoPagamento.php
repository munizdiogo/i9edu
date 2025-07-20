<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestricaoPlanoPagamento extends Model
{
    protected $table = 'restricoes_plano_pagamento';

    protected $fillable = [
        'id_plano_pagamento',
        'modalidade',
    ];

    // Relacionamentos
    public function plano()
    {
        return $this->belongsTo(PlanoPagamento::class, 'id_plano_pagamento');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'restricao_plano_pagamento_curso', 'restricao_id', 'curso_id');
    }
    public function polos()
    {
        return $this->belongsToMany(Polo::class, 'restricao_plano_pagamento_polo', 'restricao_id', 'polo_id');
    }
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'restricao_plano_pagamento_turma', 'restricao_id', 'turma_id');
    }
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('restricoes_plano_pagamento.id_estrutura', session('estrutura_id'));
            }
        });
    }

}