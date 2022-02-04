<div class="p-10 w-full mt-20 pt-10 border-t border-gray-600">
    <div class="w-2/3">
        <h3 class="text-white font-extrabold text-2xl mb-10">Deixar um comentário ou questão.</h3>
        <form action="" wire:submit.prevent="createComment">
            <div class="w-full mb-10">
                <textarea name="" id="" cols="30" rows="10" class="w-full rounded" wire:model="comment"></textarea>

                @error('comment')
                    <div class="px-4 py-2 w-full border border-red-800 bg-red-200 text-red-800 text-xl fold-bold mt-10 rounded">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button class="px-4 py-2 text-white font-bold bg-green-800 rounded">Criar</button>
        </form>

        <div class="w-full">
            <livewire:comments.comments :video="$video"/>
        </div>
    </div>
</div>
