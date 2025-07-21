<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'modalidade',
        'tipo_financiamento',
        'plano_conta_id',
        'valor',
        'tipo',
        'perde_convenio',
        'status',
        'pagamento_ate',
        'dia_limite',
        'tipo_vencimento',
        'inicio',
        'fim',
        'instrucao_bancaria',
        'id_estrutura',
    ];

    public function planoConta()
    {
        return $this->belongsTo(PlanoConta::class, 'plano_conta_id');
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
