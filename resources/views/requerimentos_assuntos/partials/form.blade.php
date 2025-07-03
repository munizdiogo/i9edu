@csrf
<div class="form-group">
    <label for="descricao">Descrição *</label>
    <input type="text" name="descricao" class="form-control"
        value="{{ old('descricao', $requerimento_assunto->descricao ?? '') }}" required>
</div>

<div class="form-group">
    <label for="id_requerimento_departamento">Requerimento Departamento</label>
    <select name="id_requerimento_departamento" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($departamentos as $departamento)
            <option value="{{ $departamento->id }}" {{ old('id_requerimento_departamento', $requerimento_assunto->id_requerimento_departamento ?? '') == $departamento->id ? 'selected' : '' }}>
                {{ $departamento->descricao }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tipo">Tipo de Assunto *</label>
    <select name="tipo" class="form-control" required>
        <option value="">Selecione</option>
        <option value="POLO" {{ old('tipo', $requerimento_assunto->tipo ?? '') == 'POLO' ? 'selected' : '' }}>POLO
        </option>
        <option value="ALUNO" {{ old('tipo', $requerimento_assunto->tipo ?? '') == 'ALUNO' ? 'selected' : '' }}>ALUNO
        </option>
        <option value="TODOS" {{ old('tipo', $requerimento_assunto->tipo ?? '') == 'TODOS' ? 'selected' : '' }}>TODOS
        </option>
    </select>
</div>

<div class="form-group">
    <label for="observacoes">Observações</label>
    <textarea name="observacoes"
        class="form-control">{{ old('observacoes', $requerimento_assunto->observacoes ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="prazo_maximo">Prazo Máximo (dias) *</label>
    <input type="number" name="prazo_maximo" class="form-control"
        value="{{ old('prazo_maximo', $requerimento_assunto->prazo_maximo ?? '') }}" required>
</div>

<div class="form-group">
    <label for="quantidade_gratuita">Quantidade de Solicitações Gratuitas</label>
    <input type="number" name="quantidade_gratuita" class="form-control"
        value="{{ old('quantidade_gratuita', $requerimento_assunto->quantidade_gratuita ?? '') }}">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" step="0.01" name="valor" class="form-control"
        value="{{ old('valor', $requerimento_assunto->valor ?? '') }}">
    <div class="form-check mt-1">
        <input class="form-check-input" type="checkbox" name="sem_valor" id="sem_valor" {{ old('sem_valor', $requerimento_assunto->sem_valor ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="sem_valor">Sem Valor</label>
    </div>
</div>

<div class="form-group">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="permite_portal" id="permite_portal" {{ old('permite_portal', $requerimento_assunto->permite_portal ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="permite_portal">Permite Solicitações pelos Portais</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="bloquear_inadimplente" id="bloquear_inadimplente" {{ old('bloquear_inadimplente', $requerimento_assunto->bloquear_inadimplente ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="bloquear_inadimplente">Bloquear Solicitação para Inadimplentes</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="nao_permitir_se_existir" id="nao_permitir_se_existir" {{ old('nao_permitir_se_existir', $requerimento_assunto->nao_permitir_se_existir ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="nao_permitir_se_existir">Não permitir abrir novo protocolo caso já exista
            uma Solicitação</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="obrigatorio_anexo" id="obrigatorio_anexo" {{ old('obrigatorio_anexo', $requerimento_assunto->obrigatorio_anexo ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="obrigatorio_anexo">Obrigatório anexar arquivo</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="nao_visualizar_portal" id="nao_visualizar_portal" {{ old('nao_visualizar_portal', $requerimento_assunto->nao_visualizar_portal ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="nao_visualizar_portal">Não visualizar nos portais</label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" name="nao_vincular_matricula" id="nao_vincular_matricula" {{ old('nao_vincular_matricula', $requerimento_assunto->nao_vincular_matricula ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="nao_vincular_matricula">Não vincular com a Matrícula</label>
    </div>
</div>

<div class="form-group">
    <label for="status">Status *</label>
    <select name="status" class="form-control" required>
        <option value="Ativo" {{ old('status', $requerimento_assunto->status ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo
        </option>
        <option value="Inativo" {{ old('status', $requerimento_assunto->status ?? '') == 'Inativo' ? 'selected' : '' }}>
            Inativo</option>
    </select>
</div>