@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @if(count($users)>0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Company</th>
                            <th>Department</th>
                            
                            <th colspan="4">Actions</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{$u->first_name}}</td>
                            <td>{{$u->last_name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->DOB}}</td>
                            <td>{{$u->company_name}}</td>
                            <td>{{$u->department}}</td>
                            
                            <td><a href="/employee/{{$u->id}}/edit" class = "btn btn-default">Edit</td>
                            <td><a href="/sendmail/{{$u->id}}/new" class = "btn btn-default">Send E-mail</td>
                            <td><a href="/address/{{$u->id}}/show" class = "btn btn-default">Addresses</td>
                            <td>
                                {!!Form::open(['action' => ['EmployeeController@destroy', $u->id], 'method' => 'POST' ])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
    
                            </td>
                            
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                    @else
                    <div class = "jumbotron">No Employees :(</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection