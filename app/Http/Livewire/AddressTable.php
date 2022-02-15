<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Address;
use App\Models\User;
use App\Models\Area;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Auth;

class AddressTable extends Component
{
    public $addresses;
    public $message;

    public function getData()
    {
        $user_id =  Auth::id();
        $addressController = new AddressController();
        $addresses = json_decode($addressController->userAddresses($user_id)->getContent(), true)['addresses'];
        return $addresses;
    }

    public function mount()
    {
        $this->addresses = $this->getData(20);
    }

    public function render()
    {
        return view('livewire.address-table');
    }
}
