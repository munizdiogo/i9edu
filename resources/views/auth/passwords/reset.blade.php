@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Redefinir Senha')

@section('auth_body')
    @if(session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                value="{{ $email ?? old('email') }}" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Nova senha" required>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a nova senha"
                required>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12"><button type="submit" class="btn btn-primary btn-block">Redefinir senha</button></div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <p class="my-0"><a href="{{ route('login') }}">Voltar ao login</a></p>
@endsection