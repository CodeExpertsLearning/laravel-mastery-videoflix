<?php

namespace App\Http\Livewire\Subscriptions;

use App\Models\User;
use Livewire\Component;

class Checkout extends Component
{
    protected $listeners = ['charge'];

    public function getUserProperty()
    {
        return auth()->user();
    }

    public function charge($paymentMethod)
    {
//        dd($paymentMethodId);

        if(!$this->user->subscribed('default'))
            $this->user->newSubscription('default', 'price_1Ku1P0HcatQAL5p6ZRqhaUqk')->create($paymentMethod);

        return redirect()->route('my-content.main');
    }

    public function render()
    {
        return view('livewire.subscriptions.checkout')
            ->with('intent', $this->user->createSetupIntent())
            ->layout('layouts.guest');
    }
}
