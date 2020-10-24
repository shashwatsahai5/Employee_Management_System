<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Department;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $employee = Auth::user();
        $emp = DB::table('departments')
        ->join('users','departments.id', 'users.department_id')
        ->where('users.id',$employee->id)
        ->get();
        //echo "<pre>";
        //print_r($emp[0]);
        $e = $emp[0];

        return view('home')->with('employee',$e);
    }

    
}
