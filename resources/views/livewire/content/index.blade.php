<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    {{-- @livewire('content.content', ['content' => $content], key($content->id)) --}}
    {{-- Laravel 7+<livewire:content.content :content="$content" :key="$content->id"></livewire:content.content> --}}

    <x-slot name="header">Conteúdos Cadastrados</x-slot>

    <a href="{{route('content.create')}}">Criar Conteúdo</a>

    @if(session()->has('success'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded">
            {{session('success')}}
        </div>
    @endif


    @foreach($contents as $content)
        <livewire:content.content :content="$content" :key="$content->id"></livewire:content.content>
    @endforeach

    {{$contents->links()}}
</div>
