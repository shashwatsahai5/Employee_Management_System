@extends('layouts.app')

@section('content')

<div class = "container">
    <div class="row">
        <div class="col-sm-11"><h1>Addresses</h1></div>
       
        <div class="col-sm-1"><button class="btn btn-primary" onclick="goBack()">Back</button></div>
        
    </div>
    
    @if(count($addresses) > 0)
    @foreach($addresses as $a)
    <div class = "jumbotron">
        <h3>{{$a->address_type}}</h3><br>
        {{$a->street}}<br>
        {{$a->city}}<br>
        {{$states[$a->state -1]["name"]}}<br>
        {{$countries[$a->country -1]["name"]}}<br>
        {{$a->zip}}<br>
        {{$a->phone}}
        <br><br>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
    Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete This Address</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this address?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
          {!!Form::open(['action' => ['AddressController@destroy', $a->id], 'method' => 'POST' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Yes, Delete', ['class' => 'btn btn-danger'])}}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
        

    </div>
    @endforeach
    @else
    <div class = "jumbotron">No Addresses Added</div>
    @endif
    <button class="btn btn-primary" onclick="showDiv()">Add New</button>
    <br><br>
    <div class = "row" id="newAddressForm"  style="display:none;"> 
        <div class="col-sm-6">
        {!! Form::open(['action' => 'AddressController@store', 'method' => 'POST'])!!}
            <div class = "form-group">
                {{Form::label('address_type', 'Address Type')}}
                
                <input list="select" name="address_type" id="address_type" class="form-control" required>
                <datalist class="form-control" id="select" hidden>    
                    <option value="Home"/>
                    <option value="Office"/>
                    <option value="PG"/>
                </datalist>

            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country-dropdown" name="country" required>
                    <option value="">Select Country</option>
                        @foreach ($countries as $country) 
                            <option value="{{$country->id}}">
                                {{$country->name}}
                            </option>
                        @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" id="state-dropdown" name="state" required>
                </select>
            </div>

            <div class = "form-group">
                {{Form::label('city', 'City')}}
                {{Form::text('city', '' , ['class' => 'form-control', 'placeholder' => 'City'])}}
            </div>
            
            <div class = "form-group">
                {{Form::label('street', 'Street')}}
                {{Form::text('street',  '' ,['class' => 'form-control', 'placeholder' => 'Street'])}}
            </div>
            <div class = "form-group">
                {{Form::label('house_number', 'House Number')}}
                {{Form::text('house_number','' , ['class' => 'form-control', 'placeholder' => 'House Number'])}}
            </div>


            <div class = "form-group">
                {{Form::label('zip', 'Zip')}}
                {{Form::number('zip','' , ['class' => 'form-control', 'placeholder' => 'zipcode'])}}
            </div>
            
            {{Form::hidden('user_id', $id, array('id' => 'invisible_id')) }}
            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'onclick' => 'keepcount()'])}}
        </div>
    
    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        function showDiv() {
            document.getElementById('newAddressForm').style.display = "block";
        }
        var count = -1;
        document.onchange=function(){
          count--;
          console.log(count);
        }
        function goBack() {
          if({{Auth::user()->user_type == 'admin'}}){
            //window.location.href = "/admin";
            if({{$id}} == {{Auth::user()->id}}){
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

    <script>
        $(document).ready(function() {
                $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                
                $("#state-dropdown").html('');
                
                $.ajax({
                url:"{{url('get-states-by-country')}}",
                type: "POST",
                data: {
                country_id: country_id,
                _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function(result){
                $('#state-dropdown').html('<option value="">Select State</option>'); 
                $.each(result.states,function(key,value){
                $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                });
                }
                });
                });    
                
                });     
    </script>
    
    
</div>
@endsection