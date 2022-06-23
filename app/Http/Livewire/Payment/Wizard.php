<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

class Wizard extends Component
{
    public function render()
    {
        return view('livewire.payment.wizard')->layout('layouts.main', [
            'title' => 'Paiement de votre commande',
        ]);
    }
}
