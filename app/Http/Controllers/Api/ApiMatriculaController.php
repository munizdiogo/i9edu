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
            ->join('turmas', 'id_turma', '=', 'turmas.id')
            ->join('grade_disciplinas_matrizes', 'turmas.id_matriz_curricular', '=', 'grade_disciplinas_matrizes.id_matriz_curricular')
            ->join('disciplinas', 'grade_disciplinas_matrizes.id_disciplina', '=', 'disciplinas.id')
            ->get(['disciplinas.id', 'disciplinas.descricao']);

        return response()->json($disciplinas);
    }
}
