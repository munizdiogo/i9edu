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
    ];

    protected $casts = [
        'email_encaminhamento_aluno' => 'boolean',
        'email_encaminhamento_setor' => 'boolean',
        'permite_encaminhar' => 'boolean',
    ];
}
