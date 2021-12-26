<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Address,User,Area};
use Exception;

class AddressController extends Controller
{
    public function userAddresses($id){
        return response()->json(User::find($id)->addresses, 200);
    }

    public function address ($id){

        $address = Address::find($id,["street","building","floor","apartment"]); 
        if ($address == null)
            return response("<h1>Address not Exists<h1>",404);
        //format result ==> “building street, Floor: floor, Apartment: apartment” 
        if ($address["floor"] === null)
            $format = "%d %s";
        else if($address["apartment"] === null)
            $format = "%d %s, Floor: %s";
        else
            $format = "%d %s, Floor: %s, Apartment: %s";

        //sprintf will ignore parameters that not exists in format string
        $formated_address = sprintf($format, $address["building"], $address['street'], $address["floor"],$address['apartment']);
        return response()->json($formated_address,200);
    }

    public function deleteAddress($id){

        $address = Address::find($id);

        if($address){
            $is_deleted = $address->delete();
            return response()->json(['isAddressDeleted'=>$is_deleted],201);
        }else{
            
            return response("<h1>Address not Exists<h1>",404);
        }
    }

    public function createAddress (Request $request){

        //Parameters: street, building, floor, apt, area and email.
        //$address = Address::find($id,["street","building","floor","apartment"]); 
        //
        $data = $request->all();
        $area_id = Area::where('name',$data['area'])->first()['id'];
        $user_id = User::where('email',$data['area'])->first()['id'];

        if($area_id == null){
            return response("<h1>Area not Exists<h1>",404);
        }else if($user_id ==null)
        {
            return response("<h1>This User not Exists<h1>",404);
        }

        $address = Address::create([
            'floor' =>$data['floor'],
            'building'=>$data['building'],
            'street'=>$data['street'],
            'apartment'=>$data['apartment'],
            'area_id'=>$area_id,
            'user_id'=>$user_id
        ]);
        return response()->json($address,201);
    }


}
