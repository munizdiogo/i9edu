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
}