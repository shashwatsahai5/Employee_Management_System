@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>Addresses</h1>
    @if(count($addresses) > 0)
    @foreach($addresses as $a)
    <div class = "jumbotron">
        <h3>{{$a->address_type}}</h3><br>
        {{$a->street}}<br>
        {{$a->city}}<br>
        {{$a->state}}<br>
        {{$a->country}}<br>
        {{$a->zip}}<br>
        {{$a->phone}}
        <br><br>
        {!!Form::open(['action' => ['AddressController@destroy', $a->id], 'method' => 'POST' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}

    </div>

    @endforeach
    @else
    <div class = "jumbotron">You Homeless Dawg!</div>
    @endif
    <button class="btn btn-primary" onclick="showDiv()">Add New</button>
    <br><br>
    <div class = "row" id="newAddressForm"  style="display:none;"> 
        <div class="col-sm-6">
        {!! Form::open(['action' => 'AddressController@store', 'method' => 'POST'])!!}
            <div class = "form-group">
                {{Form::label('address_type', 'Address Type')}}
                {{Form::text('address_type','' , ['class' => 'form-control', 'placeholder' => 'Eg. Home, Work, Hostel, PG'])}}
            </div>
            <div class = "form-group">
                {{Form::label('house_number', 'House Number')}}
                {{Form::text('house_number','' , ['class' => 'form-control', 'placeholder' => 'House Number'])}}
            </div>
            <div class = "form-group">
                {{Form::label('street', 'Street')}}
                {{Form::text('street',  '' ,['class' => 'form-control', 'placeholder' => 'Street'])}}
            </div>
            <div class = "form-group">
                {{Form::label('city', 'City')}}
                {{Form::text('city', '' , ['class' => 'form-control', 'placeholder' => 'City'])}}
            </div>
            <div class = "form-group">
                {{Form::label('state', 'State')}}
                {{Form::text('state',  '' ,['class' => 'form-control', 'placeholder' => 'State'])}}
            </div>
            <div class = "form-group">
                {{Form::label('country', 'Country')}}
                {{Form::text('country','' , ['class' => 'form-control', 'placeholder' => 'Country'])}}
            </div>
            <div class = "form-group">
                {{Form::label('zip', 'Zip')}}
                {{Form::number('zip','' , ['class' => 'form-control', 'placeholder' => 'zipcode'])}}
            </div>
            <div class = "form-group">
                {{Form::label('phone', 'Phone Number')}}
                {{Form::text('phone', '' ,['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
            </div>

            
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        </div>
    
    
    </div>
    
    <script type="text/javascript">
        function showDiv() {
            document.getElementById('newAddressForm').style.display = "block";
        }
    </script>
</div>
@endsection