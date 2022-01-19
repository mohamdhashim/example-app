<?php

namespace App\Http\Livewire;
use Livewire\Component;

class App extends Component
{
    public $slot = 'main';
    public function render()
    {
        return view('layouts.app');
    }
}