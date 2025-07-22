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
        'prox_id_modulo',
        'id_estrutura',
    ];

    public function proxModulo()
    {
        return $this->belongsTo(Modulo::class, 'prox_id_modulo');
    }

    public function modulosSeguintes()
    {
        return $this->hasMany(Modulo::class, 'prox_id_modulo');
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