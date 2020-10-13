<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use \Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class passwordController extends Controller
{
    public function show($id){
        $user = User::find($id);
        if(Auth::user()->id == $user->id){
            return view('employee.password')->with('user',$user);
        }
        return redirect('/')->with('error','Access Denied!');
    }

    public function update(Request $request, $id){
        
        $this->validate($request, [
            'oldpass' => 'required',
            'newpass1' => 'required|min:8',
            'newpass2' => 'required|min:8',
            
        ]);
        $employee = User::find($id);
        if (Hash::check($request->input('oldpass'),$employee->password))  {
            # code...
            if($request->input('newpass1') != $request->input('newpass2')){
                return back()->with('error', 'New passwords do not match');
            }
            $newpassword = Hash::make($request->input('newpass1'));
            User::where('id', $id)->update(array('password' => $newpassword));
            return redirect('/home')->with('success', 'Password Updated');
        }
        return back()->with('error','Old password is incorrect');

    }
}
