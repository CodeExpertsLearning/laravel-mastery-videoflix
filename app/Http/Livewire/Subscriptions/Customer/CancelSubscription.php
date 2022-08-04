<?php

namespace App\Http\Livewire\Subscriptions\Customer;

use Livewire\Component;

class CancelSubscription extends Component
{
    public function cancelSubscription()
    {
        auth()->user()->subscription('default')->cancel();

        $this->emit('subscriptionCancelled');
    }

    public function render()
    {
        return view('livewire.subscriptions.customer.cancel-subscription');
    }
}
