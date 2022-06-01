@props(['videos', 'current', 'videoId'])

<div>
    <div class="text-white ml-10 mt-14">
        <a href="{{route('my-content.main')}}" class="underline">Meus Conteúdos</a> / <strong>Player</strong>
    </div>

    <div id="player" class="mt-14 ml-10" wire:ignore></div>

    <div class="flex justify-start mb-5 mt-10 ml-10">
        @livewire('favorite-button', ['model' => $videoId, 'type' => 'video'])
    </div>

    <div>
        <livewire:comments.create :video="$videoId"/>
    </div>



    <div class="fixed w-80 h-full top-0 right-0 bg-black border-l border-gray-900">

        <ul>
            @foreach($videos as $video)
                <li class="block text-white">
                    <a href="#" data-videoid="{{$video['id']}}" data-code="{{$video['code']}}" data-video="{{$video['processed_video']}}"
                       class="linkVideo block px-4 py-4 border-b border-gray-900 hover:bg-white hover:text-black transition duration-300 ease-in-out">
                        {{$video['name']}}
                    </a>
                </li>
            @endforeach
        </ul>

    </div>


    @push('head')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@clappr/player@latest/dist/clappr.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/clappr.level-selector/latest/level-selector.min.js"></script>
    @endpush

    @push('scripts')
        <script>
           document.addEventListener('livewire:load', function(){

               let video = "{{url('resources/' . $current)}}";
               var player = new Clappr.Player({
                   source: video,
                   width: "70%",
                   height: "720px",
                   parentId: "#player",
                   mimeType: "application/x-mpegURL",
                   plugins: {"core": [LevelSelector]}
               });
               let linkVideos = document.querySelectorAll('a.linkVideo');
               linkVideos.forEach(el => {
                   el.addEventListener('click', event => {
                       event.preventDefault()
                        //Modifica o valor da propriedade videoId do componente PHP Player
                       //@this.videoId = event.target.dataset.videoid;

                       Livewire.emit('changeVideoId', event.target.dataset.videoid);

                       player.load(`/resources/${event.target.dataset.code}/${event.target.dataset.video}`);

                   })
               });

           });
        </script>
    @endpush
</div>
