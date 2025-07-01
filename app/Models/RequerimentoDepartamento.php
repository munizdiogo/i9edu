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
}
