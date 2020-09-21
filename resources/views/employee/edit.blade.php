@extends('layouts.app')

@section('content')

<div class = 'container'>
    
    <div class='row'>
        <div class='col-md-2'></div>
        <div class='col-md-8'>
            <h2>Edit Profile</h2><hr>
    {!! Form::open(['action' => ['EmployeeController@update', $employee->id], 'method' => 'POST'])!!}
    <div class = "form-group">
        {{Form::label('first_name', 'First Name')}}
        {{Form::text('first_name', $value = $employee->first_name, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('last_name', 'Last Name')}}
        {{Form::text('last_name', $employee->last_name, ['class' => 'form-control', 'placeholder' => 'Last name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('DOB', 'D.O.B')}}
        {{Form::text('DOB', $employee->DOB, ['class' => 'form-control', 'placeholder' => 'DOB'])}}
    </div>
    <div class = "form-group">
        {{Form::label('company_name', 'Company')}}
        {{Form::text('company_name', $employee->company_name, ['class' => 'form-control', 'placeholder' => 'Compant Name'])}}
    </div>
    <div class = "form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'Main Email'])}}
    </div>

    @if(Auth::user()->user_type == 'admin')
    <div class = "form-group">
        {{Form::label('department', 'Department')}}
        {{Form::select('department', array(
        'Recruitment' => 'Recruitment', 
        'Development' => 'Development', 
        'Marketing' => 'Marketing',
        'Distribution' => 'Distribution',
        'Sales' => 'Sales',
        'Advertising' => 'Advertising',
        'HR' => 'HR',
        'Finance' => 'Finance',
        'Data Analytics' => 'Data Analytics'),$employee->department,['class' => 'form-control'])}}
        
    </div>
    @else
    <div class = "form-group">
        {{Form::label('department', 'Department')}}
        {{Form::text('department', $employee->department, ['class' => 'form-control', 'readonly' => 'true'])}}
    </div>
    @endif

    <div class = "form-group">
        {{Form::label('house_number', 'House Number')}}
        {{Form::text('house_number', $employee->name, ['class' => 'form-control', 'placeholder' => 'House Number'])}}
    </div>
    <div class = "form-group">
        {{Form::label('street', 'Street')}}
        {{Form::text('street', $employee->street, ['class' => 'form-control', 'placeholder' => 'Street'])}}
    </div>
    <div class = "form-group">
        {{Form::label('city', 'City')}}
        {{Form::text('city', $employee->city, ['class' => 'form-control', 'placeholder' => 'City'])}}
    </div>
    <div class = "form-group">
        {{Form::label('state', 'State')}}
        {{Form::text('state', $employee->state, ['class' => 'form-control', 'placeholder' => 'State'])}}
    </div>
    <div class = "form-group">
        {{Form::label('country', 'Country')}}
        {{Form::text('country', $employee->country, ['class' => 'form-control', 'placeholder' => 'Country'])}}
    </div>
    <div class = "form-group">
        {{Form::label('zip', 'Zip')}}
        {{Form::number('zip', $employee->zip, ['class' => 'form-control', 'placeholder' => 'zipcode'])}}
    </div>
    <div class = "form-group">
        {{Form::label('phone', 'Phone Number')}}
        {{Form::text('phone', $employee->phone, ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
    </div>
    
    
    
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
</div>
<div class='col-md-2'></div>
</div></div>
@endsection