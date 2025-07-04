<?php

namespace App\Http\Controllers\Api;

use App\Models\Matricula;
use Illuminate\Http\Request;

class ApiAlunoController
{
    public function matriculas($id)
    {
        $query = Matricula::with(['admissao']);
        $matriculas = $query->get()
            ->map(function ($matricula) {
                return [
                    'id' => $matricula->id,
                    'descricao' => "{$matricula->admissao->matriz->curso->nome} - {$matricula->admissao->polo->nome}",
                ];
            });

        return response()->json($matriculas);
    }
}