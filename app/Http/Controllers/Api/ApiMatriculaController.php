<?php
namespace App\Http\Controllers\Api;

use App\Models\Matricula;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class ApiMatriculaController
{
    public function disciplinas($id)
    {
        // Supondo que a tabela de vínculo seja matricula_disciplinas
        // $disciplinas = Disciplina::whereHas('matriculas', function ($query) use ($id) {
        //     $query->where('id_matricula', $id);
        // })

        $query = Matricula::with(['turma']);
        $disciplinas = $query
            ->join('turmas', 'turma_id', '=', 'turmas.id')
            ->join('grade_disciplinas_matrizes', 'turmas.matriz_curricular_id', '=', 'grade_disciplinas_matrizes.matriz_curricular_id')
            ->join('disciplinas', 'grade_disciplinas_matrizes.id_disciplina', '=', 'disciplinas.id')
            ->get(['disciplinas.id', 'disciplinas.descricao']);

        return response()->json($disciplinas);
    }
}
