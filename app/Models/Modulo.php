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
        'prox_modulo_id',
        'id_estrutura',
    ];

    public function proxModulo()
    {
        return $this->belongsTo(Modulo::class, 'prox_modulo_id');
    }

    public function modulosSeguintes()
    {
        return $this->hasMany(Modulo::class, 'prox_modulo_id');
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