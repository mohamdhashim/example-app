<?php

namespace App\Http\Livewire;

use Livewire\Component;

class App extends Component
{
    public $slot;
    public function render()
    {
        return view('layouts.app')->slot('main');
    }
}
