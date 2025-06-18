{{-- resources/views/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Dashboard - i9edu')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Dashboard</h1>
        <small>Bem-vindo, {{ Auth::user()->name }}!</small>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Card: Total de Cursos -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>00</h3>
                    <p>Total de Cursos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Card: Total de Alunos Matriculados -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>00</h3>
                    <p>Alunos Matriculados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Card: Turmas Ativas -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>00</h3>
                    <p>Turmas Ativas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Card: Vagas Disponíveis -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>00
                    </h3>
                    <p>Vagas Disponíveis</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Mais info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Placeholder para gráficos ou relatórios rápidos -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visão Geral</h3>
                </div>
                <div class="card-body">
                    {{-- Aqui você pode incluir gráficos (ChartJS) ou resumos adicionais --}}
                    <p>Em desenvolvimento...</p>
                </div>
            </div>
        </div>
    </div>
@endsection