@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <table class="table table-light">
                        <thead>
                          <tr>
                            <th scope="col">Profile</th>
                          <th scope="col" style="text-align: right"><a href="/employee/{{$employee->id}}/edit" class="btn btn-primary">Edit</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">First Name</th>
                            <td>{{$employee->first_name}}</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">Last Name</th>
                            <td>{{$employee->last_name}}</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">E-mail</th>
                            <td>{{$employee->email}}</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">DOB</th>
                            <td>{{$employee->DOB}}</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">Department</th>
                            <td>{{$employee->department}}</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">Company</th>
                            <td>{{$employee->company_name}}</td>
                            
                          </tr>
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
