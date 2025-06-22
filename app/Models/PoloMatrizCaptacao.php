<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PoloMatrizCaptacao extends Model
{
    protected $table = 'polos_matriz_captacao';
    protected $fillable = ['matriz_captacao_id', 'polo_id', 'status', 'quantidade_vagas'];
    public function polo()
    {
        return $this->belongsTo(Polo::class);
    }
    public function matriz()
    {
        return $this->belongsTo(MatrizCaptacao::class, 'matriz_captacao_id');
    }
}