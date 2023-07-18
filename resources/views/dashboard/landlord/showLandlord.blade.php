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

    </style>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show Landlord</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Email</label>
                                <input type="email" class="form-control" id="validationTooltip01"
                                    placeholder="landlord Email" name="email" value="{{ $landlord['email'] }}" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">First Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter first name" name="fname" value="{{ $landlord['fname'] }}"
                                    readonly />

                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Last Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter last name" name="lname" value="{{ $landlord['lname'] }}"
                                    readonly />

                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row  -->

                    <div class="row">



                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Mobile</label>
                                <input type="number" class="form-control" id="validationTooltip09" placeholder="Mobile"
                                    value="{{ $landlord['mobile'] }}" name="mobile" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Tax Registration Number</label>
                                <input type="number" class="form-control" id="validationTooltipTax02"
                                    placeholder="Company Tax  Registration Number" name="tax_registration"
                                    value="{{ $landlord['tax_registration'] }}" readonly>

                            </div>Tax
                        </div>
                        <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">National ID</label>
                                <input type="number" class="form-control" id="validationTooltip08"
                                    placeholder="National ID" value="{{ $landlord['national_id'] }}" name="national_id"
                                    readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row -->
                    <div class="row">


                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">National ID Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip09"
                                    placeholder="National ID Expiry" value="{{ $landlord['national_id_expiry'] }}"
                                    name="national_id_expiry" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Number</label>
                                <input type="number" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Number" value="{{ $landlord['passport_no'] }}" name="passport"
                                    readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Expiry" value="{{ $landlord['passport_expiry'] }}"
                                    name="passport_no" readonly>

                            </div>
                        </div>
                        <!-- End Col -->


                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Visa State</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Visa State"
                                    value="{{ $landlord['visa_state'] }}" name="visa_state" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Name of contract</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Name of contract" value="{{ $landlord['name_on_contract'] }}"
                                    name="name_on_contract" readonly>

                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Email on contract</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Email on contract" value="{{ $landlord['email_on_contract'] }}"
                                    name="email_on_contract" readonly>

                            </div>
                        </div>

                        <!-- End Col -->

                    </div>
                    <!-- End row -->



                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Phone on contract</label>
                                <input type="number" class="form-control" id="validationTooltip09"
                                    placeholder="Phone on contract" value="{{ $landlord['phone_on_contract'] }}"
                                    name="phone_on_contract" readonly>

                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Bank name</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Bank name"
                                    value="{{ $landlord['bank_name'] }}" name="bank_name" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Bank address</label>
                                <input type="text" class="form-control" id="validationTooltip10"
                                    placeholder="Bank address" value="{{ $landlord['bank_address'] }}"
                                    name="bank_address" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">IBAN</label>
                                <input type="number" class="form-control" id="validationTooltip10" placeholder="IBAN"
                                    value="{{ $landlord['iban'] }}" name="iban" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">SWIFT</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="SWIFT"
                                    value="{{ $landlord['swift'] }}" name="swift" readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                      
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Options</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example"readonly>
                                        <option selected>{{ $landlord['options'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row -->


                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Notes</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                    value="{{ $landlord['notes'] }}" name="notes" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    
                    <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-4 form-label"> documents</label>
                        <div class="col-md-12">
                            <div class="row">
                                @forelse ($landlord['documents'] as $key => $document)
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
                    </div>
                    </div>
            </div>

            <a href="{{ route('web_landlords_list') }}"  class="btn btn-primary"
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('#appenddocument').click(function() {
            $('#documentsdiv').append(
                "<input type='file' name='documents[]' class='document' placeholder='Choose document'>");
        });

        $('#appendimage').click(function() {
            $('#imagesdiv').append("<input type='file' name='images[]' class='images' placeholder='Choose image'>");
        });
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#documentsdiv').on('change', '.document', function() {
                previewImages(this, 'div.documents-preview-div');
            });

            $('#imagesdiv').on('change', '.images', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>

@endsection
