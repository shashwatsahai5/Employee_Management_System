@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

@endsection
@section('content')
<div class="d-flex justify-content-center container">
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
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Registration</th>
                                <th colspan="1">Actions</th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                                
                                
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
                            <td>{{$u->department_name}}</td>
                            <td>{{$u->created_at}}</td>
                            <td><a href="/admin/employee/{{$u->id}}/edit" class = "btn btn-default">Edit</td>
                            <td><a href="/sendmail/{{$u->id}}/new" class = "btn btn-default">Send E-mail</td>
                            <td><a href="/address/{{$u->id}}/show" class = "btn btn-default">Addresses</td>
                            <td>
                                
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete This Employee</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to delete this employee?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                                        {!!Form::open(['action' => ['EmployeeController@destroy', $u->id], 'method' => 'POST' ])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                        </div>
                                    </div>
                                    </div>
                                </div>
    
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
@section('scripts')
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection