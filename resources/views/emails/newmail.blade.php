@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-sm-11"><h1>Send Email</h1></div>
   
    <div class="col-sm-1"><a href = "/admin" class="btn btn-primary" >Back</a></div>
    
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form method="post" action="{{url('sendmail/send')}}"> 
                {{ csrf_field() }}
                <div class="form-group">
                    <label>From</label>
                    <input type="email" name="sender_email" class="form-control" value={{auth()->user()->email}} readonly required/>
                </div>
                <div class="form-group">
                    <label>To</label>
                    <input type="email" name="reciever_email" class="form-control" value={{$employee->email}} readonly required/>
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="reciever_name" class="form-control" value={{$employee->first_name}} required/>
                </div>
                
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="mail_subject" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Enter Your Message</label>
                    <textarea rows="10" name="message" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="send" class="btn btn-info" value="Send" />
                </div>
           </form>


    </div>
    <div class="col-md-1"></div>
</div>
</div>

@endsection