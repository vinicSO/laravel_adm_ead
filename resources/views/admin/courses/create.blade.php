@extends('admin.layouts.app')

@section('title', 'Novo Curso')

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Cadastrar Curso</h1>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Formulário de Curso
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.courses._partials.form')
                </form>
            </div>
        </div>
    </div>

@endsection
