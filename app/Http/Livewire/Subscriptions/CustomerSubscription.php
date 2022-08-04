<?php

namespace App\Http\Livewire\Subscriptions;

use Livewire\Component;

class CustomerSubscription extends Component
{
    protected $listeners = ['subscriptionCancelled' => '$refresh'];

    public function render()
    {
        return view('livewire.subscriptions.customer-subscription')
                ->layout('layouts.my-contents')
                ->with('invoices', auth()->user()->invoices());
    }
}
