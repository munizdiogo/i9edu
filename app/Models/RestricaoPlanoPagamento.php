<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestricaoPlanoPagamento extends Model
{
    protected $table = 'restricoes_plano_pagamento';

    protected $fillable = [
        'id_plano_pagamento',
        'modalidade',
        'id_estrutura',
    ];

    // Relacionamentos
    public function plano()
    {
        return $this->belongsTo(PlanoPagamento::class, 'id_plano_pagamento');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'restricao_plano_pagamento_curso', 'restricao_id', 'id_curso');
    }
    public function polos()
    {
        return $this->belongsToMany(Polo::class, 'restricao_plano_pagamento_polo', 'restricao_id', 'id_polo');
    }
    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'restricao_plano_pagamento_turma', 'restricao_id', 'id_turma');
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