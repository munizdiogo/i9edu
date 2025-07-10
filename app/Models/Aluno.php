<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'perfil_id',
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
        'status'
    ];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    public function admissao()
    {
        return $this->belongsTo(AlunoCursoAdmissao::class, 'id', 'aluno_id');
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
