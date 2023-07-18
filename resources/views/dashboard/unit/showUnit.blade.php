@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }

        .documents-preview-div img {
            padding: 10px;
            max-width: 100px;
        }

        .select2 {
            width: 100% !important;
            height: auto !important;
        }

    </style>
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show Unit number {{ $unit['unit_number'] }}</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Unit number</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Unit number"
                                    name="unit_number" value="{{ $unit['unit_number'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter unit number
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Type</label>
                                <div class="col-md-12">
                                 
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="">{{ $unit['unit_type'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Size</label>
                                <input type="text" required data-parsley-min="1" id="validationTooltip04"
                                    class="form-control" placeholder="Size" value="{{ $unit['size'] }}" name="size" readonly/>
                                <div class="invalid-tooltip">
                                    Please enter size value.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Service charges per sqft</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="text"
                                    class="form-control" required data-parsley-min="1"
                                    placeholder="Service charges per sqft" value="{{ $unit['service_charges_per_sqft'] }}"
                                    name="service_charges_per_sqft" readonly/>
                                <div class="invalid-tooltip">
                                    Please enter valid service charges per sqft.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row -->

                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Rent</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" data-parsley-min="1" placeholder="Rent"
                                    value="{{ $unit['rent'] }}" name="rent" readonly/>
                                <div class="invalid-tooltip">
                                    Please enter valid mumber.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Deposit</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" data-parsley-min="1" placeholder="Deposit"
                                    value="{{ $unit['deposit'] }}" name="deposit" readonly/>
                                <div class="invalid-tooltip">
                                    Please enter valid deposit.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Beds</label>
                                <input type="text" class="form-control" id="validationTooltip05" placeholder="Beds"
                                    value="{{ $unit['beds'] }}" name="beds" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Baths</label>
                                <input type="text" class="form-control" id="validationTooltip05" placeholder="Baths"
                                    value="{{ $unit['baths'] }}" name="baths" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row-->

                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Electricity number</label>
                                <input type="text" class="form-control" id="validationTooltip05"
                                    placeholder="Electricity number" value="{{ $unit['electricity_no'] }}"
                                    name="electricity_no" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip07">Municipality number</label>
                                <input type="text" class="form-control" id="validationTooltip07"
                                    placeholder="Municipality number" value="{{ $unit['municipality_no'] }}"
                                    name="municipality_no" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">Gas number</label>
                                <input type="text" class="form-control" id="validationTooltip08" placeholder="Gas number"
                                    value="{{ $unit['gas_no'] }}" name="gas_no" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Number of parkings</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" placeholder="Number of parkings"
                                    value="{{ $unit['no_of_parkings'] }}" name="no_of_parkings" readonly/>
                                <div class="invalid-tooltip" >
                                    Please enter valid number.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Parking number</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Parking number" value="{{ $unit['parking_no'] }}" name="parking_no"readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Unit status</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="">{{ $unit['unit_status'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Unit category</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="">{{ $unit['unit_category'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Compound number</label>
                                <input type="text" class="form-control" id="validationTooltip10"
                                    placeholder="Compound number" value="{{ $unit['compound_no'] }}" name="compound_no" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End row -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Floor</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="Floor"
                                    value="{{ $unit['floor'] }}" name="floor" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Management fee type</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="">{{ $unit['management_fee_type'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Management fee</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" placeholder="Management fee"
                                    value="{{ $unit['management_fee'] }}" name="management_fee" readonly/>
                            </div>
                        </div>
                        <!-- End Col -->


                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">Marketing title</label>
                                <input type="text" class="form-control" id="validationTooltip13"
                                    placeholder="Marketing title" value="{{ $unit['marketing_title'] }}"
                                    name="marketing_title" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label class="col-md-6 form-label">Options</label>
                                <div class="col-md-12">
                                    <select class="js-example-basic-multiple" name="options[]" multiple="multiple" >
                                        @if(!empty($unit['options']))
                                        @foreach ($unit['options'] as $key =>  $option)
                                        <option selected>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                    @endif
                                     
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- End Col -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label class="col-md-6 form-label">Features</label>
                                <div class="col-md-12">
                                    <select class="js-example-basic-multiple" name="features[]" multiple="multiple">
                                        @foreach ($unit['features'] as $key => $feature)
                                            <option selected>
                                                {{ $feature }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- End Col -->

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">Marketing description</label>
                                <input type="text" class="form-control" id="validationTooltip13"
                                    placeholder="Marketing description" value="{{ $unit['marketing_description'] }}"
                                    name="marketing_description" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                      
                     
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id">
                                        <option selected>
                                            {{ $unit['property'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- End Col -->
                           
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <div class="mb-3 position-relative">
                                    <label for="formFile" class="form-label">Property Photo</label>
                                    <div class="images-preview-div">
                                        <a href="{{ asset($unit['property_photo']) }}" target="_blank"><img
                                                src="{{ asset($unit['property_photo']) }}" alt=""  width="100px"
                                                height="100px"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <label class="form-label" for="validationTooltip13">Unit documents</label>
                        <div class="col-md-12 mb-5">
                            <div class="mt-1 text-center">
                                <div class="documents-preview-div">
                                    @foreach ($unit['documents'] as $key => $item)
                                        <a href="{{ asset($item->name) }}" target="_blank">
                                            Doc{{ $key }}.{{ pathinfo(asset($item->name), PATHINFO_EXTENSION) }}<img src="{{ asset('assets/images/pdf.png') }}" alt="" height="50px"
                                                width="50px">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label" for="validationTooltip13">Unit images</label>
                        <div class="col-md-12 mb-5">
                            <div class="mt-1 text-center">
                                <div class="images-preview-div" id="images-preview-div">
                                    @foreach ($unit['lists'] as $item)
                                        <a href="{{ asset($item->name) }}" target="_blank"><img src="{{ asset($item->name) }}" alt="" width="100px" height="100px"></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                    <a href="{{ route('web_units_list') }}"  class="btn btn-primary"
                    style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
                    margin:inherit;"  type="submit">Back</a>
                </form>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // $('#appenddocument').click(function() {
        //     $('#documentsdiv').append("<input type='file' name='documents[]' class='document' placeholder='Choose document'>");
        // });

        // $('#appendimage').click(function() {
        //     $('#imagesdiv').append("<input type='file' name='images[]' class='images' placeholder='Choose image'>");
        // });
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img style="max-height: 150px; max-width: 150px">')).attr('src',
                                event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#documens_id').on('change', function() {
                $('.documents-preview-div').empty();
                previewImages(this, 'div.documents-preview-div');
            });

            $('#lists_id').on('change', function() {
                $('.images-preview-div').empty();
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
