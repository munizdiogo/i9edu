<form action="{{ isset($perfil) ? route('perfis.update', $perfil) : route('perfis.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    @if(isset($perfil)) @method('PUT') @endif

    <div class="card card-primary p-2">
        <div class="card-header">
            <h3 class="card-title">Dados Pessoais</h3>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Foto --}}
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <label>Foto</label><br>
                        <img src="{{ isset($perfil) && $perfil->photo_url ? asset($perfil->photo_url) : asset('images/sem-foto-perfil.jpg') }}"
                            class="img-fluid mb-2" />
                        <div class="custom-file">
                            <input type="file" name="photo" class="custom-file-input" id="photo">
                            <label class="custom-file-label" for="photo">Escolher...</label>
                        </div>
                    </div>
                </div>

                {{-- Informações Básicas --}}
                <div class="col-md-10">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Código</label>
                            <input type="text" class="form-control" value="{{ $perfil->id ?? '---' }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tipode Cadastro</label>
                            <select name="tipo_cadastro" id="tipo_cadastro" class="form-control" required>
                                <option value="fisica" {{ (old('tipo_cadastro', $perfil->tipo_cadastro ?? '') == 'fisica') ? 'selected' : '' }}>Pessoa Física</option>
                                <option value="juridica" {{ (old('tipo_cadastro', $perfil->tipo_cadastro ?? '') == 'juridica') ? 'selected' : '' }}>Pessoa Jurídica</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail" value="{{ old('email', $perfil->email ?? '') }}" required>
                            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    {{-- Campos Pessoa Física --}}
                    <div id="fields-fisica" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nome Civil</label>
                                <input type="text" name="nome" class="form-control"
                                    value="{{ old('nome', $perfil->nome ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control"
                                    value="{{ old('sobrenome', $perfil->sobrenome ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nome Social</label>
                                <input type="text" name="social_name" class="form-control"
                                    value="{{ old('social_name', $perfil->social_name ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>CPF</label>
                                <input type="text" id="cpf" name="cpf" class="form-control"
                                    value="{{ old('cpf', $perfil->cpf ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>RG</label>
                                <input type="text" name="id" name="rg" class="form-control"
                                    value="{{ old('rg', $perfil->rg ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Órgão Exp.</label>
                                <input type="text" name="orgao_expedidor" class="form-control"
                                    value="{{ old('orgao_expedidor', $perfil->orgao_expedidor ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>UF Exp.</label>
                                <input type="text" name="uf_expedidor" class="form-control"
                                    value="{{ old('uf_expedidor', $perfil->uf_expedidor ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Data Nasc.</label>
                                <input type="date" name="data_nascimento" class="form-control"
                                    value="{{ old('data_nascimento', $perfil->data_nascimento ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control">
                                    <option value="M" {{ old('sexo', $perfil->sexo ?? '') == 'M' ? 'selected' : '' }}>
                                        Masculino</option>
                                    <option value="F" {{ old('sexo', $perfil->sexo ?? '') == 'F' ? 'selected' : '' }}>
                                        Feminino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Estado Civil</label>
                                <select name="estado_civil" class="form-control">
                                    <option value="solteiro">Solteiro(a)</option>
                                    <option value="casado">Casado(a)</option>
                                    <option value="divorciado">Divorciado(a)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Passaporte</label>
                                <input type="text" name="passaporte" class="form-control"
                                    value="{{ old('passaporte', $perfil->passaporte ?? '') }}">
                            </div>
                        </div>
                    </div>

                    {{-- Campos Pessoa Jurídica --}}
                    <div id="fields-juridica" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Razão Social</label>
                                <input type="text" name="razao_social" class="form-control"
                                    value="{{ old('razao_social', $perfil->razao_social ?? '') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nome Fantasia</label>
                                <input type="text" name="nome_fantasia" class="form-control"
                                    value="{{ old('nome_fantasia', $perfil->nome_fantasia ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>CNPJ</label>
                                <input type="text" id="cnpj" name="cnpj" class="form-control"
                                    value="{{ old('cnpj', $perfil->cnpj ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Inscr. Est.</label>
                                <input type="text" name="inscricao_estadual" class="form-control"
                                    value="{{ old('inscricao_estadual', $perfil->inscricao_estadual ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Inscr. Municipal</label>
                                <input type="text" name="inscricao_municipal" class="form-control"
                                    value="{{ old('inscricao_municipal', $perfil->inscricao_municipal ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Endereço Principal --}}
    <div class="card card-secondary p-2">
        <div class="card-header">
            <h3 class="card-title">Endereço Principal</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>CEP</label>
                    <input type="text" id="cep" name="cep" class="form-control"
                        value="{{ old('cep', $perfil->cep ?? '') }}">
                </div>
                <div class="form-group col-md-6">
                    <label>Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro" class="form-control"
                        value="{{ old('logradouro', $perfil->logradouro ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Número</label>
                    <input type="text" id="numero" name="numero" class="form-control"
                        value="{{ old('numero', $perfil->numero ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Complemento</label>
                    <input type="text" id="complemento" name="complemento" class="form-control"
                        value="{{ old('complemento', $perfil->complemento ?? '') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="form-control"
                        value="{{ old('bairro', $perfil->bairro ?? '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Cidade</label>
                    <input type="text" id="cidade" name="cidade" class="form-control"
                        value="{{ old('cidade', $perfil->cidade ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>UF</label>
                    <input type="text" id="uf" name="uf" class="form-control"
                        value="{{ old('uf', $perfil->uf ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>País</label>
                    <input type="text" id="pais" name="pais" class="form-control"
                        value="{{ old('pais', $perfil->pais ?? '') }}">
                </div>

            </div>
        </div>
    </div>

    {{-- Contato --}}
    <div class="card card-info p-2">
        <div class="card-header">
            <h3 class="card-title">Contato</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>DDI</label>
                    <input type="text" id="ddi" name="ddi" class="form-control"
                        value="{{ old('ddi', $perfil->ddi ?? '') }}" placeholder="+55">
                </div>
                <div class="form-group col-md-2">
                    <label>Fone</label>
                    <input type="text" id="fone" name="fone" class="form-control"
                        value="{{ old('fone', $perfil->fone ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Celular</label>
                    <input type="text" id="celular" name="celular" class="form-control"
                        value="{{ old('celular', $perfil->celular ?? '') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Fax</label>
                    <input type="text" id="fax" name="fax" class="form-control"
                        value="{{ old('fax', $perfil->fax ?? '') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Fone Comercial</label>
                    <input type="text" id="fone_comercial" name="fone_comercial" class="form-control"
                        value="{{ old('fone_comercial', $perfil->fone_comercial ?? '') }}">
                </div>
            </div>
        </div>
    </div>

    @if(!str_contains(Route::current()->getName(), 'show'))
        <div class="mt-3 text-right pb-5">
            <a href="{{ route('perfis.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    @endif
</form>

{{-- Script para toggle de campos PF/PJ --}}
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


    <script>
        function toggleType() {
            const tipo_cadastro = $('#tipo_cadastro').val();
            $('#fields-fisica').toggle(tipo_cadastro === 'fisica');
            $('#fields-juridica').toggle(tipo_cadastro === 'juridica');
        }

        $(document).ready(function () {
            toggleType();
            $('#tipo_cadastro').change(toggleType);
            bsCustomFileInput.init();
        });
    </script>

    {{-- CONSULTA CEP E FAZENDO AUTO PREENCHIMENTO DOS CAMPOS --}}
    <script>
        document.getElementById('cep').addEventListener('blur', function () {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) {
                alert('CEP inválido!');
                return;
            }

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado!');
                        return;
                    }

                    // Preencher os campos
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.localidade || '';
                    document.getElementById('uf').value = data.uf || '';
                    document.getElementById('pais').value = 'Brasil';
                })
                .catch(() => alert('Erro ao buscar CEP'));
        });
    </script>

    {{-- APLICANDO MÁSCARAS NOS CAMPOS --}}
    <script>
        $(document).ready(function () {
            $('#cep').mask('00000-000');
            $('#cpf').mask('000.000.000-00', { reverse: true });
            $('#cnpj').mask('00.000.00/0000-00', { reverse: true });
            $('#rg').mask('00.000.000-0', { reverse: true });
            $('#ddi').mask('+00');
            $('#celular').mask('(00) 00000-0000');
            $('#fone').mask('(00) 0000-0000');
        });
    </script>
@endsection