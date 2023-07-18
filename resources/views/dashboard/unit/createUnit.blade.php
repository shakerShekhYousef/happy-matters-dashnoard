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
                <h5>Create new unit</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_unit') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Unit number</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Unit number"
                                    name="unit_number" value="{{ old('unit_number') }}" required>
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
                                    <select class="form-select" aria-label="Default select example" name="unit_type"
                                        required>
                                        <option value="" selected>Select Unit Type</option>
                                        <option value=1 {{ old('unit_type') == 1 ? 'selected' : '' }}>apartment</option>
                                        <option value=2 {{ old('unit_type') == 2 ? 'selected' : '' }}>tudio</option>
                                        <option value=3 {{ old('unit_type') == 3 ? 'selected' : '' }}>Villa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Size</label>
                                <input type="text" required data-parsley-min="1" id="validationTooltip04"
                                    class="form-control" placeholder="Size" value="{{ old('size', 0) }}" name="size"
                                    required />
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
                                    placeholder="Service charges per sqft"
                                    value="{{ old('service_charges_per_sqft', 0) }}" name="service_charges_per_sqft"
                                    required />
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
                                    class="form-control" required data-parsley-min="1" placeholder="Rent"
                                    value="{{ old('rent', 0) }}" name="rent" required />
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
                                    class="form-control" required data-parsley-min="1" placeholder="Deposit"
                                    value="{{ old('deposit', 0) }}" name="deposit" required />
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
                                    value="{{ old('beds') }}" name="beds" >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Baths</label>
                                <input type="text" class="form-control" id="validationTooltip05" placeholder="Baths"
                                    value="{{ old('baths') }}" name="baths" >
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
                                    placeholder="Electricity number" value="{{ old('electricity_no') }}"
                                    name="electricity_no" >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip07">Municipality number</label>
                                <input type="text" class="form-control" id="validationTooltip07"
                                    placeholder="Municipality number" value="{{ old('municipality_no') }}"
                                    name="municipality_no" >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">Gas number</label>
                                <input type="text" class="form-control" id="validationTooltip08" placeholder="Gas number"
                                    value="{{ old('gas_no') }}" name="gas_no" >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Number of parkings</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" placeholder="Number of parkings"
                                    value="{{ old('no_of_parkings', 0) }}" name="no_of_parkings"  />
                                <div class="invalid-tooltip">
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
                                    placeholder="Parking number" value="{{ old('parking_no') }}" name="parking_no"
                                    >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Unit status</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_status">
                                        <option value="" selected>Select Unit Status</option>
                                        <option value=1 {{ old('unit_status') == 1 ? 'selected' : '' }}>Occupied</option>
                                        <option value=2 {{ old('unit_status') == 2 ? 'selected' : '' }}>Vacant</option>
                                        <option value=3 {{ old('unit_status') == 3 ? 'selected' : '' }}>Sold</option>
                                        <option value=4 {{ old('unit_status') == 4 ? 'selected' : '' }}>Reserved</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="col-md-7 form-label">Unit category</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_category"
                                        >
                                        <option value="" selected>Select Unit Category</option>
                                        <option value=1 {{ old('unit_category') == 1 ? 'selected' : '' }}>Residential
                                        </option>
                                        <option value=2 {{ old('unit_category') == 2 ? 'selected' : '' }}>Commercial
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Compound number</label>
                                <input type="text" class="form-control" id="validationTooltip10"
                                    placeholder="Compound number" value="{{ old('compound_no') }}" name="compound_no"
                                    >
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
                                    value="{{ old('floor') }}" name="floor" >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="col-md-9 form-label">Management fee type</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example"
                                        name="management_fee_type">
                                        <option value="" selected>Select management fee type</option>
                                        <option value=1 {{ old('management_fee_type') == 1 ? 'selected' : '' }}>
                                            Percentage</option>
                                        <option value=2 {{ old('management_fee_type') == 2 ? 'selected' : '' }}>Fixed
                                        </option>
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
                                    value="{{ old('management_fee', 0) }}" name="management_fee"  />
                            </div>
                        </div>
                        <!-- End Col -->


                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">Marketing title</label>
                                <input type="text" class="form-control" id="validationTooltip13"
                                    placeholder="Marketing title" value="{{ old('marketing_title') }}"
                                    name="marketing_title" >
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="mb-2 position-relative">
                                <label class="col-md-6 form-label">Options</label>
                                <div class="col-md-12">
                                    <select class="js-example-basic-multiple" name="options[]" multiple="multiple">
                                        <option value="Under Renovation" {{ old('Options') == 1 ? 'selected' : '' }}>
                                            Under Renovation
                                        </option>
                                        <option value="Under Legal Case" {{ old('Options') == 2 ? 'selected' : '' }}>
                                            Under Legal Case
                                        </option>
                                        <option value="Electricity Under Landlord Name"
                                            {{ old('Options') == 3 ? 'selected' : '' }}>Electricity Under
                                            Landlord Name,</option>
                                        <option value="Landlord is Resident" {{ old('Options') == 4 ? 'selected' : '' }}>
                                            Landlord is Resident
                                        </option>
                                        <option value="Furnished" {{ old('Options') == 5 ? 'selected' : '' }}>Furnished
                                        </option>
                                        <option value="Smoking Allowed" {{ old('Options') == 6 ? 'selected' : '' }}>
                                            Smoking Allowed
                                        </option>
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
                                        @foreach ($features as $feature)
                                            <option value="{{ $feature['id'] }}">
                                                {{ $feature['name'] }}
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
                                    placeholder="Marketing description" value="{{ old('marketing_description') }}"
                                    name="marketing_description" >
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label for="formFile" class="form-label">Property photo</label>
                                <input class="form-control" type="file" required id="formFile" name="property_photo"
                                    required>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id"
                                        required>
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
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <label class="form-label" for="validationTooltip13">Add unit documents</label>
                        
                            <input  class="form-control" id="documens_id" type="file" name='documents[]' multiple accept="application/pdf">
                            <!-- <button type="button" id="appenddocument" class="btn btn-primary btn-sm">Add</button> -->
                            <div class="form-group" id="documentsdiv">
                            </div>
                        
                        <div class="col-md-6 mb-5">
                            <div class="mt-1 text-center">
                                <div class="documents-preview-div"> </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6">
                        <label class="form-label" for="validationTooltip13">Add unit images</label>
                      
                            <input class="form-control" id="lists_id" type="file" name='lists[]' multiple accept="image/png,.jpg,.jpeg">
                            {{-- <button type="button" id="appendimage" class="btn btn-primary btn-sm">Add</button> --}}
                            <div class="form-group" id="imagesdiv">
                            </div>
                       
                        <div class="col-md-6 mb-5">
                            <div class="mt-1 text-center">
                                <div class="images-preview-div" id="images-preview-div">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                   
                        <button  class="btn btn-primary"
                        style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
                        margin:inherit;"  type="submit">Create</button>
                    
                </form>
                <!-- End Form -->
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
    {{-- <script>
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
                            $($.parseHTML('<img style="height: 50px; width: 50px">')).attr('src',
                                "{{ asset('assets/images/pdf.png') }}").appendTo(
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
    </script> --}}

    <script>
        $('#appenddocument').click(function() {
            $('#documentsdiv').append(
                "<input type='file' name='documents[]' class='document' placeholder='Choose document'>");
        });

        $(function() {
            // Multiple images preview with JavaScript
            var previewDocs = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        $($.parseHTML(input.files[i].name + '<img height="50px" width="50px">')).attr('src',
                                "{{ asset('assets/images/pdf.png') }}")
                            .appendTo(
                                imgPreviewPlaceholder);
                    }
                }
            };

            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img style="height: 150px; width: 150px">')).attr('src',
                                event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#documens_id').on('change', function() {
                $('div.documents-preview-div').empty();
                previewDocs(this, 'div.documents-preview-div');
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
