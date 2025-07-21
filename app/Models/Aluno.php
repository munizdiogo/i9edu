<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_perfil',
        'ra',
        'ra_est',
        'id_inep',
        'email_institucional',
        'cpf',
        'rg',
        'orgao_expedidor',
        'data_expedicao',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'nacionalidade',
        'naturalidade',
        'religiao',
        'telefone',
        'celular',
        'status',
        'id_estrutura',
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }

    public function admissao()
    {
        return $this->belongsTo(AlunoCursoAdmissao::class, 'id', 'id_aluno');
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
