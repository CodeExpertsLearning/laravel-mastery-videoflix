<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Criar Novo Conteúdo</x-slot>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
            {{session('success')}}
        </div>
    @endif

    <form action="" wire:submit.prevent="saveContent">

        <div class="mb-5">
            <label class="block">Titulo</label>
            <input type="text" wire:model.defer="title">

            @error('title')
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Conteúdo</label>
            <input type="text" wire:model.defer="body" >

            @error('content')
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <button class="border border-green-500 px-5 py-2 rounded">Salvar Dados</button>

    </form>
</div>
