<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class Notification extends Component
{
    public function markAsReadNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
