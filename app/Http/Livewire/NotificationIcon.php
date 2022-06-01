<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationIcon extends Component
{
    public $listeners = ['refreshNotificationIcon' => '$refresh'];

    public function render()
    {
        return view('livewire.notification-icon');
    }
}
