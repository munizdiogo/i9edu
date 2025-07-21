<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" name="descricao"
        value="{{ old('descricao', $requerimento_status->descricao ?? '') }}" required>
</div>

<div class="form-group">
    <label for="permite_encaminhar">Permite Encaminhar</label>
    <select name="permite_encaminhar" class="form-control">
        <option value="1" {{ old('permite_encaminhar', $requerimento_status->permite_encaminhar ?? '') == 1 ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ old('permite_encaminhar', $requerimento_status->permite_encaminhar ?? '') == 0 ? 'selected' : '' }}>Não</option>
    </select>
</div>

<div class="form-group">
    <label for="email_encaminhamento_id_aluno">E-mail Encaminhamento Aluno</label>
    <select name="email_encaminhamento_id_aluno" class="form-control">
        <option value="1" {{ old('email_encaminhamento_id_aluno', $requerimento_status->email_encaminhamento_id_aluno ?? '') == 1 ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ old('email_encaminhamento_id_aluno', $requerimento_status->email_encaminhamento_id_aluno ?? '') == 0 ? 'selected' : '' }}>Não</option>
    </select>
</div>

<div class="form-group">
    <label for="email_encaminhamento_id_setor">E-mail Encaminhamento Setor</label>
    <select name="email_encaminhamento_id_setor" class="form-control">
        <option value="1" {{ old('email_encaminhamento_id_setor', $requerimento_status->email_encaminhamento_id_setor ?? '') == 1 ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ old('email_encaminhamento_id_setor', $requerimento_status->email_encaminhamento_id_setor ?? '') == 0 ? 'selected' : '' }}>Não</option>
    </select>
</div>

<div class="form-group col-2">
    <label for="cor">Cor do Status</label>
    <input type="color" class="form-control" name="cor" id="cor"
        value="{{ old('cor', $requerimentoStatus->cor ?? '#000000') }}">
</div>



<div class="form-group">
    <label for="ativo">Status</label>
    <select name="ativo" class="form-control">
        <option value="1" {{ old('ativo', $requerimento_status->ativo ?? '') == 1 ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ old('ativo', $requerimento_status->ativo ?? '') == 0 ? 'selected' : '' }}>Inativo</option>
    </select>
</div>