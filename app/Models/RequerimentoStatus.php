<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequerimentoStatus extends Model
{
    use HasFactory;

    protected $table = 'requerimentos_status';

    protected $fillable = [
        'descricao',
        'cor',
        'status',
        'email_encaminhamento_aluno',
        'email_encaminhamento_setor',
        'permite_encaminhar',
        'id_estrutura',
    ];

    protected $casts = [
        'email_encaminhamento_aluno' => 'boolean',
        'email_encaminhamento_setor' => 'boolean',
        'permite_encaminhar' => 'boolean',
    ];
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}