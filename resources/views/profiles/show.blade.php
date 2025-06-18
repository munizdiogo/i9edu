@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <h1 class="d-inline">Detalhes do Perfil</h1>
    <a href="{{ route('profiles.index') }}" class="btn btn-secondary float-right">Voltar</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                <!-- Dados Pessoais -->
                <div class="row">
                    <div class="col-md-2 text-center">
                        <img src="{{ $profile->photo_url
        ? asset('storage/' . $profile->photo_url)
        : asset('images/sem-foto-perfil.jpg') }}" class="img-fluid mb-2" />
                    </div>
                    <div class="col-md-10">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Código</label>
                                <input type="text" class="form-control" value="{{ $profile->id }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tipo</label>
                                <input type="text" class="form-control" value="{{ $profile->type == 'fisica'
        ? 'Pessoa Física'
        : 'Pessoa Jurídica' }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $profile->email }}">
                            </div>
                        </div>

                        @if($profile->type == 'fisica')
                            <!-- Campos para Pessoa Física -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nome Civil</label>
                                    <input type="text" class="form-control" value="{{ $profile->nome }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sobrenome</label>
                                    <input type="text" class="form-control" value="{{ $profile->sobrenome }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nome Social</label>
                                    <input type="text" class="form-control" value="{{ $profile->social_name }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" value="{{ $profile->cpf }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>RG</label>
                                    <input type="text" class="form-control" value="{{ $profile->rg }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Órgão Exp.</label>
                                    <input type="text" class="form-control" value="{{ $profile->orgao_expedidor }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>UF Exp.</label>
                                    <input type="text" class="form-control" value="{{ $profile->uf_expedidor }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Data Nasc.</label>
                                    <input type="text" class="form-control"
                                        value="{{ optional($profile->data_nascimento)->format('d/m/Y') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control"
                                        value="{{ $profile->sexo == 'M' ? 'Masculino' : 'Feminino' }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estado Civil</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($profile->estado_civil) }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Passaporte</label>
                                    <input type="text" class="form-control" value="{{ $profile->passaporte }}">
                                </div>
                            </div>
                        @else
                            <!-- Campos para Pessoa Jurídica -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Razão Social</label>
                                    <input type="text" class="form-control" value="{{ $profile->razao_social }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nome Fantasia</label>
                                    <input type="text" class="form-control" value="{{ $profile->nome_fantasia }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control" value="{{ $profile->cnpj }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Inscr. Est.</label>
                                    <input type="text" class="form-control" value="{{ $profile->inscricao_estadual }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Inscr. Municipal</label>
                                    <input type="text" class="form-control" value="{{ $profile->inscricao_municipal }}">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <hr>

                <!-- Endereço Principal -->
                <h5>Endereço Principal</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Logradouro</label>
                        <input type="text" class="form-control" value="{{ $profile->logradouro }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Número</label>
                        <input type="text" class="form-control" value="{{ $profile->numero }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>CEP</label>
                        <input type="text" class="form-control" value="{{ $profile->cep }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Cidade</label>
                        <input type="text" class="form-control" value="{{ $profile->cidade }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bairro</label>
                        <input type="text" class="form-control" value="{{ $profile->bairro }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Complemento</label>
                        <input type="text" class="form-control" value="{{ $profile->complemento }}">
                    </div>
                </div>

                <hr>

                <!-- Contato -->
                <h5>Contato</h5>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>DDI</label>
                        <input type="text" class="form-control" value="{{ $profile->ddi }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fone</label>
                        <input type="text" class="form-control" value="{{ $profile->fone }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Celular</label>
                        <input type="text" class="form-control" value="{{ $profile->celular }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fax</label>
                        <input type="text" class="form-control" value="{{ $profile->fax }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fone Comercial</label>
                        <input type="text" class="form-control" value="{{ $profile->fone_comercial }}">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection