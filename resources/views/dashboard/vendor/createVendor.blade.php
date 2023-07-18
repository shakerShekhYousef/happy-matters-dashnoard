@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new vendor</h5>
            </div>
            <div class="card-body">
                
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_vendor') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Email</label>
                                <input id="validationTooltip01" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                                <div class="invalid-tooltip">
                                    Please enter Email.
                                </div>
                                  @error('email')
                                  
                                       <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                       </span>
                                      @enderror
                                    </div>
                                      </div>
                              <div class="col-md-4">
                               <div class="mb-3 position-relative" >
                            <label class="form-label" for="validationTooltip02" >Password</label>
                            <input id="validationTooltip02" type="password" class="form-control @error('password') is-invalid @enderror"
                         
                              name="password" required autocomplete="current-password"  placeholder="Enter Password">
                              <div class="invalid-tooltip">
                                Please enter Password.
                            </div>
                             @error('password')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                                  </span>
                                 @enderror
                
                                  </div>
                                 </div>
                            <div class="col-md-4">
                        <div class="mb-3 position-relative">
                 <label class="form-label" for="validationTooltip02" >Confirm Password</label>
                   <input id="validationTooltip02" type="password" class="form-control" name="password_confirmation" 
                   required autocomplete="new-password" placeholder="Confirm Password">
                   <div class="invalid-tooltip">
                    Please Confirm Password.
                </div>
                
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                       </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row for email and password -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Company Name</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"  placeholder="Enter Company name"
                                    name="company_name" value="{{ old('company_name') }}" required  />
                                <div class="invalid-tooltip">
                                    Please enter  Company name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                         <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Contact Name</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"  placeholder="Enter Contact name"
                                    name="contact_name"value="{{ old('contact_name') }}" required />
                                <div class="invalid-tooltip">
                                    Please enter Contact name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08"  >Category </label>
                                <input type="text" class="form-control" id="validationTooltip08"
                                    placeholder="Category " value="{{ old('category') }}" name="category" required>
                                    <div class="invalid-tooltip">
                                        Please enter Category
                                    </div>
                            </div>
                        </div>
                       <!-- end col -->
                        

                       
                        
                                </div>
                            <!-- End row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02" >Tax  Registration Number</label>
                                        <input type="number" class="form-control" id="validationTooltip02" placeholder="Company Tax  Registration Number"
                                            name="tax_registration" value="{{ old('tax_registration') }}"required>
                                            <div class="invalid-tooltip">
                                                Please enter Tax  Registration Number 
                                            </div>
                                    </div>
                                    </div>
                                    <!-- end col -->
                                <div class="col-md-4">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip09">Mobile</label>
                                        <input type="number" class="form-control" id="validationTooltip09" placeholder="Mobile"
                                            value="{{ old('mobile') }}" name="mobile" required>
                                            <div class="invalid-tooltip">
                                                Please enter Mobile
                                            </div>
                                    </div>
                                </div>
                                <!-- End Col -->
                                <div class="col-md-4">
                                    <div class="mb-3 position-relative">
                                        <label class="col-md-4 form-label">Country</label>
                                        <div class="col-md-12">
                                            <select class="form-select" aria-label="Default select example" name="country">
                                                <option value="{{ old('country') }}">Select country</option>
                                                @forelse ($countries as $key => $country)
                                                    <option value="{{ $key }}"
                                                        {{ old('country') == $key ? 'selected' : '' }}>{{ $country }}
                                                    </option>
                                                @empty
                                                    <h6>No countries found</h6>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Col -->
                            
                           
                          </div>
                         <!-- End row -->
                     <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                              <label class="form-label" for="validationTooltip10">Address 1</label>
                              <input type="text" class="form-control" id="validationTooltip10" placeholder="Address 1"
                                  value="{{ old('address1') }}"  name="address1">
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
                              value="{{ old('address2') }}"  name="address2">
                          <div class="invalid-tooltip">
                              Please enter address 2
                          </div>
                      </div>
                  </div>
                  <!-- End Col -->
                 
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip12">City</label>
                                <input type="text" class="form-control" id="validationTooltip12" placeholder="City"
                                    value="{{ old('city') }}" name="city">
                                <div class="invalid-tooltip">
                                    Please enter city
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                      
                          </div>
                         <!-- End row -->
 
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip13">State</label>
                            <input type="text" class="form-control" id="validationTooltip13" placeholder="State"
                                value="{{ old('state') }}"  name="state">
                            <div class="invalid-tooltip">
                                Please enter state
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip15">Postcode</label>
                            <input type="text" class="form-control" id="validationTooltip15" placeholder="Postcode"
                                value="{{ old('postcode') }}"  name="postcode">
                            <div class="invalid-tooltip">
                                Please enter postcode
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip09">Notes</label>
                            <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                value="{{ old('notes') }}" name="notes">
                                <div class="invalid-tooltip">
                                    Please enter Notes
                                </div>
                        </div>
                    </div>
                    <!-- End Col -->

                </div>
                        <!-- End row --> 
                        <div class="row mt-3">
                            <label class="col-md-2 form-label"> Auto Assigned</label>
                            <input type="checkbox" id="switch1" switch="none" name="auto_assigned" />
                            <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                     
                   
            
                
            <button  class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;"  type="submit">Create</button>
        
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
                url: '{{ route('web_store_announcement') }}',
                data: formData,
                success: function() {
                    console.log('success');
                },
               
            })

        }
    </script> --}}
@endsection
