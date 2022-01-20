<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InputLabel extends Component
{

    public $labelText;
    public $message;
    public $inputValue;
    public $fieldName;

    public function connect()
    {
        $this->emitUp('getInput', $this->inputValue, $this->fieldName);
    }

    public function mount($labelText, $message)
    {
        if ($this->fieldName == 'email') {
            $this->inputValue = Auth::user()->email;
        }

        $this->labelText = $labelText;
        $this->message = $message;
        $this->connect();
    }

    public function getInput($text)
    {
        $this->message = $text;
    }

    public function validateField()
    {
        return Validation::validField($this->fieldName, $this->inputValue);
    }

    public function render()
    {
        return view('livewire.input-label');
    }
}
