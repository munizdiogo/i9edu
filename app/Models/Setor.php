<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descricao',
        'tipo',
        'email',
        'funcionario_responsavel_id',
        'status',
    ];

    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_responsavel_id');
    }
}