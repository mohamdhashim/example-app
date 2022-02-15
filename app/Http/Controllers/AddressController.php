<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function userAddresses($id)
    {
        $addresses = Address::join('areas', 'addresses.area_id', '=', 'areas.id')
            ->where('addresses.user_id', $id)
            ->get(['addresses.*', 'areas.name as area_name']);

        if (empty($addresses->all())) {
            return response()->json(['addresses' => $addresses, "message" => "No address found!"], 400);
        }


        return response()->json(['addresses' => $addresses, "message" => "Addresses Listed Successfully!"], 200);
    }

    public function address($id)
    {
        $address = Address::find($id, ["street", "building", "floor", "apartment"]);
        if (!isset($address)) {
            return response()->json(["address" => "message: Address Record not found!"], 400);
        }

        //format result ==> “building street, Floor: floor, Apartment: apartment”
        $formated_address = "{$address["building"]} {$address['street']}";

        // if Address has floor or apartment add it
        if (isset($address["floor"])) {
            $formated_address .= ", Floor: {$address["floor"]}";
        }
        if (isset($address["apartment"])) {
            $formated_address .= ", Apartment: {$address["apartment"]}";
        }

        return response()->json(["address" => $formated_address], 200);
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);

        if (isset($address)) {
            $is_deleted = $address->delete();
            if ($is_deleted) {
                return response()->json(['isAddressDeleted' => $is_deleted, 'message' => 'Deleted Successfully!'], 201);
            } else {
                return response()->json(['isAddressDeleted' => $is_deleted, 'message' => 'Cannot delete this Record!'], 201);
            }
        } else {
            return response()->json(['isAddressDeleted' => false, "message" => "Record not found!"], 400);
        }
    }

    public function createAddress(Request $request)
    {

        //Parameters: street, building, floor, apt, area and email.
        $rules = [
            'floor' => 'nullable',
            'building' => 'required',
            'street' => 'required',
            'apartment' => 'nullable',
            'area' => 'required',
            'email' => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["address" => [], "messages" => $validator->errors()], 400);
        }


        $data = $request->all();
        $area = Area::where('name', $data['area'])->first();
        $user = User::where('email', $data['email'])->first();


        if (!isset($area)) {
            $area = Area::Create([
                'name' => $data['area'],
                'city_id'=> 40 //Dummy City and Area Designed to be input by admin
            ]);
        } elseif (!isset($user)) {
            return response()->json(["address" => [], "messages" => ["User Record not found!"]], 400);
        }


        //if ['floor','apartment'] not in request ==> null
        // isset == [check if var declared or not first then check if null]
        if (!array_key_exists('floor', $data)) {
            $data['floor'] = null;
        }

        if (!array_key_exists('apartment', $data)) {
            $data['apartment'] = null;
        }


        $area_id = $area['id'];
        $user_id = $user['id'];
        $address = Address::create([
            'floor' => $data['floor'],
            'building' => $data['building'],
            'street' => $data['street'],
            'apartment' => $data['apartment'],
            'area_id' => $area_id,
            'user_id' => $user_id
        ]);
        return response()->json(["address" => $address, "messages" => ["Adress created Successfully!"]], 201);
    }
}
