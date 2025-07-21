<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Matriz Curricular*</label>
            <select name="id_matriz_curricular" class="form-control select2bs4" required>
                <option value=""></option>
                @foreach($matrizes as $id => $nome)
                    <option value="{{ $id }}" {{ old('id_matriz_curricular', $grade_disciplinas_matrize->id_matriz_curricular ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Disciplina*</label>
            <select name="id_disciplina" class="form-control select2bs4" required>
                <option value=""></option>
                @foreach($disciplinas as $id => $nome)
                    <option value="{{ $id }}" {{ old('id_disciplina', $grade_disciplinas_matrize->id_disciplina ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="mt-3 text-right pb-5">
        <a href="{{ route('grade_disciplinas_matrizes.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif