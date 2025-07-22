<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = "setores";

    protected $fillable = [
        'codigo',
        'descricao',
        'tipo',
        'email',
        'id_funcionario_responsavel',
        'status',
        'id_estrutura',
    ];

    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario_responsavel');
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