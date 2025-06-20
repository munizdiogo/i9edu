<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Matriz Curricular*</label>
            <select name="matriz_curricular_id" class="form-control select2bs4" required>
                <option value=""></option>
                @foreach($matrizes as $id => $nome)
                    <option value="{{ $id }}" {{ old('matriz_curricular_id', $grade_disciplinas_matrize->matriz_curricular_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Disciplina*</label>
            <select name="disciplina_id" class="form-control select2bs4" required>
                <option value=""></option>
                @foreach($disciplinas as $id => $nome)
                    <option value="{{ $id }}" {{ old('disciplina_id', $grade_disciplinas_matrize->disciplina_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>