@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Dashboard</h1>

    <div class="grid grid-cols-12 gap-6 mb-6">
        @include('admin.home._partials.statistic', [
            'total' => $totalUsers,
            'icon' => 'fas fa-align-left',
            'text' => 'Total de Usuários'
        ])
        @include('admin.home._partials.statistic', [
            'total' => $totalAdmins,
            'icon' => 'fas fa-user-shield',
            'text' => 'Total de Administradores'
        ])
        @include('admin.home._partials.statistic', [
            'total' => $totalCourses,
            'icon' => 'fas fa-video',
            'text' => 'Total de Cursos'
        ])
        @include('admin.home._partials.statistic', [
            'total' => $totalSupports,
            'icon' => 'fas fa-headset',
            'text' => 'Total de Suportes'
        ])
    </div>
    
@endsection