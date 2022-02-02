<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Editar Vídeo</x-slot>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded mb-10">
            {{session('success')}}
        </div>
    @endif

    <form action="" wire:submit.prevent="editVideo">

        <div class="w-full mb-5">
            <label class="block">Titulo</label>

            <input type="text" wire:model.defer="video.name" class="w-full @error('video.name') border-red-700 @enderror">

            @error('video.name')
            <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block">Descrição</label>

            <input type="text" wire:model.defer="video.description" class="w-full @error('video.description') border-red-700 @enderror">

            @error('video.description')
            <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
            @enderror
        </div>

        <div class="w-full flex justify-between mb-5">
            <div class="w-1/3 px-2">
                <label class="block">Alterar Thumb do Vídeo</label>

                <input type="file" wire:model="thumb" class="w-full @error('thumb') border-red-700 @enderror">

                @error('video.description')
                <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
                @enderror
            </div>
            <div class="w-2/3">
                @if($thumb)
                    <img src="{{$thumb->temporaryUrl()}}" alt="Thumb do Vídeo {{$video->name}}" class="p-2 border border-gray-400 bg-white rounded">
                @else
                    <img src="{{asset('storage/' . $video->thumb)}}" alt="Thumb do Vídeo {{$video->name}}"
                         class="p-2 border border-gray-400 bg-white rounded">
                @endif
            </div>
        </div>

        <button class="border border-green-500 bg-green-800 text-white px-5 py-2 rounded">Atualizar Vídeo</button>

    </form>
</div>
