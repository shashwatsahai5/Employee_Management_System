@extends('layouts.app')

@section('content')

<div class = 'container'>
    
    <div class='row'>
        <div class='col-md-2'></div>
        <div class='col-md-8'>
            <div class="row">
                <div class="col-sm-11"><h2>Edit Profile</h2></div>
                <div class="col-sm-1"><button class="btn btn-primary" onclick="goBack()">Back</button></div>
            </div><hr>
    {!! Form::open(['action' => ['EmployeeController@update', $employee->id], 'method' => 'POST'])!!}
    <div class = "form-group">
        {{Form::label('first_name', 'First Name', ['class' => 'required-field'])}}
        {{Form::text('first_name', $value = $employee->first_name, ['class' => 'form-control required-field', 'placeholder' => 'First Name','required' => 'required'])}}
    </div>
    <div class = "form-group">
        {{Form::label('last_name', 'Last Name', ['class' => 'required-field'])}}
        {{Form::text('last_name', $employee->last_name, ['class' => 'form-control required-field', 'placeholder' => 'Last name','required' => 'required'])}}
    </div>
    <div class = "form-group">
        {{Form::label('DOB', 'D.O.B', ['class' => 'required-field'])}}
        {{Form::date('DOB', $employee->DOB, ['class' => 'form-control', 'placeholder' => 'DOB','required' => 'required'])}}
    </div>
    <div class = "form-group">
        {{Form::label('company_name', 'Company', ['class' => 'required-field'])}}
        {{Form::text('company_name', $employee->company_name, ['class' => 'form-control', 'placeholder' => 'Compant Name','required' => 'required'])}}
    </div>
    <div class = "form-group">
        {{Form::label('email', 'Email', ['class' => 'required-field'])}}
        {{Form::email('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'Main Email', 'required' => 'required'])}}
    </div>

    <div class = "form-group">
        {{Form::label('phone', 'Phone Number')}}
        {{Form::text('phone', $employee->phone, ['class' => 'form-control', 'placeholder' => 'Main Phone Number'])}}
    </div>

    <div class = "form-group">
        {{Form::label('department', 'Department')}}
        <select name = 'department_id' class = 'form-control' id="department">
            @foreach($department as $dept)
                @if($dept->id == $employee->department_id)
                    <option value={{$dept->id}} selected>{{$dept->department_name}}</option> 
                @else
                    <option value={{$dept->id}} >{{$dept->department_name}}</option>
                @endif
            @endforeach
        </select>
        
        
    </div>
      
    
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
</div>
<div class='col-md-2'></div>
</div></div>
<script>
    function goBack() {
          if({{Auth::user()->user_type == 'admin'}}){
            //window.location.href = "/admin";
            if({{$employee->id}} == {{Auth::user()->id}}){
              window.location.href = "/home";
            }
            else{
              window.location.href = "/admin";
            }
          }
          else{
            window.location.href = "/home";
          }
          
        }


</script>
@endsection