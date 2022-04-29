<?php

namespace App\Http\Livewire\Subscriptions;

use App\Models\User;
use Livewire\Component;

class Checkout extends Component
{
    protected $listeners = ['charge'];

    public function charge($paymentMethodId)
    {
//        dd($paymentMethodId);

        $user = User::find(1);

        if(!$user->subscribed('default'))
            $user->newSubscription('default', 'price_1Ku1P0HcatQAL5p6ZRqhaUqk')->create($paymentMethodId);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.subscriptions.checkout')->layout('layouts.guest');
    }
}
