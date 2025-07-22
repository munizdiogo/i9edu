<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CursoMatrizCaptacao extends Model
{
    protected $table = 'cursos_matriz_captacao';
    protected $fillable = [
        'id_matriz_captacao',
        'id_curso',
        'status',
        'modalidade',
        'quantidade_vagas',
        'id_estrutura',
    ];
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function matriz()
    {
        return $this->belongsTo(MatrizCaptacao::class, 'id_matriz_captacao');
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