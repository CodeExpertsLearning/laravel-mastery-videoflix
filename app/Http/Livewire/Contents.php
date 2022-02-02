<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Content;

class Contents extends Component
{
    public Content $content;

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function render()
    {
        return view('livewire.contents', [
            'contents' => $this->content->paginate(10)
        ])->layout('layouts.my-contents');
    }
}
