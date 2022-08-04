<div class="flex justify-around items-center my-10" wire:poll.5000ms="reloadProgress">
    <small class="mr-5">Progresso processamento:</small>
    <div class="w-96 rounded-full h-4 border border-green-900 p-0">
        <div class="rounded-full h-4 bg-green-700" style="width: {{$progress?: 0}}%"></div>
    </div>
    <span class="ml-2">{{$progress?: 0}} %</span>
</div>
