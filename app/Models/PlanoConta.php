<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoConta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'descricao',
        'codigo',
        'operacao',
        'status',
        'tipo_conta',
        'grupo_conta_id',
        'natureza',
        'id_estrutura',
    ];

    public function grupoConta()
    {
        return $this->belongsTo(GrupoConta::class, 'grupo_conta_id');
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
