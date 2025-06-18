@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Recuperar Senha')

@section('auth_body')
    @if(session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Seu email" value="{{ old('email') }}" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="row">
            <div class="col-12"><button type="submit" class="btn btn-primary btn-block">Enviar link de recuperação</button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <p class="my-0"><a href="{{ route('login') }}">Voltar ao login</a></p>
@endsection