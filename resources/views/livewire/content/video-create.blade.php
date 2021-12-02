<div class="max-w-7xl mx-auto mt-10 py-6 px-4 sm:px-6 lg:px-8">

    <x-slot name="header">Upload de Vídeo(s)</x-slot>

    <form action="">
        <div class="w-full"
             x-data="{ isUploading: false, progress: 0 }"

             x-on:livewire-upload-start="isUploading = true"

             x-on:livewire-upload-finish="isUploading = false"

             x-on:livewire-upload-error="isUploading = false"

             x-on:livewire-upload-progress="progress = $event.detail.progress">

            <div x-show="isUploading">

                <progress max="100" x-bind:value="progress" class="w-full"></progress>

            </div>

            <label class="block">Carregar Vídeo(s)</label>

            <input type="file" wire:model="videos" class="w-full mt-10 px-10 py-5 rounded-2xl border border-gray-600" multiple>

            @error('videos')
            {{$message}}
            @enderror

        </div>

        <div class="w-full">
            <button wire:click.prevent="uploadVideos" class="px-8 py-5 rounded mt-16 border border-green-600 bg-green-800 hover:bg-green-400 text-white font-extrabold">Carregar Videos</button>
        </div>
    </form>

</div>
