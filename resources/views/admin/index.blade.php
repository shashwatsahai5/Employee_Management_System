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
                                
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$u->id}}{{$u->password}}">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$u->id}}{{$u->password}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            {{Form::submit('Yes, Delete', ['class' => 'btn btn-danger'])}}
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
<br>


<div class="d-flex justify-content-center container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Departments') }} <span style="float: right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDeptModal1234abcd">
                    Add New
                </button></span></div>
                <!-- Modal -->
                <div class="modal fade" id="addDeptModal1234abcd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" >Add New Department</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <h4>Add Department</h4><hr>
                                {!! Form::open(['action' => ['DepartmentController@create'], 'method' => 'GET'])!!}
                                <div class = "form-group">
                                    {{Form::label('department_name', 'Department Name', ['class' => 'required-field'])}}
                                    {{Form::text('department_name',"", ['class' => 'form-control', 'placeholder' => 'Add Department Name','required' => 'required'])}}
                                </div>
                                <hr>
                                
                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                {!!Form::close()!!}

                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($departments)>0)
                        <table class="table table-striped" id="deptTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Stength</th>
                                    <th>Actions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $dept)
                                <tr>
                                    <td>{{$dept->id}}</td>
                                    <td>{{$dept->department_name}}</td>
                                    <td>{{DB::table('users')->where('department_id', $dept->id)->count()}}</td>
                                    <td>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editDeptModal{{$dept->id}}1234abcd">
                                            Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editDeptModal{{$dept->id}}1234abcd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" >Edit This Department</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <h4>Edit Department</h4><hr>
                                                        {!! Form::open(['action' => ['DepartmentController@update', $dept->id], 'method' => 'POST'])!!}
                                                        <div class = "form-group">
                                                            {{Form::label('department_name', 'Department Name', ['class' => 'required-field'])}}
                                                            {{Form::text('department_name',$dept->department_name, ['class' => 'form-control', 'placeholder' => 'Department Name','required' => 'required'])}}
                                                        </div>
                                                        <hr>
                                                        {{Form::hidden('_method', 'PUT')}}
                                                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                                                        {!!Form::close()!!}

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteDeptModal{{$dept->id}}{{$dept->department_name}}">
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteDeptModal{{$dept->id}}{{$dept->department_name}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" >Delete This Department</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Are you sure you want to delete this department?<br>
                                                    <b>Deleting the deprtment will also delete all the employees in that department.</b>

                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                                                    {!!Form::open(['action' => ['DepartmentController@destroy', $dept->id], 'method' => 'POST' ])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Yes, Delete', ['class' => 'btn btn-danger'])}}
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
                    @else
                    <div class = "jumbotron">No Departments :(</div>         
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
        $('#deptTable').DataTable();
    } );
</script>
@endsection