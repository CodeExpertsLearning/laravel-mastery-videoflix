<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-3 gap-0.5">
        @foreach($contents as $content)

            <div class="w-96 mb-8 bg-gray-900 rounded shadow-lg hover:p-4">
                <img src="{{$content->cover}}" alt="Capa do conteúdo: {{$content->title}}" class="mb-8 rounded-t">

                <div class="px-4 pb-4 text-white relative h-64">

                    <h5 class="font-extrabold text-2xl mb-4">{{$content->title}}</h5>

                    <p class="leading-4 text-xl mb-20">{{$content->description}}</p>

                    <a href="{{route('video.player', $content)}}" class="mt-8 font-bold text-2xl block w-full text-center px-2 py-4
                                      hover:bg-white hover:text-gray-900 rounded transition duration-300 ease-in-out
                                      absolute bottom-0.5 left-0 right-0">Assistir</a>
                </div>
            </div>

        @endforeach
    </div>

    <div class="w-full mt-10">
        {{$contents->links()}}
    </div>
</div>
