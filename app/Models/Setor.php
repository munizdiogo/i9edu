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
        'funcionario_responsavel_id',
        'status',
    ];

    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_responsavel_id');
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