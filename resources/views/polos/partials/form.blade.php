<form action="{{ isset($polo) ? route('polos.update', $polo) : route('polos.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    @if(isset($polo)) @method('PUT') @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados Gerais</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">Nome*</label>
                        <input type="text" id="nome" name="nome" value="{{ old('nome', $polo->nome ?? '') }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nome_impressao">Nome para Impressão</label>
                        <input type="text" id="nome_impressao" name="nome_impressao"
                            value="{{ old('nome_impressao', $polo->nome_impressao ?? '') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $polo->email ?? '') }}"
                            class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade*</label>
                            <input type="text" id="cidade" name="cidade"
                                value="{{ old('cidade', $polo->cidade ?? '') }}" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" id="logradouro" name="logradouro"
                                value="{{ old('logradouro', $polo->logradouro ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro"
                                value="{{ old('bairro', $polo->bairro ?? '') }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="complemento">Complemento</label>
                            <input type="text" id="complemento" name="complemento"
                                value="{{ old('complemento', $polo->complemento ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="link_maps">Link Maps</label>
                            <input type="url" id="link_maps" name="link_maps"
                                value="{{ old('link_maps', $polo->link_maps ?? '') }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sigla">Sigla</label>
                        <input type="text" id="sigla" name="sigla" value="{{ old('sigla', $polo->sigla ?? '') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" value="{{ old('cnpj', $polo->cnpj ?? '') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="codigo_inep">Cód. INEP</label>
                        <input type="text" id="codigo_inep" name="codigo_inep"
                            value="{{ old('codigo_inep', $polo->codigo_inep ?? '') }}" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="numero">Número</label>
                            <input type="text" id="numero" name="numero"
                                value="{{ old('numero', $polo->numero ?? '') }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cep">CEP*</label>
                            <input type="text" id="cep" name="cep" value="{{ old('cep', $polo->cep ?? '') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fones">Fones</label>
                        <input type="text" id="fones" name="fones" value="{{ old('fones', $polo->fones ?? '') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="ATIVO" {{ old('status', $polo->status ?? '') == 'ATIVO' ? 'selected' : '' }}>
                                ATIVO
                            </option>
                            <option value="INATIVO" {{ old('status', $polo->status ?? '') == 'INATIVO' ? 'selected' : '' }}>
                                INATIVO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Contrato e Gestão</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tipo_unidade">Tipo Unidade</label>
                    <select id="tipo_unidade" name="tipo_unidade" class="form-control">
                        <option value="Campus" {{ old('tipo_unidade', $polo->tipo_unidade ?? '') == 'Campus' ? 'selected' : '' }}>Campus</option>
                        <option value="Polo" {{ old('tipo_unidade', $polo->tipo_unidade ?? '') == 'Polo' ? 'selected' : '' }}>
                            Polo</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="tipo_contrato">Tipo Contrato</label>
                    <select id="tipo_contrato" name="tipo_contrato" class="form-control">
                        <option value="Exclusivo" {{ old('tipo_contrato', $polo->tipo_contrato ?? '') == 'Exclusivo' ? 'selected' : '' }}>Exclusivo</option>
                        <option value="Compartilhado" {{ old('tipo_contrato', $polo->tipo_contrato ?? '') == 'Compartilhado' ? 'selected' : '' }}>Compartilhado</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="perc_comissao">% Comissão</label>
                    <input type="text" id="perc_comissao" name="perc_comissao"
                        value="{{ old('perc_comissao', $polo->perc_comissao ?? '') }}" class="form-control">
                </div>
                <div class="form-group col-md-3 d-flex align-items-end">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="nao_apresentar_atendimento"
                            name="nao_apresentar_atendimento" {{ old('nao_apresentar_atendimento', $polo->nao_apresentar_atendimento ?? false) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="nao_apresentar_atendimento">Não apresentar no
                            atendimento</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_ativacao">Data Ativação</label>
                    <input type="date" id="data_ativacao" name="data_ativacao"
                        value="{{ old('data_ativacao', $polo->data_ativacao ?? '') }}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="data_inativacao">Data Inativação</label>
                    <input type="date" id="data_inativacao" name="data_inativacao"
                        value="{{ old('data_inativacao', $polo->data_inativacao ?? '') }}" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="data_contrato_inicio">Data Contrato Início</label>
                    <input type="date" id="data_contrato_inicio" name="data_contrato_inicio"
                        value="{{ old('data_contrato_inicio', $polo->data_contrato_inicio ?? '') }}"
                        class="form-control">
                </div>
                <div class="form-group col-md=3">
                    <label for="data_contrato_termino">Data Contrato Término</label>
                    <input type="date" id="data_contrato_termino" name="data_contrato_termino"
                        value="{{ old('data_contrato_termino', $polo->data_contrato_termino ?? '') }}"
                        class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="id_gestor">Gestor</label>
                    <select id="id_gestor" name="id_gestor" class="form-control select2bs4">
                        <option value="">-- selecione --</option>
                        @foreach($perfis as $perfil)
                            <option value="{{ $perfil->id }}" {{ old('id_gestor', $polo->id_gestor ?? '') == $perfil->id ? 'selected' : '' }}>
                                {{ $perfil->nome }} {{ $perfil->sobrenome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="gestor_faturamento_id">Gestor Faturamento</label>
                    <select id="gestor_faturamento_id" name="gestor_faturamento_id" class="form-control select2bs4">
                        <option value="">-- selecione --</option>
                        @foreach($perfis as $perfil)
                            <option value="{{ $perfil->id }}" {{ old('gestor_faturamento_id', $polo->gestor_faturamento_id ?? '') == $perfil->id ? 'selected' : '' }}>
                                {{ $perfil->nome }} {{ $perfil->sobrenome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="supervisor_id">Supervisor</label>
                    <select id="supervisor_id" name="supervisor_id" class="form-control select2bs4">
                        <option value="">-- selecione --</option>
                        @foreach($perfis as $perfil)
                            <option value="{{ $perfil->id }}" {{ old('supervisor_id', $polo->supervisor_id ?? '') == $perfil->id ? 'selected' : '' }}>
                                {{ $perfil->nome }} {{ $perfil->sobrenome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    @if(!str_contains(Route::current()->getName(), 'show'))
        <div class="mt-3 text-right pb-5">
            <a href="{{ route('polos.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    @endif
</form>

@push('js')
    <script>
        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                allowClear: true,
                placeholder: function () {
                    return $(this).data('placeholder');
                }
            });
        });
    </script>
@endpush