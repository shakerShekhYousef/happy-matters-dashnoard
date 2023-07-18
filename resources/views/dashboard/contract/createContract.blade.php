@extends('dashboard.layout.app')
@section('')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="sheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new Contract</h5>
            </div>
            <div class="card-body">
                
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_contract') }}"
                enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                   
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Tenants</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="tenant_id">
                                        <option value="">Select tenant</option>
                                        @forelse ($tenants as $tenant)
                                            <option value="{{ $tenant['id'] }}"
                                                {{ old('country') == $tenant['id'] ? 'selected' : '' }}>
                                                {{  $tenant['fname'] }}
                                            </option>
                                        @empty
                                            <h6>No tenants found</h6>
                                        @endforelse
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
                                        <option value="">Select property</option>
                                        @forelse ($properties as $property)
                                            <option value="{{ $property['id'] }}"
                                                {{ old('country') == $property['id'] ? 'selected' : '' }}>
                                                {{ $property['name'] }}
                                            </option>
                                        @empty
                                            <h6>No properties found</h6>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Units</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_id">
                                        <option value="">Select unit</option>
                                        @forelse ($units as $unit)
                                            <option value="{{ $unit['id'] }}"
                                                {{ old('country') == $unit['id'] ? 'selected' : '' }}>
                                                {{ $unit['unit_number'] }}
                                            </option>
                                        @empty
                                            <h6>No units found</h6>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                     
                </div>
                    <!-- End row -->
                    <div class="row ">
                                <label class="col-md-3 form-label">Is a short time contract?</label>
                                <input type="checkbox" id="switch1" switch="none" name="is_short_term_contract"/>
                                <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                                <!-- End Col -->
                            </div>
                            <!-- End row -->
                            <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip05" >Start date</label>
                                    <input type="date" class="form-control" id="validationTooltip05" placeholder="start date"
                                        value="{{ old('start_date') }}" name="start_date" required >
                                        <div class="invalid-tooltip">
                                            Please enter Start date.
                                        </div>
                                </div>
                            </div>
                            <!-- End Col --> 
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip05" >End date</label>
                                    <input type="date" class="form-control" id="validationTooltip05" placeholder="End date"
                                        value="{{ old('end_date') }}" name="end_date" required >
                                        <div class="invalid-tooltip">
                                            Please enter End date.
                                        </div>
                                </div>
                            </div>
                        <!-- End Col --> 
                        
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Total rent</label>
                                <input  type="number" class="form-control" id="validationTooltip04" placeholder="total_rent"
                                    value="{{ old('total_rent') }}" name="total_rent" required />
                                <div class="invalid-tooltip">
                                    Please enter valid total_rent.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row --> 
                    <div class="row">
                     
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Deposit</label>
                                <input  id="validationTooltip04" type="number" class="form-control"  placeholder="Deposit"
                                    value="{{ old('deposit') }}" name="deposit" required />
                                <div class="invalid-tooltip">
                                    Please enter valid deposit.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Number of rent payments</label>
                                <input  id="validationTooltip04" type="number"
                                    class="form-control" placeholder="Number of rent payments"
                                    value="{{ old('no_of_rent_payments') }}" name="no_of_rent_payments"  />
                                <div class="invalid-tooltip">
                                    Please enter valid number.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                       
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Money held by</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="money_held_by" >
                                        <option value="" selected>Money held by</option>
                                        <option value=1 {{ old('money_held_by') == 1 ? 'selected' : '' }}>landlord</option>
                                        <option value=2 {{ old('money_held_by') == 2 ? 'selected' : '' }}>company</option>
                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row -->
                  
                <div class="row">
                 
                     
                    
                    <div class="col-md-7">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip04">Additional terms</label>
                            <input id="validationTooltip04" type="text" class="form-control"  placeholder="Additional terms"
                                value="{{ old('additional_terms') }}" name="additional_terms"  />
                            <div class="invalid-tooltip">
                                Please enter  additional terms .
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-5">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip04">Remarks</label>
                            <input  id="validationTooltip04" type="text" class="form-control"  placeholder="Remark"
                                value="{{ old('remarks') }}" name="remarks"  />
                            <div class="invalid-tooltip">
                                Please enter  remarks .
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End row -->
                <div class="row">
                
                   
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <div class="mb-3 position-relative">
                                <label for="formFile" class="form-label">Registered tenancy contract</label>
                                <input class="form-control" type="file" id="formFile" name="registered_tenancy_contract">
                            </div>
                        </div>

                    </div>
                    <!-- End Col -->
                    
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <div class="mb-3 position-relative">
                                <label for="formFile" class="form-label">Tenancy contract</label>
                                <input class="form-control" type="file" id="formFile" name="tenancy_contract">
                            </div>
                        </div>

                    </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                        <label class="form-label" for="validationTooltip13">Add documents</label>
                        <div class="col-md-12">
                            <input class="form-control" id="documens_id" type="file" name='documents[]' multiple
                                accept="application/pdf">
                            <!-- <button type="button" id="appenddocument" class="btn btn-primary btn-sm">Add</button> -->
                            <div class="form-group" id="documentsdiv">
                            </div>
                        </div>

                    </div>

                    <!-- End Col -->
                            </div>
                        <!-- End row --> 

                        <div class="row mt-4">
                            <label class="col-md-3 form-label" style="color:black">contract agreement terms</label>
                            
                            <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3 position-relative">
                                           
                                            <div class="col-md-12">
            
                                                <textarea type="text" name="description" class="form-control" id="validationTooltip02" placeholder="description"
                                                value="{{ old('description') }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
   
                           
                                    <!-- end col -->
                               
                            </div>
                             <!-- End row --> 
                        
                    </div> 
                   

            <button class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;" type="submit">Create</button>
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
 <script>
$(document).ready(function() {
    $(".switch2 input").on("change", function(e) {
        const isOn = e.currentTarget.checked;

        if (isOn) {
            $(".hideme1").show();
        } else {
            $(".hideme1").hide();
        }
    });
});
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
