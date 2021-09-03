<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;

class Create extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required',
        'body' => 'required|min:10'
    ];

    public function saveContent()
    {
        $this->validate();

        //salvar os dados ...
        //

        \App\Models\Content::create([
            'title' => $this->title,
            'body' => $this->body
        ]);

        //retornar uma mensagem de sucesso...

        $this->reset('title', 'body');

        session()->flash('success', 'O conteúdo foi salvo com sucesso!');

    }

    public function render()
    {
        return view('livewire.content.create');
    }
}
