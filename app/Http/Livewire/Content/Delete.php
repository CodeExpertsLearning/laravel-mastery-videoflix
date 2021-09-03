<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;
use App\Models\Content;

class Delete extends Component
{
    public $content;

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function deleteContent()
    {
        if(!$this->content->delete()) session()->flash('error', 'Não foi possível remover este conteúdo');

        session()->flash('success', 'Conteúdo removido com sucesso!');

        return redirect()->route('content.index');
    }

    public function render()
    {
        return view('livewire.content.delete');
    }
}
