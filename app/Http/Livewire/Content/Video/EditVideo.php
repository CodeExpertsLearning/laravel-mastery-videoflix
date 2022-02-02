<?php

namespace App\Http\Livewire\Content\Video;

use Livewire\Component;
use App\Models\Video;
use Livewire\WithFileUploads;

class EditVideo extends Component
{
    use WithFileUploads;

    public Video $video;
    public $thumb;

    public $rules = [
        'video.name' => 'required',
        'video.description' => 'nullable',
        'thumb' => 'nullable|image'
    ];

    public function editVideo()
    {
        $this->validate();

        if($this->thumb) {
            $thumbnail = $this->video->code . '/thumbnail.' . $this->thumb->getClientOriginalExtension();
            $this->video->thumb = $this->thumb->storeAs('thumbnails', $thumbnail, 'public');
        }

        $this->video->save();

        session()->flash('success', 'Vídeo atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.content.video.edit-video');
    }
}
