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
        // 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
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
