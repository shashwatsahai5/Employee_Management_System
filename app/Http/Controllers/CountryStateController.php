<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\{Country,State};
use DB;

class CountryStateController extends Controller
{
    public function index()
    {
        $countries = Country::get(["name","id"]);
        return view('employee.address')->with('countries',$countries);
    }
    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
    
    public function checkemail(Request $request)
    {
        if($request->get('em')){
            $email = $request->get('em');
            //$count = DB::table("users")->where('email',$email)->count();
            $count = "HI";
            /*if($emailckeck > 0){
                echo "not_unique";
            }
            else{
                echo "unique";
            }*/
            //echo $emailcheck['count'];
            return $count;
            
        }
        
    }
}
