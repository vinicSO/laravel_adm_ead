@include('admin.includes.alerts')

@csrf
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required placeholder="Nome" aria-label="Nome" value="{{ $lesson->name ?? old('name') }}">
</div>
<div class="">
    <label class="block text-sm text-gray-600" for="video">Vídeo</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="video" name="video" type="text" required placeholder="Nome" aria-label="Nome" value="{{ $lesson->video ?? old('video') }}">
</div>
<div class="mt-2">
    <label class=" block text-sm text-gray-600" for="description">Descrição</label>
    <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="description" name="description" aria-label="Descrição" placeholder="Descrição" cols="3," rows="4">{{ $lesson->description ?? old('description')}}</textarea>
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Cadastrar</button>
</div>