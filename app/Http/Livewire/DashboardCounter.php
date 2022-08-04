<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\User;
use App\Models\Video;
use Livewire\Component;

class DashboardCounter extends Component
{
    public function render(User $user, Content $content, Video $video)
    {

        $counters = [
            'customers' => $user->whereRole('ROLE_USER')->count(),
            'contents' => $content->count(),
            'videos'   => $video->whereIsProcessed(true)->count()
        ];


        return view('livewire.dashboard-counter')->with('counters', $counters);
    }
}
