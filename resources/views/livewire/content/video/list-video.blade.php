<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">
    <x-slot name="header">Vídeos Cadastrados</x-slot>

    <div class="w-full mb-20 flex justify-end">
        <a href="{{route('content.video.create', $content)}}" class="px-4 py-2 bg-green-600 text-white">Carregar Vídeos</a>
    </div>

    @forelse($videos as $video)
        <div class="w-full flex bg-white py-2 px-10 rounded mb-10 border border-gray-300 relative shadow-lg">
            <div>
                @php $thumb = $video->thumb; @endphp
                <div class="w-96 h-96 flex items-center justify-center
                            @if(!is_file(storage_path('app/public/' . $thumb))) bg-gray-200 text-black text-2xl font-bold @endif">
                    @if(!is_file(storage_path('app/public/' . $thumb)))

                        Sem Thumb Vídeo

                    @else
                        <img src="{{asset('storage/' . $thumb)}}" alt="Thumb do vídeo {{$video->name}}" class="max-w-full">
                    @endif
                </div>
            </div>
            <div class="flex flex-col justify-center pl-20">
                <h3>{{$video->name}}</h3>
                @if(!$video->is_processed && $video->progress > 0)
                    @livewire('content.video.single-video-processed-progress', ['video' => $video->id], key($video->id))
                @endif
            </div>

            <a href="{{route('content.video.edit', [$content, $video])}}" class="absolute right-5 top-5 px-5 py-2 text-white font-bold bg-blue-700
                                rounded transition ease-in-out duration-300 hover:bg-blue-400">Editar</a>
        </div>
    @empty
        <h3 class="text-4xl font-extrabold">Nenhum vídeo cadastrado...</h3>
    @endforelse

</div>
