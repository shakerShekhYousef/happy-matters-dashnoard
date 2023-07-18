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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new Landlord</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_landlord') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Email</label>
                                <input type="email" class="form-control" id="validationTooltip01"
                                    placeholder="landlord Email" name="email" value="{{ old('email') }}" required>
                                <div class="invalid-tooltip">
                                    Please enter email
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">First Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter first name" name="fname" value="{{ old('fname') }}" required />
                                <div class="invalid-tooltip">
                                    Please enter first name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Last Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter last name" name="lname" value="{{ old('lname') }}" required />
                                <div class="invalid-tooltip">
                                    Please enter last name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">

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
                                <label class="form-label" for="validationTooltip02">Tax Registration Number</label>
                                <input type="number" class="form-control" id="validationTooltip02"
                                    placeholder="Company Tax  Registration Number" name="tax_registration"
                                    value="{{ old('tax_registration') }}">
                                <div class="invalid-tooltip">
                                    Please enter Tax Registration Number
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">National ID</label>
                                <input type="number" class="form-control" id="validationTooltip08"
                                    placeholder="National ID" value="{{ old('national_id') }}" name="national_id">
                                <div class="invalid-tooltip">
                                    Please enter National ID
                                </div>
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
                                    placeholder="National ID Expiry" value="{{ old('national_id_expiry') }}"
                                    name="national_id_expiry">
                                <div class="invalid-tooltip">
                                    Please enter National ID Expiry
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Number</label>
                                <input type="number" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Number" value="{{ old('passport_no') }}" name="passport_no">
                                <div class="invalid-tooltip">
                                    Please enter Passport Number
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Expiry" value="{{ old('passport_expiry') }}"
                                    name="passport_expiry">
                                <div class="invalid-tooltip">
                                    Please enter Passport Expiry
                                </div>
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
                                    value="{{ old('visa_state') }}" name="visa_state">
                                <div class="invalid-tooltip">
                                    Please enter Visa State
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Name of contract</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Name of contract" value="{{ old('name_on_contract') }}"
                                    name="name_on_contract">
                                <div class="invalid-tooltip">
                                    Please enter Name of contract
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Email on contract</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Email on contract" value="{{ old('email_on_contract') }}"
                                    name="email_on_contract">
                                <div class="invalid-tooltip">
                                    Please enter Email on contract
                                </div>
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
                                    placeholder="Phone on contract" value="{{ old('phone_on_contract') }}"
                                    name="phone_on_contract">
                                <div class="invalid-tooltip">
                                    Please enter Phone on contract
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Bank name</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Bank name"
                                    value="{{ old('bank_name') }}" name="bank_name">
                                <div class="invalid-tooltip">
                                    Please enter Bank name
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Bank address</label>
                                <input type="text" class="form-control" id="validationTooltip10"
                                    placeholder="Bank address" value="{{ old('bank_address') }}" name="bank_address">
                                <div class="invalid-tooltip">
                                    Please enter Bank address
                                </div>
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
                                    value="{{ old('iban') }}" name="iban">
                                <div class="invalid-tooltip">
                                    Please enter IBAN
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">SWIFT</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="SWIFT"
                                    value="{{ old('swift') }}" name="swift">
                                <div class="invalid-tooltip">
                                    Please enter SWIFT
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Options</label>
                                <select class="form-select" aria-label="Default select example" name="options" >
                                    <option value="" selected>Select  options</option>
                                    <option value=1 {{ old('options') == 1 ? 'selected' : '' }}>send push notifications</option>
                                    <option value=2 {{ old('options') == 2 ? 'selected' : '' }}>send email notification</option>
                                    <option value=3 {{ old('options') == 3 ? 'selected' : '' }}>auto hold amount in wallet</option>
                                </select>
                                <div class="invalid-tooltip">
                                    Please enter Options
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
                                    value="{{ old('notes') }}" name="notes">
                                <div class="invalid-tooltip">
                                    Please enter Notes
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">

                            <div class="row">
                                <label class="form-label" for="validationTooltip13">Add documents</label>
                                <div class="col-md-12">
                                    <input class="form-control"id="documens_id" type="file" name='documents[]' multiple
                                        accept="application/pdf">
                                    <div class="form-group" id="documentsdiv">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="mt-1 text-center">
                                <div class="documents-preview-div"> </div>
                            </div>
                        </div>
                    
                    </div>
                    <!-- End row -->
            </div>
            <button  class="btn btn-primary"  style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
            $('#documens_id').on('change', function() {
                $('div.documents-preview-div').empty();
                previewDocs(this, 'div.documents-preview-div');
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
