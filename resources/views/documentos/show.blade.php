{{-- resources/views/documentos/show.blade.php --}}
@extends('adminlte::page')
@section('title', 'Visualizar Documento')
@section('content')
    <div class="card">
        <div class="card-header">Detalhes do Documento</div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $documento->id }}</p>
            <p><strong>Título:</strong> {{ $documento->titulo }}</p>
            <p><strong>Nome de Exibição:</strong> {{ $documento->nome_exibicao }}</p>
            <p><strong>Status:</strong> {{ $documento->status }}</p>
            <p><strong>Tipo:</strong> {{ $documento->tipo }}</p>
            <p><strong>Template:</strong>
                @if($documento->template_path)
                    <a href="{{ Storage::url($documento->template_path) }}" target="_blank">Download</a>
                @else
                    <span class="text-muted">Não enviado</span>
                @endif
            </p>
            <p><strong>Utiliza Jasper?</strong> {{ $documento->usar_jasper ? 'Sim' : 'Não' }}</p>
            <p><strong>Permite DOCX?</strong> {{ $documento->permitir_docx ? 'Sim' : 'Não' }}</p>
            <p><strong>Obrigatório informar data?</strong> {{ $documento->obrigatorio_informar_data ? 'Sim' : 'Não' }}</p>
            <p><strong>Processar histórico disciplinas?</strong>
                {{ $documento->processar_historico_disciplinas ? 'Sim' : 'Não' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('documentos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection