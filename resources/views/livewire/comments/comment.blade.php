<div class="w-full border-b border-gray-600 text-white py-10">
    <span class="mb-10 block text-xs">Comentado {{$comment->created_at->locale('pt_BR')->diffForHumans()}} por {{$comment->user->name}}</span>

    <p class="text-lg">{{$comment->comment}}</p>
</div>

