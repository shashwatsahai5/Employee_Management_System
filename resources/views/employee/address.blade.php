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
                {{Form::label('country', 'Country')}}
                <select class = "form-control" id = "countryList" name = "country"></select>
            </div>

            <div class = "form-group">
                {{Form::label('state', 'State')}}
                <select class = "form-control" id = "stateList" name = "state"></select>
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
            var countries = new XMLHttpRequest()
            var BATTUTA_KEY="026fb43d98da8f4a8bf0a1630b78009b"
            url="http://battuta.medunes.net/api/country/all/?key="+BATTUTA_KEY;
            countries.open('GET',url,true)
            var list = {};
            countries.onload = function(){
                var data = JSON.parse(this.response)
                data.forEach((c)=>{
                    
                    list[c.name] = c.code;
                    console.log(list[c.name]);
                    let newOption = new Option(c.name,c.name);
                    countryList.add(newOption,undefined);
                })
            }

            countries.send()
            let select = document.querySelector('#countryList');
            select.addEventListener('change', function () {
                var cntry = list[this.value];
                console.log("you selected: " + list[this.value]);
                url2="http://battuta.medunes.net/api/region/"+cntry+"/all/?key="+BATTUTA_KEY;
                var states = new XMLHttpRequest()
                states.open('GET',url2,true)
                //var list2 = {};
                states.onload = function(){
                    var selectobject = document.getElementById("stateList");
                    for (var i=0; i<selectobject.length; i++) {
                        selectobject.remove(i);
                        i--;
                    }
                    var data2 = JSON.parse(this.response)
                    data2.forEach((s)=>{
                        //list2[s.name] = s.code;
                        console.log(s.region);
                        let newOption2 = new Option(s.region,s.region);
                        stateList.add(newOption2,undefined);
                    })
                }
                states.send()


            });

        }
    </script>
</div>
@endsection