<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nome">Nome*</label>
        <input type="text" name="nome" id="nome" class="form-control" required
            value="{{ old('nome', $matriz->nome ?? '') }}" placeholder="Digite o nome da matriz">
    </div>
    <div class="form-group col-md-6">
        <label for="status">Status*</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Ativo" {{ old('status', $matriz->status ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
            <option value="Inativo" {{ old('status', $matriz->status ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo
            </option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control" rows="3"
        placeholder="Descrição opcional">{{ old('descricao', $matriz->descricao ?? '') }}</textarea>
</div>