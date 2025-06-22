<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MatrizCaptacao extends Model
{
    protected $table = 'matriz_captacao';
    protected $fillable = ['nome', 'descricao', 'status'];
    public function cursos()
    {
        return $this->hasMany(CursoMatrizCaptacao::class);
    }
    public function polos()
    {
        return $this->hasMany(PoloMatrizCaptacao::class);
    }
}