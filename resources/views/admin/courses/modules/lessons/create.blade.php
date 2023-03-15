@extends('admin.layouts.app')

@section('title', "Nova Aula | {$module->name}")

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Cadastrar Aula Do Módulo <strong>{{ mb_strtoupper($module->name) }}</strong></h1>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Formulário de Aula
            </p>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="{{ route('lessons.store', ['module_id' => $module->id]) }}" method="POST" enctype="multipart/form-data">
                    @include('admin.courses.modules.lessons._partials.form')
                </form>
            </div>
        </div>
    </div>

@endsection
