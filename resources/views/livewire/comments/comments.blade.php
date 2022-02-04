<div class="mt-20">
   <h3 class="block mb-10 text-white text-2xl font-extrabold">Comentários ({{$comments->count()}})</h3>
   @forelse($comments as $comment)

       <livewire:comments.comment :comment="$comment" :key="$comment->id"/>
   @empty

        <div class="text-white text-center font-bold text-2xl"><strong>Nenhum comentário...</strong></div>

   @endforelse
</div>
