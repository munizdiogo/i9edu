<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaConhecimento extends Model
{
    use HasFactory;
    protected $table = 'area_conhecimentos';

    protected $fillable = [
        'codigo',
        'descricao',
        'status',
        'id_estrutura',
    ];
    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('id_estrutura')) {
                $query->where('id_estrutura', session('id_estrutura'));
            }
        });
    }

}