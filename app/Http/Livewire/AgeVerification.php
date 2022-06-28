<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AgeVerification extends Component
{
    public $isOk;

    public function setOk($value)
    {
        $this->isOk = $value;
        if ($value) {
            session()->put('is_ok', true);
            $this->dispatchBrowserEvent('launch-hero-animation');
        }
        $this->render();
    }


    public function render()
    {
        return view('livewire.age-verification');
    }
}
