<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Address,User,Area};
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function userAddresses($id){
        
        if (is_null(User::find($id)))
            return response(["message"=>"Record not found!"],400);


        return response()->json(['Addresses'=>Address::where('user_id',$id)->get()], 200);
    }

    public function address ($id){

        
        $address = Address::find($id,["street","building","floor","apartment"]); 
        if (is_null($address))
            return response(["message"=>"Record not found!"],400);
            
        //format result ==> “building street, Floor: floor, Apartment: apartment” 
        $formated_address = "{$address["building"]} {$address['street']}";

        // if Address has floor or apartment add it 
        if(isset($address["floor"]))
            $formated_address .= ", Floor: {$address["floor"]}";
        if(isset($address["apartment"]))
            $formated_address .= ", Apartment: {$address["apartment"]}";

        return response()->json($formated_address,200);
    }

    public function deleteAddress($id){

        $address = Address::find($id);

        if($address){
            $is_deleted = $address->delete();
            return response()->json(['isAddressDeleted'=>$is_deleted],201);
        }else{
            
            return response(["message"=>"Record not found!"],400);
        }
    }

    public function createAddress (Request $request){

        //Parameters: street, building, floor, apt, area and email.
        $rules = [
            'floor' =>'required|nullable',
            'building'=>'required',
            'street'=>'required',
            'apartment'=>'required|nullable',
            'area'=>'required',
            'email'=>'required|email'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }


        $data = $request->all();
        $area_id = Area::where('name',$data['area'])->first()['id'];
        $user_id = User::where('email',$data['email'])->first()['id'];


        if(is_null($area_id)){
            return response(["message"=>"Record not found!"],400);
        }else if(is_null($user_id))
        {
            return response(["message"=>"Record not found!"],400);
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
