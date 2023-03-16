@extends('admin.layouts.app')

@section('title', 'Supportes')

@section('content')

    <h1 class="text-3xl text-black pb-6">
        Dúvidas dos Alunos
    </h1>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Registros de Administradores
        </p>

        <form action="" method="GET">
            <div class="flex justify-end">
                <div class="mb-3">
                    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                        <select name="status">
                            @foreach ($statusOptions as $status)
                               
                                <option  
                                    @if (request('status') == $status->name)
                                        selected
                                    @endif
                                    value="{{ $status->name }}">{{ $status->value }}</option>
                            @endforeach
                        </select>

                        <button type="submit">Filtrar</button>
                    </div>
                </div>
            </div>      
        </form>

        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aluno
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aula
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supports->items() as $support)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        @if ( isset($support->user['image']) )
                                            <img class="w-full h-full rounded-full"
                                                src="{{ url("storage/{$support->user['image']}") }}"
                                                alt="{{ $support->user['name']}}" />
                                        @endif
                                        
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $support->user['name'] ?? ''}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $support->lesson['name'] ?? '-' }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{ route('supports.show', ['id' => $support->id] )}}">
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Detalhes</span>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="1000">Não há registros.</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- {{ $supports->links }} --}}
    <div aria-label="Page navigation py-12">

        <ul class="inline-flex py-5">
            <li>
                <a href="?page={{ $supports->currentPage() - 1 }}&status={{ request('status') ?? 'P' }}" class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $supports->currentPage() <= 1 ? 'disableLink' : ''}}">
                    Voltar
                </a>
            </li>
            <li>
                <a href="" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $supports->currentPage() }}</a>
            </li>
            <li>
                <a href="?page={{ $supports->currentPage() + 1 }}&status={{ request('status') ?? 'P' }}" class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $supports->currentPage() >= $supports->lastPage() ? 'disableLink' : ''}}">
                    Próxima
                </a>
            </li>
        </ul>

    </div>

@endsection