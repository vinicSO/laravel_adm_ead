@extends('admin.layouts.app')

@section('title', 'Atualizar Imagem do Administrador')

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Atualizar Imagem do Administrador</h1>

    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <p class="text-xl pb-6 flex items-center">
                <i class="fas fa-list mr-3"></i> Formulário de Administrador
            </p>
            <div class="leading-loose">

                @include('admin.includes.alerts')

                <form class="p-10 bg-white rounded shadow-xl" action="{{ route('admins.uploadFile', ['id' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="image">Imagem</label>
                        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="image" name="image" type="file">
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Atualizar Imagem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
