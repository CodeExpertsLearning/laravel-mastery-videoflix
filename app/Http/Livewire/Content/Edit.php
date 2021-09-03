<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;
use App\Models\Content;

class Edit extends Component
{
    public $content;

    public $title;
    public $body;

    public $rules = [
        'content.title' => 'required',
        'content.body'  => 'required'
    ];

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function editContent()
    {
        $this->validate();

        if(!$this->content->save()) session()->flash('error', 'Erro ao editar conteúdo...');

        session()->flash('success', 'Editado com sucesso!');
    }

    public function render()
    {
        return view('livewire.content.edit');
    }
}
