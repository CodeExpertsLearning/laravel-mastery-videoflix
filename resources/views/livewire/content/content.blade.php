<div class="my-10">
    <div class="flex">{{$content->id}} {{$content->title}} -

        <a href="{{route('content.edit', $content)}}"
           class="px-2 py-1 border border-blue-600 rounded mr-2">Editar</a>

        <livewire:content.delete :content="$content"></livewire:content.delete>

    </div>
</div>
