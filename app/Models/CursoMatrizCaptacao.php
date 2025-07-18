<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CursoMatrizCaptacao extends Model
{
    protected $table = 'cursos_matriz_captacao';
    protected $fillable = ['matriz_captacao_id', 'curso_id', 'status', 'modalidade', 'quantidade_vagas'];
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function matriz()
    {
        return $this->belongsTo(MatrizCaptacao::class, 'matriz_captacao_id');
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