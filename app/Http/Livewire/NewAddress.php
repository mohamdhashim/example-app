<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AddressController;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NewAddress extends Component
{

    protected $listeners = ['getInput'];
    public $message = "heellooo";
    public $building;
    public $apartment;
    public $floor;
    public $street;
    public $email;
    public $area_name;

    public function mount()
    {
    }

    public function getInput($value, $fieldName)
    {

        if ($fieldName == 'building') {
            $this->building = $value;
        } elseif ($fieldName == 'street') {
            $this->street = $value;
        } elseif ($fieldName == 'email') {
            $this->email = $value;
        } elseif ($fieldName == 'area_name') {
            $this->area_name = $value;
        } elseif ($fieldName == 'apartment') {
            $this->apartment = $value;
        } elseif ($fieldName == 'floor') {
            $this->floor = $value;
        }
    }

    public function handleSubmit()
    {
        $addressController = new AddressController;
        $objetoRequest = new \Illuminate\Http\Request();
        $objetoRequest->setMethod('POST');
        $objetoRequest->request->add([
            "floor" => $this->floor,
            "building" => $this->building,
            "street" => $this->street,
            "apartment" => $this->apartment,
            "area" => $this->area_name,
            "email" => Auth::user()->email
        ]);
        $res = $addressController->createAddress($objetoRequest);
        $response = json_decode($res->getStatusCode(), true);
        if ($response >= 400) {
            $this->message = 400;
        } else {
            $this->message = 201;
        }
    }


    public function render()
    {
        return view('livewire.new-address');
    }
}
