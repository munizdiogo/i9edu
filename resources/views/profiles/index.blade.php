{{-- resources/views/profiles/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1 class="d-inline">Perfis</h1>
    <a href="{{ route('profiles.create') }}" class="btn btn-success float-right">
        Novo Perfil
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome/Razão</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->type == 'fisica' ? 'Física' : 'Jurídica' }}</td>
                            <td>
                                @if($p->type == 'fisica')
                                    {{ $p->nome }} {{ $p->sobrenome }}
                                @else
                                    {{ $p->razao_social }}
                                @endif
                            </td>
                            <td>{{ $p->email }}</td>
                            <td>
                                <a href="{{ route('profiles.show', $p) }}" class="btn btn-xs btn-primary">Ver</a>
                                <a href="{{ route('profiles.edit', $p) }}" class="btn btn-xs btn-warning">Editar</a>
                                <form action="{{ route('profiles.destroy', $p) }}" method="post" class="d-inline"
                                    onsubmit="return confirm('Confirma exclusão?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-xs btn-danger">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $profiles->links() }}
        </div>
    </div>
@endsection