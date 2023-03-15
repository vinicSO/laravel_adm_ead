@include('admin.includes.alerts')

@csrf
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required placeholder="Nome" aria-label="Nome" value="{{ $course->name ?? old('name') }}">
</div>
<div class="py-2">
    <label class="block text-sm text-gray-600" for="name">
        <input id="available" name="available" type="checkbox" aria-label="Disponível?" value="1" @checked($course->available ?? false)>
        Disponível?
    </label>
</div>
<div class="mt-2">
    <label class=" block text-sm text-gray-600" for="image">Imagem</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="image" name="image" type="file">
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Cadastrar</button>
</div>