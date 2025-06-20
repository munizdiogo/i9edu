<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descricao',
        'nome_reduzido',
        'ordem',
        'status',
        'prox_modulo_id'
    ];

    public function proxModulo()
    {
        return $this->belongsTo(Modulo::class, 'prox_modulo_id');
    }

    public function modulosSeguintes()
    {
        return $this->hasMany(Modulo::class, 'prox_modulo_id');
    }
}