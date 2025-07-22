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
        'id_grupo_conta',
        'natureza',
        'id_estrutura',
    ];

    public function grupoConta()
    {
        return $this->belongsTo(GrupoConta::class, 'id_grupo_conta');
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
