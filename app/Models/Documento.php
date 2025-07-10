<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'titulo',
        'nome_exibicao',
        'status',
        'tipo',
        'template_path',
        'usar_jasper',
        'permitir_docx',
        'obrigatorio_informar_data',
        'processar_historico_disciplinas'
    ];

    protected static function booted()
    {
        static::addGlobalScope('estrutura', function ($query) {
            if (session('estrutura_id')) {
                $query->where('id_estrutura', session('estrutura_id'));
            }
        });
    }

}