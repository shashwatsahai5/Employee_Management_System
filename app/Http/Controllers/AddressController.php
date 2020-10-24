<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;
use Validator,Redirect,Response;
use App\{Country,State};
use DB;

class AddressController extends Controller
{
    public function show($id){
        //$user = User::find($id);
        $states = State::get(["id","name"]);
        $countries = Country::get(["name","id"]);
        $addresses = Address::where('user_id', $id)->get();
        return view('employee.address', compact('addresses','id','countries', 'states'));
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'address_type' => 'required|max:15',
            'country' => 'required',
            'state' => 'required',
        ]);

        $address = new Address;
        $address->user_id = $request->input('user_id');
        $address->address_type = $request->input('address_type');
        $address->name = $request->input('house_number');
        $address->street = $request->input('street');
        $address->city = $request->input('city');
        $address->state = $request->input('state');
        $address->country = $request->input('country');
        $address->zip = $request->input('zip');
        //$address->phone = $request->input('phone');
        $address->save();
        return back()->with('success', 'Address Added');

    }

    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        return back()->with('success', 'Address Deleted');
               
    }
}
