<?php

namespace App\Livewire\Teste;

use Livewire\Component;

class Teste extends Component
{

    public $counter = 0;


    public function decrement() 
    {
        $this->counter--;
    }

    public function increment()
    {
        $this->counter++;
    }

    public function render()
    {
        return view('livewire.teste.teste');
    }
}
