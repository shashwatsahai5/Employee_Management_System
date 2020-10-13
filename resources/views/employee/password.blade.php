@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=col-sm-2></div>
        <div class=col-sm-8>
            <h1>Change Password</h1>
            <div class="card text-center">
                <div class="card-header">
                  Change Password
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['passwordController@update', Auth::user()->id],'method' => 'POST'])!!}
                        <div class="form-group row">
                            <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('Enter Your Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control" name="oldpass" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass1" class="col-md-4 col-form-label text-md-right">{{ __('Enter Your New Password') }}</label>

                            <div class="col-md-6">
                                <input id="newpass1" type="password" class="form-control" name="newpass1" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass2" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Your New Password') }}</label>

                            <div class="col-md-6">
                                <input id="newpass2" type="password" class="form-control" name="newpass2" required>
                            </div>
                        </div>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                </div>
                
              </div>
        </div>
        <div class=col-sm-2></div>
    </div>
</div>
@endsection