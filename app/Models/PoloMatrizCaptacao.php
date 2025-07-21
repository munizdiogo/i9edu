<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PoloMatrizCaptacao extends Model
{
    protected $table = 'polos_matriz_captacao';
    protected $fillable = [
        'id_matriz_captacao',
        'id_polo',
        'status',
        'quantidade_vagas',
        'id_estrutura',
    ];
    public function polo()
    {
        return $this->belongsTo(Polo::class);
    }
    public function matriz()
    {
        return $this->belongsTo(MatrizCaptacao::class, 'id_matriz_captacao');
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