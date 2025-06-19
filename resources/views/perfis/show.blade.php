@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <h1 class="d-inline">Detalhes do Perfil</h1>
    <a href="{{ route('perfis.index') }}" class="btn btn-secondary float-right">Voltar</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                <!-- Dados Pessoais -->
                <div class="row">
                    <div class="col-md-2 text-center">
                        <img src="{{ $perfil->photo_url
        ? asset('storage/' . $perfil->photo_url)
        : asset('images/sem-foto-perfil.jpg') }}" class="img-fluid mb-2" />
                    </div>
                    <div class="col-md-10">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Código</label>
                                <input type="text" class="form-control" value="{{ $perfil->id }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tipo de Cadastro</label>
                                <input type="text" class="form-control" value="{{ $perfil->tipo_cadastro == 'fisica'
        ? 'Pessoa Física'
        : 'Pessoa Jurídica' }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $perfil->email }}">
                            </div>
                        </div>

                        @if($perfil->tipo_cadastro == 'fisica')
                            <!-- Campos para Pessoa Física -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nome Civil</label>
                                    <input type="text" class="form-control" value="{{ $perfil->nome }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Sobrenome</label>
                                    <input type="text" class="form-control" value="{{ $perfil->sobrenome }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nome Social</label>
                                    <input type="text" class="form-control" value="{{ $perfil->social_name }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" value="{{ $perfil->cpf }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>RG</label>
                                    <input type="text" class="form-control" value="{{ $perfil->rg }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Órgão Exp.</label>
                                    <input type="text" class="form-control" value="{{ $perfil->orgao_expedidor }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>UF Exp.</label>
                                    <input type="text" class="form-control" value="{{ $perfil->uf_expedidor }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Data Nasc.</label>
                                    <input type="text" class="form-control"
                                        value="{{ optional($perfil->data_nascimento)->format('d/m/Y') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Sexo</label>
                                    <input type="text" class="form-control"
                                        value="{{ $perfil->sexo == 'M' ? 'Masculino' : 'Feminino' }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estado Civil</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($perfil->estado_civil) }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Passaporte</label>
                                    <input type="text" class="form-control" value="{{ $perfil->passaporte }}">
                                </div>
                            </div>
                        @else
                            <!-- Campos para Pessoa Jurídica -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Razão Social</label>
                                    <input type="text" class="form-control" value="{{ $perfil->razao_social }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nome Fantasia</label>
                                    <input type="text" class="form-control" value="{{ $perfil->nome_fantasia }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control" value="{{ $perfil->cnpj }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Inscr. Est.</label>
                                    <input type="text" class="form-control" value="{{ $perfil->inscricao_estadual }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Inscr. Municipal</label>
                                    <input type="text" class="form-control" value="{{ $perfil->inscricao_municipal }}">
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
                        <input type="text" class="form-control" value="{{ $perfil->logradouro }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Número</label>
                        <input type="text" class="form-control" value="{{ $perfil->numero }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>CEP</label>
                        <input type="text" class="form-control" value="{{ $perfil->cep }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Cidade</label>
                        <input type="text" class="form-control" value="{{ $perfil->cidade }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bairro</label>
                        <input type="text" class="form-control" value="{{ $perfil->bairro }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Complemento</label>
                        <input type="text" class="form-control" value="{{ $perfil->complemento }}">
                    </div>
                </div>

                <hr>

                <!-- Contato -->
                <h5>Contato</h5>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>DDI</label>
                        <input type="text" class="form-control" value="{{ $perfil->ddi }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fone</label>
                        <input type="text" class="form-control" value="{{ $perfil->fone }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Celular</label>
                        <input type="text" class="form-control" value="{{ $perfil->celular }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fax</label>
                        <input type="text" class="form-control" value="{{ $perfil->fax }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fone Comercial</label>
                        <input type="text" class="form-control" value="{{ $perfil->fone_comercial }}">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection