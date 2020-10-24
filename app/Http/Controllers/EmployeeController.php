<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use DB;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $department = Department::all();
        $emp = User::find($id);
        $empl = DB::table('departments')
        ->join('users', 'users.department_id', 'departments.id')
        ->where('users.id',$id)
        ->get();
        //echo "<pre>";
        //print_r($empl);
        $employee = $empl[0];
        
        return view('employee.edit')->with(compact('employee','department'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = User::find($id);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'DOB' => 'required',
            'company_name' => 'required',
            'email' => 'required|unique:users,email,'.$employee->id
            
            
        ]);

        
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->DOB = $request->input('DOB');
        $employee->company_name = $request->input('company_name');
        $employee->email = $request->input('email');
        $employee->department_id = $request->input('department_id');
        $employee->phone = $request->input('phone');
        $employee->save();
        /*if($employee->user_type == 'regular'){
            return redirect('/home')->with('success', 'Profile Updated');
        }
        return redirect('/admin')->with('success', 'Profile Updated');*/
        return back()->with('success', 'Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::find($id);
        if(auth()->user()->user_type !== 'admin' ){
            return redirect('/home')->with('error', 'Unauthourized access!');
        }
        $employee->delete();
        return redirect('/admin')->with('success', 'Employee Deleted');
    }
}
