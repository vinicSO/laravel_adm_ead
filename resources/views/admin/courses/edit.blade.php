@extends('admin.layouts.app')

@section('title', 'Atualizar Curso')

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Atualizar Curso</h1>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Formulário de Curso
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.courses._partials.form')
                </form>
            </div>
        </div>
    </div>

@endsection
