<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $fillable = [
        'nome',
        'nome_impressao1',
        'nome_impressao2',
        'nome_impressao3',
        'nome_reduzido',
        'grau_academico',
        'status',
        'regime_funcionamento',
        'modalidade',
        'codigo_emec',
        'link_emec'
    ];

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('id_estrutura', session('estrutura_id'));
            }
        });
    }

}
