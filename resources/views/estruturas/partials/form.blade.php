<div class="row mb-4">
    <div class="form-group col-md-12">
        <label for="descricao">Descrição <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <input type="text" name="descricao" id="descricao" class="form-control" required
            value="{{ old('descricao', $estrutura->descricao ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="nome_fantasia">Nome Fantasia <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" required
            value="{{ old('nome_fantasia', $estrutura->nome_fantasia ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="nome_comercial">Nome Comercial <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <input type="text" name="nome_comercial" id="nome_comercial" class="form-control" required
            value="{{ old('nome_comercial', $estrutura->nome_comercial ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="nome_complementar">Nome Complementar <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <input type="text" name="nome_complementar" id="nome_complementar" class="form-control"
            value="{{ old('nome_complementar', $estrutura->nome_complementar ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="nome_reduzido">Nome Reduzido <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <input type="text" name="nome_reduzido" id="nome_reduzido" class="form-control"
            value="{{ old('nome_reduzido', $estrutura->nome_reduzido ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="nome_portal_diplomados">Nome Portal Diplomados</label>
        <input type="text" name="nome_portal_diplomados" id="nome_portal_diplomados" class="form-control"
            value="{{ old('nome_portal_diplomados', $estrutura->nome_portal_diplomados ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="cnpj">CNPJ <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <input type="text" name="cnpj" id="cnpj" class="form-control" required
            value="{{ old('cnpj', $estrutura->cnpj ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="inscricao_estadual">Inscrição Estadual</label>
        <input type="text" name="inscricao_estadual" id="inscricao_estadual" class="form-control"
            value="{{ old('inscricao_estadual', $estrutura->inscricao_estadual ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="inscricao_municipal">Inscrição Municipal</label>
        <input type="text" name="inscricao_municipal" id="inscricao_municipal" class="form-control"
            value="{{ old('inscricao_municipal', $estrutura->inscricao_municipal ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="telefone">Fone</label>
        <input type="text" name="telefone" id="telefone" class="form-control"
            value="{{ old('telefone', $estrutura->telefone ?? '') }}">
    </div>
    <div class="form-group col-md-6">
        <label for="status">Status<sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <select name="status" id="status" class="form-control" required>
            <option value="Ativo" {{ old('status', $estrutura->status ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo
            </option>
            <option value="Inativo" {{ old('status', $estrutura->status ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo
            </option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="modelo_negocio">Modelo de Negócio <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
        <select name="modelo_negocio" id="modelo_negocio" class="form-control" required>
            <option value="GRADUAÇÃO" {{ old('modelo_negocio', $estrutura->modelo_negocio ?? '') == 'GRADUAÇÃO' ? 'selected' : '' }}>GRADUAÇÃO
            </option>
            <option value="PÓS-GRADUAÇÃO" {{ old('modelo_negocio', $estrutura->modelo_negocio ?? '') == 'PÓS-GRADUAÇÃO' ? 'selected' : '' }}>PÓS-GRADUAÇÃO
            </option>
        </select>
    </div>
</div>