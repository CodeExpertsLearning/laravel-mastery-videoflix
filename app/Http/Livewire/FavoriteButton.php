<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\User;
use Livewire\Component;

class FavoriteButton extends Component
{
    public $model;
    public $type;

    protected $listeners = ['changeVideoId'];

    public function mount($model, $type)
    {
        $this->model = $model;
        $this->type = $type;
    }

    public function toggleFavorite()
    {
        /** @var User $user */
        $user = auth()->user();
        $favorites = app($this->getModelNamespace($this->type))->find($this->model)->favorites();

        if(!$favorites->where('user_id', $user->id)->count()) {
            $favorites->create(['user_id' => $user->id]);
        }else {
            $favorites->where('user_id', $user->id)->delete();
        }
    }

    private function getModelNamespace(string $type): ?string
    {
        switch ($type) {
            case 'content':
                return \App\Models\Content::class;

            case 'video':
                return \App\Models\Video::class;
        }

        return null;
    }

    public function changeVideoId($video)
    {
        $this->model = $video;
    }

    public function getFavoriteByUserProperty()
    {
        $instance = app($this->getModelNamespace($this->type));
        return $instance->find($this->model)->favorites()->whereUserId(auth()->id())->count();
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
