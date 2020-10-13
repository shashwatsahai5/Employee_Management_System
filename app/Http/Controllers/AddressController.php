<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;
use DB;

class AddressController extends Controller
{
    public function show($id){
        //$user = User::find($id);
        $addresses = Address::where('user_id', $id)->get();
        return view('employee.address', compact('addresses','id'))/*->with('addresses',$addresses)*/;
    }

    public function store(Request $request){
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
        if(auth()->user()->user_type !== 'admin' ){
            return redirect('/home')->with('error', 'Unauthourized access!');
        }
        $address->delete();
        return back()->with('success', 'Address Deleted');
    }
}
