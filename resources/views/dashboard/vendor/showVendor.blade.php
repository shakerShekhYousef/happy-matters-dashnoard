@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show vendor</h5>
            </div>
            <div class="card-body">
            <form class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 position-relative">
                        <label class="form-label" for="validationTooltip01" >Email</label>
                        <input type="email" class="form-control" id="validationTooltip01"
                            placeholder="vendor Email"  value="{{ $vendor['email'] }}" readonly >
                       
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
                             value="{{ $vendor['company_name'] }}"  readonly />
                        
                    </div>
                </div>
                <!-- End Col -->

                 <div class="col-md-4">
                    <div class="mb-3 position-relative">
                        <label class="form-label" for="validationTooltip04">Contact Name</label>
                        <input  id="validationTooltip04" type="text"
                            class="form-control"  placeholder="Enter Contact name"
                            value="{{  $vendor['contact_name'] }}" readonly />
                      
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-4">
                    <div class="mb-3 position-relative">
                        <label class="form-label" for="validationTooltip08"  >Category </label>
                        <input type="number" class="form-control" id="validationTooltip08"
                            placeholder="Category " value="{{  $vendor['category'] }}" readonly >
                            
                    </div>
                </div>
                <!-- End Col -->
                

              
                   
                        </div>
                    <!-- End row -->
                    <div class="row">
                  
                    
                    <div class="col-md-4">
                      <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip02" >Tax Registration Number</label>
                                <input type="number" class="form-control" id="validationTooltip02" placeholder="Company Tax  Registration Number"
                                     value="{{  $vendor['tax_registration'] }}" readonly>
                                   
                            </div>
                            </div>
                            <!-- end col -->
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip09">Mobile</label>
                                    <input type="number" class="form-control" id="validationTooltip09" placeholder="Mobile"
                                        value="{{  $vendor['mobile'] }}" readonly >
                                        
                                </div>
                            </div>
                            <!-- End Col -->
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip12">Country</label>
                                    <input type="text" class="form-control" id="validationTooltip12" placeholder="Postcode"
                                        value="{{  $vendor['country'] }}" readonly>
                                  
                                </div>
                            </div>
                           
                           
                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4 position-relative">
                              <label class="form-label" for="validationTooltip10">Address 1</label>
                              <input type="text" class="form-control" id="validationTooltip10" placeholder="Address 1"
                                  value="{{  $vendor['address1'] }}"   readonly>
                              
                          </div>
                      </div>
                      <!-- End Col -->
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">Address 2</label>
                            <input type="text" class="form-control" id="validationTooltip11" placeholder="Address 2"
                                value="{{  $vendor['address2'] }}"   readonly>
                            
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip12">City</label>
                            <input type="text" class="form-control" id="validationTooltip12" placeholder="City"
                                value="{{  $vendor['city'] }}" readonly>
                          
                        </div>
                    </div>
                    <!-- End Col -->
                  
                 
                    
                  </div>
                 <!-- End row -->
                 <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip11">State </label>
                            <input type="text" class="form-control" id="validationTooltip11" placeholder="State "
                                value="{{  $vendor['state'] }}"   readonly>
                            
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip12">Postcode</label>
                            <input type="text" class="form-control" id="validationTooltip12" placeholder="Postcode"
                                value="{{  $vendor['postcode'] }}" readonly>
                          
                        </div>
                    </div>
                    <!-- End Col -->
                   
                  

                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip09">Notes</label>
                            <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                value="{{  $vendor['notes'] }}"readonly>
                                
                        </div>
                    </div>
                    <!-- End Col -->
        </div>
        <!-- End row -->

                 <div class="row mt-3">
                     
                    
                    <label class="col-md-2 form-label">Auto Assigned</label>
                    <input type="checkbox" id="switch1" switch="none"
                        {{ $vendor['auto_assigned'] ? 'checked' : '' }} readonly />
                    <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                    <!-- End Col -->
                </div>
                 <!-- End row --> 
            </div>
              
            
               
            
            

            <a href="{{ route('web_vendors_list') }}"  class="btn btn-primary"
            style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;"  type="submit">Back</a>
            {{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
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
@endsection
