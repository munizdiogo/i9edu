<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequerimentoDepartamento extends Model
{
    protected $table = 'requerimentos_departamentos';

    protected $fillable = [
        'descricao',
        'status',
        'tipo',
        'id_estrutura',
        // 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
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
