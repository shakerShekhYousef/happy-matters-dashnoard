@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Contract</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_contract', $contract['id']) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                 
                        <div class="col-md-4">
                            <label class="form-label">Tenant</label>
                            <select class="form-select" aria-label="Default select example" name="tenant_id">
                                <option selected>{{ $contract['unit_id'] }}</option>
                                @forelse ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}"
                                        {{ $contract->tenant_id == $tenant->id ? 'selected' : '' }}>
                                        {{ $tenant['fname'] }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->

                      
                        <div class="col-md-4">
                            <label class="form-label">Properties</label>
                            <select class="form-select" aria-label="Default select example" name="property_id">
                                <option selected>{{ $contract['Property_id'] }}</option>
                                @forelse ($properties as $property)
                                    <option value="{{ $property->id }}"
                                        {{ $contract->property_id == $property->id ? 'selected' : '' }}>
                                        {{ $property['name'] }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->

                     
                        <div class="col-md-4">
                            <label class="form-label">Unit</label>
                            <select class="form-select" aria-label="Default select example" name="unit_id">
                                <option selected>{{ $contract['unit_id'] }}</option>
                                @forelse ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ $contract->unit_id == $unit->id ? 'selected' : '' }}>
                                        {{ $unit['id'] }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->
                      
                    </div>
                    <!-- End Row -->

                    <div class="row mt-3">
                       
                            <label class="col-md-3 form-label">Is a short time contract?</label>
                            <input type="checkbox" id="switch1" switch="none"
                                {{  $contract['is_short_term_contract']  ? 'checked' : '' }} name="is_short_term_contract" />
                            <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                           
                        </div>
                        <div class="row">
                        
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Start date</label>
                                <input type="date" class="form-control" id="validationTooltip05" placeholder="start date"
                                    value="{{ $contract['start_date'] }}" name="start_date" >
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
                                    value="{{ $contract['end_date'] }}" name="end_date" >
                                    <div class="invalid-tooltip">
                                        Please enter End date.
                                    </div>
                            </div>
                        </div>
                    <!-- End Col -->
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" for="validationTooltip04">Total rent</label>
                            <input data-parsley-type="digits" id="validationTooltip04" type="text"
                                class="form-control" required data-parsley-min="1" placeholder="Total rent"
                                value="{{ $contract['total_rent'] }}" name="total_rent" />
                            <div class="invalid-tooltip">
                                Please enter valid mumber.
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                
                    </div>
                    <!-- End Row-->

                    <div class="row">
                       
    
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Deposit</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="text"
                                    class="form-control" required data-parsley-min="1" placeholder="Deposit"
                                    value="{{ $contract['deposit'] }}" name="deposit"  />
                                <div class="invalid-tooltip">
                                    Please enter valid deposit.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Number of rent payments</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" placeholder="Number of rent payments"
                                    value="{{ $contract['no_of_rent_payments'] }}" name="no_of_rent_payments" />
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
                                    <select class="form-select" aria-label="Default select example" name="money_held_by">
                                        <option value="" selected>Select Money held bye</option>
                                        <option {{ $contract['money_held_by'] == 1 ? 'selected' : '' }} value=1
                                            {{ $contract->money_held_by == 1 ? 'selected' : '' }}>landlord</option>
                                        <option {{ $contract['money_held_by'] == 2 ? 'selected' : '' }} value=2
                                            {{ $contract->money_held_by == 2 ? 'selected' : '' }}>company</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <div class="row">
                      
                        <!-- End Col -->

                       
                       
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Additional terms</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="text"
                                    class="form-control"  data-parsley-min="1" placeholder="Additional terms"
                                    value="{{ $contract['additional_terms'] }}" name="additional_terms"  />
                                <div class="invalid-tooltip">
                                    Please enter  additional terms .
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Remark</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"   placeholder="Remark"
                                    value="{{ $contract['remarks'] }}" name="remarks"  />
                                <div class="invalid-tooltip">
                                    Please enter  remarks .
                                </div>
                            </div>
                        </div>

                    </div>
                         <!-- End row -->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <div class="mb-3 position-relative">
                                    <label for="formFile" class="form-label">Registered tenancy contract</label>
                                    <input class="form-control" type="file" id="formFile" name="registered_tenancy_contract">
                                    <div class="form-group" id="imagesdiv">
                                        <div class="images-preview-div">
                                           
                                            <a href="{{ asset($contract['registered_tenancy_contract']) }}" target="_blank"><img src="{{ asset('assets/images/pdf.png') }}" alt="" height="50px"
                                                width="50px"></a>
                                           
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
                                    <input class="form-control" type="file" id="formFile" name="tenancy_contract">
                                    <div class="form-group" id="imagesdiv">
                                        <div class="images-preview-div">
                                           
                                            <a href="{{ asset($contract['tenancy_contract']) }}" target="_blank"><img src="{{ asset('assets/images/pdf.png') }}" alt="" height="50px"
                                                width="50px"></a>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Col -->
                   
                         <div class="col-md-4">
                            <label class="form-label" for="validationTooltip13">Add documents</label>
                            <div class="col-md-12">
                                <input  class="form-control" id="documens_id" type="file" name='documents[]' multiple accept="application/pdf">
                                
                                <div class="form-group" id="documentsdiv">
                                    <div class="documents-preview-div">
                                        @foreach ($contract['documents'] as $key => $item)
                                            <a href="{{ asset($item->name) }}" target="_blank">
                                                Doc{{ $key }}.{{ pathinfo(asset($item->name), PATHINFO_EXTENSION) }}<img src="{{ asset('assets/images/pdf.png') }}" alt="" height="50px"
                                                    width="50px">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        </div>
                        <!-- End row -->
                        <div class="row">
                            <div class="col-md">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip02" style="color:black">contract agreement terms</label>
                                    <div class="col-md-12">
                                        <textarea type="text" class="form-control" name="description" id="validationTooltip02" placeholder="description">{{ $contract['description'] }} </textarea>
                                        
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    <!-- End row -->
                </div>




            <button class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;" type="submit">Update</button>
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
