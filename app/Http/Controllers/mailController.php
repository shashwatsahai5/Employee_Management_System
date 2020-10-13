<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\SendMail;
use App\Mail\SendWelcomeMail;

class mailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index($id){
        $employee = User::find($id);
        if(auth()->user()->user_type == 'admin'){
            return view('emails.newmail')->with('employee',$employee);
        }
        return redirect('/home')->with('error', 'Unauthourized access!');
    }

    function send(Request $request)
    {

        $data = array(
            'sender_mail'=>$request->sender_email,
            'message'=>$request->message,
            'subject' => $request->mail_subject,
            'sender_name'=> auth()->user()->first_name,
            'reciever_name' => $request->reciever_name,
        );

     \Mail::to($request->reciever_email)->send(new SendMail($data));
     return back()->with('success', 'mail sent!');

    }

    function sendWelcomeMail($id){
        $employee = User::find($id);

        $welcome_data = array(
            'reciever_first_name' => $employee->first_name,
            'reciever_last_name' => $employee->last_name,
        );
        \Mail::to($employee->email)->send(new SendWelcomeMail($welcome_data));
        return back();
    }
}
