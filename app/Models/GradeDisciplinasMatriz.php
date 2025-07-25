<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeDisciplinasMatriz extends Model
{
    use HasFactory;

    protected $table = 'grade_disciplinas_matrizes';

    protected $fillable = [
        'id_matriz_curricular',
        'id_disciplina',
        'id_estrutura',
    ];

    public function matrizCurricular()
    {
        return $this->belongsTo(MatrizCurricular::class, 'id_matriz_curricular');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'id_disciplina');
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