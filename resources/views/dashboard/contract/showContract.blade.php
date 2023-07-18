@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show Contract</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                       
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Tenant</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="tenant_id">
                                        <option selected>
                                            {{ $contract['tenant'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id">
                                        <option selected>
                                            {{ $contract['property'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Unit</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_id">
                                        <option selected>
                                            {{ $contract['unit'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                       
                    </div>
                    <!-- End Row -->
                    <div class="row mt-3">
                       
                        <label class="col-md-3 form-label">Is a short time contract?</label>
                        <input type="checkbox" id="switch1" switch="none"
                        {{ $contract['is_short_term_contract']  }} readonly />
                        <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                       
                    </div>
                    <div class="row">
              
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Start date</label>
                                <input type="date" class="form-control" id="validationTooltip05" placeholder="Start date"
                                    value="{{$contract['start_date']}}" name="start_date"  readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >End date</label>
                                <input type="date" class="form-control" id="validationTooltip05" placeholder="End date"
                                    value="{{$contract['end_date']}}" name="end_date"  readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Total rent</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="text"
                                    class="form-control" readonly data-parsley-min="1" placeholder="Total rent"
                                    value="{{ $contract['total_rent']  }}" name="total_rent" />
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row-->

                    <div class="row">

                     

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Deposit</label>
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Deposit"
                                    value="{{ $contract['deposit'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Number of rent payments</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="text"
                                    class="form-control" readonly data-parsley-min="1" placeholder="Number of rent payments"
                                    value="{{$contract['no_of_rent_payments']  }}" name="no_of_rent_payments" />
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Money held by</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example"readonly>
                                        <option selected>{{ $contract['money_held_by']}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        
                    </div>
                    <!-- End Row-->

                 <div class="row">
                    <div class="col-md-7">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip02">Additional terms</label>
                            <input type="text" class="form-control" id="validationTooltip02" placeholder="Additional terms"
                                value="{{ $contract['additional_terms'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                     <div class="col-md-5">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Remark</label>
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Remark"
                                    value="{{ $contract['remarks']}}" readonly>
                                </div>
                            </div>
                            <!-- End Col -->

                       
                    </div>
                       <!-- End Row-->

                             <div class="row">

                                
                                <div class="col-md-4">
                                    <div class="mb-3 position-relative">
                                        <div class="mb-3 position-relative">
                                            <label for="formFile" class="form-label">Registered tenancy contract</label>
                                            
                                            <div class="form-group" id="imagesdiv">
                                                <div class="images-preview-div">
                                                   
                                                    <a href="{{ asset($contract['registered_tenancy_contract']) }}" target="_blank"><img  src="{{ asset('assets/images/pdf.png') }}" alt="" width="50px"
                                                        height="50px"></a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           
                                </div>
                                <!-- End Col -->
      
         
                                <div class="col-md-4">
                                    <div class="mb-3 position-relative">
                                        <div class="mb-3 position-relative">
                                            <label for="formFile" class="form-label">Tenancy contract</label>
                                            
                                            <div class="form-group" id="imagesdiv">
                                                <div class="images-preview-div">
                                                   
                                                    <a href="{{ asset($contract['tenancy_contract']) }}" target="_blank"><img  src="{{ asset('assets/images/pdf.png') }}" alt="" width="50px"
                                                        height="50px"></a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           
                                </div>
                                    <!-- End Col -->

                                    <div class="col-md-4">
                                        <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label"> documents</label>
                                    
                                        @forelse ($contract['documents'] as $key => $document)
                                            <div class="col-md-2">
                                               <a href="{{ asset($document->name) }}" target="_blank">Doc{{ $key }}<img
                                                        src="{{ asset('assets/images/pdf.png') }}" alt="" width="50"
                                                        height="50"></a>
                                            </div>
                                        @empty
                                            <h6>No documnets</h6>
                                        @endforelse
                                   
                                    </div>
                            </div>
                        </div>
                    <!-- End Row -->
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02" style="color:black">contract agreement terms</label>
                                <div class="col-md-12">
                                    <textarea type="text" class="form-control" id="validationTooltip02" placeholder="description"
                                    readonly>{{ $contract['description'] }}</textarea>
                                    
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    <!-- End Row -->
            </div>

            <a href="{{ route('web_contracts_list') }}"  class="btn btn-primary"
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
