<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequerimentoAssunto extends Model
{
    use HasFactory;

    protected $table = 'requerimentos_assuntos';

    protected $fillable = [
        'descricao',
        'valor',
        'status',
        'prazo_maximo_resolucao',
        'quantidade_gratuita',
        'permite_portal',
        'visualizar_portal',
        'bloquear_inadimplente',
        'vincular_matricula',
        'nao_permitir_se_existe',
        'obrigatorio_anexo',
        'observacoes',
        'tipo_assunto',
        'id_requerimento_status',
        'id_requerimento_departamento',
        'id_estrutura',
    ];

    protected $casts = [
        'permite_portal' => 'boolean',
        'visualizar_portal' => 'boolean',
        'bloquear_inadimplente' => 'boolean',
        'vincular_matricula' => 'boolean',
        'nao_permitir_se_existe' => 'boolean',
        'obrigatorio_anexo' => 'boolean',
    ];

    public function status()
    {
        return $this->belongsTo(RequerimentoStatus::class, 'id_requerimento_status');
    }

    public function departamento()
    {
        return $this->belongsTo(RequerimentoDepartamento::class, 'id_requerimento_departamento');
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
