@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form method="post" action="{{url('sendmail/send')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>From</label>
                    <input type="email" name="sender_email" class="form-control" value={{auth()->user()->email}} />
                </div>
                <div class="form-group">
                    <label>To</label>
                    <input type="email" name="reciever_email" class="form-control" value={{$employee->email}} />
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="reciever_name" class="form-control" value={{$employee->first_name}} />
                </div>
                
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="mail_subject" class="form-control" />
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
    <div class="col-md-2"></div>
</div>


@endsection