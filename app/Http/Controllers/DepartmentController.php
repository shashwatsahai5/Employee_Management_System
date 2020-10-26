<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use DB;

class DepartmentController extends Controller
{
    public function destroy($id){
        $dept = Department::find($id);
        if(auth()->user()->user_type !== 'admin' ){
            return redirect('/home')->with('error', 'Unauthourized access!');
        }
        $dept->delete();
        return redirect('/admin')->with('success', 'Department and Employees Deleted');
    }
    public function update(Request $request, $id){
        $dept = Department::find($id);
        $this->validate($request,['department_name' => 'required']);
        $dept->department_name = $request->input('department_name');
        $dept->save();
        return back()->with('success','Department Editted!');
    }
    public function create(Request $request){
        $this->validate($request,['department_name' => 'required']);
        $dept = new Department;
        $dept->department_name = $request->input('department_name');
        $dept->save();
        return back()->with('success','Department Added!');
    }
}
