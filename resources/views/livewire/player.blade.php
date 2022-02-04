@if(!$videos)

    <div class="text-white"><h3 class="font-extrabold text-2xl">Nenhum vídeo encontrado...</h3></div>

@else

    @if($content->type == 2)
        <x-player-series :videos="$videos" :current="$current" :videoId="$videoId"></x-player-series>
    @else
        <x-player-single :video="$videos[0]"></x-player-single>
    @endif

@endif

