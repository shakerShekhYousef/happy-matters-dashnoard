@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<script src = "/html/script.js" type = "text/javascript"/></script>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Update Tenant</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_update_tenant', $tenant['id']) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01" style="color:black;font-size:20px">Email</label>
                                <input type="email" class="form-control" id="validationTooltip01"
                                    placeholder="Tenant Email" name="email" value="{{$tenant['email']}}"  >
                                <div class="invalid-tooltip">
                                    Please enter email
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02" style="color:black;font-size:20px">Password</label>
                                <input type="password" class="form-control" id="validationTooltip02" placeholder="Tenant  Password"
                                    name="password" value="{{$tenant['password']}}" >
                            </div>
                        </div>
                        
                    </div>
                    <!-- End Row for email and password -->
                    @if($tenant['is_company'] == 1)
                    <div class="row mt-3">
                        <label class="col-md-2 form-label"  style="color:black">Is Company</label>
                        <input type="radio" id="switch1" switch="none" name="is_company"     checked/>
                        <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                        <!-- End Col -->
                    </div>
                    @endif
                    @if($tenant['is_company'] != 1)
                    <div class="row mt-3">
                        <label class="col-md-2 form-label"  style="color:black">Is Company</label>
                        <input type="radio" id="switch1" switch="none" name="is_company" onchange="hola()"  />
                        <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                        <!-- End Col -->
                    </div>
                    @endif
                    <!-- end row -->
                    <br>
                  
                    @if($tenant['is_company'] == 1)

<div class="row"  id="company" >
<div class="col-md-3">
        <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip02" >Company Name</label>
            <input type="text" class="form-control" id="validationTooltip02" placeholder="Company Name"
                name="company_name" value="{{$tenant['company_name']}}"  >

        </div>
        </div>
        <!-- end col -->
        <div class="col-md-3">
        <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip02" >Trade License</label>
            <input type="text" class="form-control" id="validationTooltip02" placeholder="Company Trade License"
                name="trade_license" value="{{$tenant['trade_license']}}" >

        </div>
        </div>
        <!-- end col -->
        <div class="col-md-3">
        <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip02" >Trade License Expiry</label>
            <input type="date" class="form-control" id="validationTooltip02" placeholder="Company Trade License Expiry"
                name="trade_license_expiry" value="{{$tenant['trade_license_expiry']}}"  >

        </div>
        </div>
        <!-- end col -->
        <div class="col-md-3">
        <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip02" >Tax  Registration Number</label>
            <input type="number" class="form-control" id="validationTooltip02" placeholder="Company Tax  Registration Number"
                name="tax_registration" value="{{$tenant['tax_registration']}}" >  

        </div>
        </div>
        <!-- end col -->
</div>
<!-- end row -->
@endif
<br><br>
                    <div class="row">

                       

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">First Name</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"  placeholder="Enter first name"
                                    value="{{$tenant['fname']}}" name="fname"  />
                                <div class="invalid-tooltip">
                                    Please enter valid fist name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Middle Name</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"  placeholder="Enter middle name"
                                    value="{{$tenant['mname']}}" name="mname" />
                                <div class="invalid-tooltip">
                                    Please enter valid middle name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Last Name</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"  placeholder="Enter last name"
                                    value="{{$tenant['lname']}}" name="lname" />
                                <div class="invalid-tooltip">
                                    Please enter valid lname name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    <!-- End Row for names-->

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Date Of Brith</label>
                                <input type="date" class="form-control" id="validationTooltip05" placeholder="Date of Brith"
                                    value="{{$tenant['dob']}}" name="dob"  >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Gender</label>
                                <select  class="form-control" id="validationTooltip05"  name="gender"  >
                                <option >{{$tenant['gender']}}</option>
                                @if($tenant['gender'] == 'male')
                                <option>female</option>
                                @endif
                                @if($tenant['gender'] == 'female')
                                <option>female</option>
                                @endif
                               
                                    </select>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip07" >Marital Status</label>
                                <input type="text" class="form-control" id="validationTooltip07" placeholder="Marital Status"
                                    value="{{$tenant['marital_status']}}" name="marital_status"  >
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">Phone</label>
                                <input type="text" class="form-control" id="validationTooltip08"
                                    placeholder="Tenant Phone" value="{{$tenant['phone']}}" name="phone"  >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Additional Phone1</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Additional Phone1"
                                    value="{{$tenant['additional_phone1']}}" name="additional_phone1" >
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Additional Phone2</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Additional Phone2"
                                    value="{{$tenant['additional_phone2']}}" name="additional_phone2"  >
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <div class="row">

<div class="col-md-3">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip08"  >National ID</label>
        <input type="number" class="form-control" id="validationTooltip08"
            placeholder="National ID" value="{{$tenant['national_id']}}" name="national_id"  >
    </div>
</div>
<!-- End Col -->

<div class="col-md-2">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip09"  >National ID Expiry</label>
        <input type="date" class="form-control" id="validationTooltip09" placeholder="National ID Expiry"
            value="{{$tenant['national_id_expiry']}}" name="national_id_expiry"  >  
    </div>
</div>
<!-- End Col -->
<div class="col-md-2">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip09"  >Passport Number</label>
        <input type="number" class="form-control" id="validationTooltip09" placeholder="Passport Number"
            value="{{$tenant['passport']}}" name="passport"  >
    </div>
</div>
<!-- End Col -->
<div class="col-md-2">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip09"  >Passport Expiry</label>
        <input type="date" class="form-control" id="validationTooltip09" placeholder="Passport Expiry"
            value="{{$tenant['passport_expiry']}}" name="passport_expiry"  >
    </div>
</div>
<!-- End Col -->
<div class="col-md-3">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip09"  >Visa State</label>
        <input type="text" class="form-control" id="validationTooltip09" placeholder="Visa State"
            value="{{$tenant['visa_state']}}" name="visa_state" >
    </div>
</div>
<!-- End Col -->

</div>
<div class="row">

<div class="col-md-3">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip10">Home County</label>
      <select class="form-control" name="home_country_id"  >
      <option value="{{$tenant['home_country_id']->id}}">{{$tenant['home_country_id']->name}}</option>
      @foreach($countries as $country)
      @if($country->name != $tenant['home_country_id']->name)
      <option value="{{$country->id}}">{{$country->name}}</option>
      @endif
      @endforeach
      </select>
    </div>

</div>
<!-- End Col -->

<div class="col-md-3">
    <div class="mb-3 position-relative">
        <label class="form-label" for="validationTooltip10">County</label>
      <select class="form-control" name="country_id"  >
      <option value="{{$tenant['country_id']->id}}">{{$tenant['country_id']->name}}</option>
      @foreach($countries as $country)
      @if($country->name != $tenant['country_id']->name)
      <option value="{{$country->id}}">{{$country->name}}</option>
      @endif
      @endforeach

      </select>
    </div>
    </div>

    <div class="col-md-3">
         <div class="mb-3 position-relative">
     <label class="form-label" for="validationTooltip10">City</label>
     <input type="text" class="form-control" id="validationTooltip10" placeholder="City"
            value="{{$tenant['city']}}"  name="city"  >
                               
        </div>
    </div>
    <div class="col-md-3">
         <div class="mb-3 position-relative">
     <label class="form-label" for="validationTooltip10">State</label>
     <input type="text" class="form-control" id="validationTooltip10" placeholder="State"
            value="{{$tenant['state']}}"  name="state" >
                               
        </div>
    </div>

</div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Address 1</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="Address 1"
                                    value="{{$tenant['address1']}}"  name="address1" >
                                <div class="invalid-tooltip">
                                    Please enter address 1
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Address 2</label>
                                <input type="text" class="form-control" id="validationTooltip11" placeholder="Address 2"
                                    value="{{$tenant['address2']}}"  name="address2" >
                                <div class="invalid-tooltip">
                                    Please enter address 2
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Postcode</label>
                                <input type="text" class="form-control" id="validationTooltip11" placeholder="Postcode"
                                    value="{{$tenant['postcode']}}"  name="postcode"  >
                                <div class="invalid-tooltip">
                                    Please enter postcode
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- end row -->
                    <div class="row">
                    <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">National ID Photo</label>
                                <input type="file" class="form-control" id="validationTooltip11" placeholder="Enter National ID Photo"
                                    value="{{$tenant['national_id_photo']}}"  name="national_id_photo" >
                                
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Passport Photo</label>
                                <input type="file" class="form-control" id="validationTooltip11" placeholder="Enter National ID Photo"
                                    value="{{$tenant['passport_photo']}}"  name="passport_photo" >
                                
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Visa Photo</label>
                                <input type="file" class="form-control" id="validationTooltip11" placeholder="Enter National ID Photo"
                                    value="{{$tenant['visa_photo']}}"  name="visa_photo"  >
                                
                            </div>
                        </div>
                       
                    </div>
                    <!-- end row -->
                    <div class="row">
                    <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Additional Documents</label>
                                <input type="file" class="form-control" id="validationTooltip11" 
                                    value="{{ old('document_name') }}"  name="documnet_name">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">  Guest Type</label>
                                <select  class="form-control" name="guest_type">
                                <option>{{$tenant['guests']['0']->guest_type}}</option>
                                <option>spouse</option>
                                <option>kid</option>
                                <option>roommate</option>
                                <option>relative</option>
                                <option>maid</option>
                                </select>
                            </div>
                            </div>
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Name</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="Guest Name"
                                    value="{{$tenant['guests']['0']->guest_name}}"   name="guest_name">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Age</label>
                                <input type="number" class="form-control" id="validationTooltip11"  placeholder="Guest Age"
                                    value="{{$tenant['guests']['0']->age}}"   name="guest_age">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Nationality</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="Guest Nationality"
                                    value="{{$tenant['guests']['0']->nationality}}"   name="guest_nationality">
                            </div>
                            </div> -->

                    </div>
                    <br><br>
                    <!-- end row -->
                    <div class="row" id="pet" >
                    <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Pet Type</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="Pet Type"
                                    value="{{$tenant['pets']['0']->pet_type}}"   name="pet_type">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Pet Name</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="Pet Name"
                                    value="{{$tenant['pets']['0']->pet_name}}"   name="pet_name">
                            </div>
                            </div> -->
                    </div>
                    <br><br>
                    <div class="row" id="vehicles" >
                    <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Vehicle Type</label>

                            <!-- <select  class="form-control" name="vehicle_type">
                            <option>{{$tenant['vehicles']['0']->vehicle_type}}</option>
                            <option>utomobile</option>
                            <option>motorcycle</option>
                            <option>truck</option>
                            <option>van</option>
                            </select>
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Make</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="make"
                                    value="{{$tenant['vehicles']['0']->make}}"   name="make">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Model</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="model"
                                    value="{{$tenant['vehicles']['0']->model}}"   name="model">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Year</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="year"
                                    value="{{$tenant['vehicles']['0']->year}}"   name="year">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Color</label>
                                <input type="text" class="form-control" id="validationTooltip11"  placeholder="color"
                                    value="{{$tenant['vehicles']['0']->color}}"   name="color">
                            </div>
                            </div> -->
                            <!-- end col -->
                            <!-- <div class="col-md-3">
                            <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Plate Number</label>
                                <input type="number" class="form-control" id="validationTooltip11"  placeholder="plate_number"
                                    value="{{$tenant['vehicles']['0']->plate_no}}"   name="plate_no">
                            </div>
                            </div>
                    </div> -->

                    <!-- end row -->
                    <div class="row">
                    <div class="col-md-12">
                    <div class="mb-3 position-relative">
                    <label class="form-label" for="validationTooltip11">Notes</label>

                    <textarea  class="form-control" name="notes"  >{{$tenant['notes']}}</textarea>
                    </div>

                    </div>


                    </div>

                    

                        

                        
                    </div>

                   
                  
                    <button class="btn btn-primary" type="submit">Update</button>

            </form>
            <!-- End Form -->
        </div>
        <!-- End Cardbody -->
    </div>
    <!-- end card -->
    </div>
@endsection
@section('scripts')
    <!-- parsley plugin -->
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <!-- validation init -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $('.js-example-basic-multiple').select2();
    </script>

    {{-- <script>
        function submit(event) {
            alert('dd');
            e.preventDefault();
            let formdata = new FormData(event.target);
            $.ajax({
                type: 'post',
                url: '{{ route('web_store_tenant') }}',
                data: formData,
                success: function() {
                    console.log('success');
                },
                error: function() {
                    console.log('errors');
                }
            })

        }
    </script> --}}
    <script>
    function hola(){

    var checkbox = document.getElementById('switch1').value;

    var company = document.getElementById('company');
    if( checkbox === "on"){
        company.style.display="block" ;
    } 
    if( checkbox === "off"){
        company.style.display="none" ;
    } 
    }
    function hola1(){

var checkbox = document.getElementById('switch2').value;

var guest = document.getElementById('guest');
if( checkbox === "on"){
    guest.style.display="block" ;
} 
if( checkbox === "off"){
    guest.style.display="none" ;
} 
}
function hola2(){

var checkbox = document.getElementById('switch3').value;

var guest = document.getElementById('pet');
if( checkbox === "on"){
    guest.style.display="block" ;
} 
if( checkbox === "off"){
    guest.style.display="none" ;
} 
}
function hola3(){

var checkbox = document.getElementById('switch4').value;

var guest = document.getElementById('vehicles');
if( checkbox === "on"){
    guest.style.display="block" ;
} 
if( checkbox === "off"){
    guest.style.display="none" ;
} 
}
    </script>
@endsection
<!--  -->