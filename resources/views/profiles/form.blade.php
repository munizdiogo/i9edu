@section('content_header')
    <h1>{{ isset($profile) ? 'Editar Perfil' : 'Novo Perfil' }}</h1>
@endsection
@section('content')
<form action="{{ isset($profile) ? route('profiles.update', $profile) : route('profiles.store') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    @if(isset($profile)) @method('PUT') @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados Pessoais</h3>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Foto --}}
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <label>Foto</label><br>
                        <img src="{{ isset($profile) && $profile->photo_url ? asset($profile->photo_url) : asset('images/sem-foto-perfil.jpg') }}"
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
                            <input type="text" class="form-control" value="{{ $profile->id ?? '---' }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tipo</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="fisica" {{ (old('type', $profile->type ?? '') == 'fisica') ? 'selected' : '' }}>Pessoa Física</option>
                                <option value="juridica" {{ (old('type', $profile->type ?? '') == 'juridica') ? 'selected' : '' }}>Pessoa Jurídica</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail" value="{{ old('email', $profile->email ?? '') }}" required>
                            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    {{-- Campos Pessoa Física --}}
                    <div id="fields-fisica" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nome Civil</label>
                                <input type="text" name="nome" class="form-control"
                                    value="{{ old('nome', $profile->nome ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Sobrenome</label>
                                <input type="text" name="sobrenome" class="form-control"
                                    value="{{ old('sobrenome', $profile->sobrenome ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Nome Social</label>
                                <input type="text" name="social_name" class="form-control"
                                    value="{{ old('social_name', $profile->social_name ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>CPF</label>
                                <input type="text" name="cpf" class="form-control"
                                    value="{{ old('cpf', $profile->cpf ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>RG</label>
                                <input type="text" name="rg" class="form-control"
                                    value="{{ old('rg', $profile->rg ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Órgão Exp.</label>
                                <input type="text" name="orgao_expedidor" class="form-control"
                                    value="{{ old('orgao_expedidor', $profile->orgao_expedidor ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>UF Exp.</label>
                                <input type="text" name="uf_expedidor" class="form-control"
                                    value="{{ old('uf_expedidor', $profile->uf_expedidor ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Data Nasc.</label>
                                <input type="date" name="data_nascimento" class="form-control"
                                    value="{{ old('data_nascimento', $profile->data_nascimento ?? '') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control">
                                    <option value="M" {{ old('sexo', $profile->sexo ?? '') == 'M' ? 'selected' : '' }}>
                                        Masculino</option>
                                    <option value="F" {{ old('sexo', $profile->sexo ?? '') == 'F' ? 'selected' : '' }}>
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
                                    value="{{ old('passaporte', $profile->passaporte ?? '') }}">
                            </div>
                        </div>
                    </div>

                    {{-- Campos Pessoa Jurídica --}}
                    <div id="fields-juridica" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Razão Social</label>
                                <input type="text" name="razao_social" class="form-control"
                                    value="{{ old('razao_social', $profile->razao_social ?? '') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nome Fantasia</label>
                                <input type="text" name="nome_fantasia" class="form-control"
                                    value="{{ old('nome_fantasia', $profile->nome_fantasia ?? '') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>CNPJ</label>
                                <input type="text" name="cnpj" class="form-control"
                                    value="{{ old('cnpj', $profile->cnpj ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Inscr. Est.</label>
                                <input type="text" name="inscricao_estadual" class="form-control"
                                    value="{{ old('inscricao_estadual', $profile->inscricao_estadual ?? '') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Inscr. Municipal</label>
                                <input type="text" name="inscricao_municipal" class="form-control"
                                    value="{{ old('inscricao_municipal', $profile->inscricao_municipal ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Endereço Principal --}}
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Endereço Principal</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Logradouro</label>
                    <input type="text" name="logradouro" class="form-control"
                        value="{{ old('logradouro', $profile->logradouro ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Número</label>
                    <input type="text" name="numero" class="form-control"
                        value="{{ old('numero', $profile->numero ?? '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>CEP</label>
                    <input type="text" name="cep" class="form-control" value="{{ old('cep', $profile->cep ?? '') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Cidade</label>
                    <input type="text" name="cidade" class="form-control"
                        value="{{ old('cidade', $profile->cidade ?? '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Bairro</label>
                    <input type="text" name="bairro" class="form-control"
                        value="{{ old('bairro', $profile->bairro ?? '') }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Complemento</label>
                    <input type="text" name="complemento" class="form-control"
                        value="{{ old('complemento', $profile->complemento ?? '') }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Contato --}}
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Contato</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>DDI</label>
                    <input type="text" name="ddi" class="form-control" value="{{ old('ddi', $profile->ddi ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Fone</label>
                    <input type="text" name="fone" class="form-control" value="{{ old('fone', $profile->fone ?? '') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Celular</label>
                    <input type="text" name="celular" class="form-control"
                        value="{{ old('celular', $profile->celular ?? '') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Fax</label>
                    <input type="text" name="fax" class="form-control" value="{{ old('fax', $profile->fax ?? '') }}">
                </div>
                <div class="form-group col-md-3">
                    <label>Fone Comercial</label>
                    <input type="text" name="fone_comercial" class="form-control"
                        value="{{ old('fone_comercial', $profile->fone_comercial ?? '') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-right">
            <a href="{{ route('profiles.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

{{-- Script para toggle de campos PF/PJ --}}
@section('js')
    <script>
        function toggleType() {
            const type = $('#type').val();
            $('#fields-fisica').toggle(type === 'fisica');
            $('#fields-juridica').toggle(type === 'juridica');
        }
        $(document).ready(function () {
            toggleType();
            $('#type').change(toggleType);
            bsCustomFileInput.init();
        });
    </script>
@endsection