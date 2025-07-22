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
        // 'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
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
