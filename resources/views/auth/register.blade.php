@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right required-field">{{ __('First name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control " name="first_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right required-field">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control " name="last_name" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right required-field">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required onblur="checkmain(this.value)">
                                <p style="text-align: center;" id="emailerr"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DOB" class="col-md-4 col-form-label text-md-right required-field">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control" name="DOB" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right required-field">{{ __('Company') }}</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company_name" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right required-field">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right required-field">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" onkeyup="checkpass()">
                                <p style="text-align: center;" id="errorbox"></p>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkpass(){
        var pass1 = document.getElementById('password').value;
        var pass2 = document.getElementById('password-confirm').value;
        var err = document.getElementById("errorbox");
        err.style.color = "red";
        err.innerHTML = "Passwords Don't Match"
        if(pass1 == pass2){
            console.log("good");
            err.style.color = "green";
            err.innerHTML = "Matched!"
            document.getElementById("submit").disabled = false;
            
        }
        else{
            console.log("no");
            document.getElementById("submit").disabled = true;
            err.style.color = "red";
            err.innerHTML = ""
            err.innerHTML = "Passwords Don't Match"
        }
    }

    function checkmain(em){
        console.log(em);
        $.ajax({
            type: 'POST',
            url: "{{url('checkemail')}}",
            data: {email: em, _token: '{{csrf_token()}}'},
            success: function(response){
                emailerr = document.getElementById("emailerr")
                console.log("call successfull");
                console.log(response);
                if(response == "unique"){
                    console.log("unique");
                    emailerr.innerHTML = ""
                    emailerr.style.color = "green";
                    emailerr.innerHTML = "Available!"
                    //document.getElementById("submit").disabled = false;

                }
                else if(response == "not_unique"){
                    console.log('not unique');
                    //document.getElementById("submit").disabled = true;
                    emailerr.style.color = "red";
                    emailerr.innerHTML = ""
                    emailerr.innerHTML = "Email Already Taken, Try Another"
                }
            } 
        });
    }
</script>
@endsection
