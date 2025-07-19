<?php
namespace App\Http\Controllers;

use App\Models\GradeDisciplinasMatriz;
use App\Models\MatrizCurricular;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class GradeDisciplinasMatrizController extends Controller
{
    public function index()
    {
        return view('grade_disciplinas_matrizes.index');
    }

    public function data(Request $request)
    {
        $query = GradeDisciplinasMatriz::with(['matrizCurricular', 'disciplina']);
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->whereHas(
                'matrizCurricular',
                fn($q) =>
                $q->where('nome', 'like', "%{$search}%")
            )->orWhereHas(
                    'disciplina',
                    fn($q) =>
                    $q->where('nome', 'like', "%{$search}%")
                );
        }

        $filtered = $query->count();

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'matriz' => $item->matrizCurricular->nome,
                'disciplina' => $item->disciplina->descricao,
                'actions' => view('grade_disciplinas_matrizes.partials.actions', compact('item'))->render(),
            ]);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        $matrizes = MatrizCurricular::pluck('nome', 'id');
        $disciplinas = Disciplina::pluck('descricao', 'id');
        return view('grade_disciplinas_matrizes.create', compact('matrizes', 'disciplinas'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('estrutura_id');
        GradeDisciplinasMatriz::create($data);
        return redirect()->route('grade_disciplinas_matrizes.index')
            ->with('success', 'Vínculo criado!');
    }

    public function show(GradeDisciplinasMatriz $grade_disciplinas_matrize)
    {
        $matrizes = MatrizCurricular::pluck('nome', 'id');
        $disciplinas = Disciplina::pluck('descricao', 'id');
        return view('grade_disciplinas_matrizes.show', compact('grade_disciplinas_matrize', 'matrizes', 'disciplinas'));
    }

    public function edit(GradeDisciplinasMatriz $grade_disciplinas_matrize)
    {
        $matrizes = MatrizCurricular::pluck('nome', 'id');
        $disciplinas = Disciplina::pluck('descricao', 'id');
        return view('grade_disciplinas_matrizes.edit', compact('grade_disciplinas_matrize', 'matrizes', 'disciplinas'));
    }

    public function update(Request $request, GradeDisciplinasMatriz $grade_disciplinas_matrize)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('estrutura_id');
        $grade_disciplinas_matrize->update($data);
        return redirect()->route('grade_disciplinas_matrizes.index')
            ->with('success', 'Vínculo atualizado!');
    }

    public function destroy(GradeDisciplinasMatriz $grade_disciplinas_matrize)
    {
        $grade_disciplinas_matrize->delete();
        return redirect()->route('grade_disciplinas_matrizes.index')
            ->with('success', 'Vínculo removido!');
    }

    protected function validateData(Request $request, $origem = "create", $funcionario = null)
    {
        if ($origem == 'create') {
            $rules = [
                'matriz_curricular_id' => 'required|exists:matrizes_curriculares,id',
                'disciplina_id' => 'required|exists:disciplinas,id',
            ];

        } else {
            $rules = [
                'matriz_curricular_id' => 'required|exists:matrizes_curriculares,id',
                'disciplina_id' => 'required|exists:disciplinas,id',
            ];

        }

        return $request->validate($rules);
    }
}