@extends('admin.layouts.app')

@section('title', mb_strtoupper($course->name) . " | Detalhes do Módulo " . mb_strtoupper($module->name))

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Detalhes do Módulo {{ $course->name }}
</h1>

<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('modules.destroy', ['course_id' => $course->id, 'module' => $module->id]) }}" method="POST">
                <ul>
                    <li><strong>Nome: </strong>{{ $module->name }}</li>
                </ul>
                @method('DELETE')
                @csrf
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                        Deletar o Módulo {{ $module->name }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection