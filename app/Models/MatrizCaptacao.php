<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MatrizCaptacao extends Model
{
    protected $table = 'matriz_captacao';
    protected $fillable = [
        'nome',
        'descricao',
        'status',
        'id_estrutura',
    ];
    public function cursos()
    {
        return $this->hasMany(CursoMatrizCaptacao::class);
    }
    public function polos()
    {
        return $this->hasMany(PoloMatrizCaptacao::class);
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