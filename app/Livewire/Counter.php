<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 0;

    public function increment()
    {
        
    }

    public function decrement()
    {
        dd('function decrement');
    }   

    public function render()
    {
        return view('livewire.counter');
    }

}
