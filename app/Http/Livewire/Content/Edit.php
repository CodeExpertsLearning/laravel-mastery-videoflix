<?php

namespace App\Http\Livewire\Content;

use Livewire\{Component, WithFileUploads};
use App\Models\Content;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $content;

    public $title;
    public $body;

    public $cover;

    public $rules = [
        'content.title' => 'required',
        'content.body'  => 'required',
        'content.description' => 'required',
        'content.type' => 'required',
        'cover'        => 'nullable|image'
    ];

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function editContent()
    {
        $this->validate();

        if($this->cover)
            Storage::disk('public')->delete($this->content->cover);

        $this->content->cover = $this->cover
                                   ? $this->cover->store('cover', 'public')
                                   : $this->content->cover;

        if(!$this->content->save()) session()->flash('error', 'Erro ao editar conteúdo...');

        session()->flash('success', 'Editado com sucesso!');
    }

    public function render()
    {
        return view('livewire.content.edit');
    }
}
