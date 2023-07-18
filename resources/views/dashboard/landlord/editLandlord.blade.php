@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Landlord</h5>
            </div>
            <div class="card-body">

                <form class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_landlord', $landlord['id']) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Email</label>
                                <input type="email" class="form-control" id="validationTooltip01"
                                    placeholder="landlord Email" name="email" value="{{ $landlord['email'] }}"readonly>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">First Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter first name" name="fname" value="{{ $landlord['fname'] }}" />

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Last Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter last name" name="lname" value="{{ $landlord['lname'] }}" />

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
                                    value="{{ $landlord['mobile'] }}" name="mobile">

                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Tax Registration Number</label>
                                <input type="number" class="form-control" id="validationTooltip02"
                                    placeholder="Company Tax  Registration Number" name="tax_registration"
                                    value="{{ $landlord['tax_registration'] }}">

                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">National ID</label>
                                <input type="number" class="form-control" id="validationTooltip08"
                                    placeholder="National ID" value="{{ $landlord['national_id'] }}" name="national_id">
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
                                    name="national_id_expiry">

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Number</label>
                                <input type="number" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Number" value="{{ $landlord['passport_no'] }}" name="passport">

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Expiry" value="{{ $landlord['passport_expiry'] }}"
                                    name="passport_no">

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
                                    value="{{ $landlord['visa_state'] }}" name="visa_state">

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Name of contract</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Name of contract" value="{{ $landlord['name_on_contract'] }}"
                                    name="name_on_contract">

                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Email on contract</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Email on contract" value="{{ $landlord['email_on_contract'] }}"
                                    name="email_on_contract">

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
                                    name="phone_on_contract">

                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Bank name</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Bank name"
                                    value="{{ $landlord['bank_name'] }}" name="bank_name">

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Bank address</label>
                                <input type="text" class="form-control" id="validationTooltip10"
                                    placeholder="Bank address" value="{{ $landlord['bank_address'] }}"
                                    name="bank_address">

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
                                    value="{{ $landlord['iban'] }}" name="iban">

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">SWIFT</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="SWIFT"
                                    value="{{ $landlord['swift'] }}" name="swift">

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Options</label>
                                <select class="form-select" aria-label="Default select example" name="options">
                                    <option value="" selected>Select options</option>
                                    <option {{ $landlord['options'] == 1 ? 'selected' : '' }} value=1
                                        {{ $landlord->options == 1 ? 'selected' : '' }}>send push notifications</option>
                                    <option {{ $landlord['options'] == 2 ? 'selected' : '' }} value=2
                                        {{ $landlord->options == 2 ? 'selected' : '' }}>send email notification</option>
                                   
                                        <option {{ $landlord['options'] == 3 ? 'selected' : '' }} value=3
                                        {{ $landlord->options == 3 ? 'selected' : '' }}>auto hold amount in wallet</option>
                                
                                </select>
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
                                    value="{{ $landlord['notes'] }}" name="notes">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="row">
                            <label class="form-label" for="validationTooltip13">Add documents</label>
                            <div class="col-md-12">
                                <input class="form-control" id="documens_id" type="file" name='documents[]' multiple accept="application/pdf">
                                <div class="form-group" id="documentsdiv">
                                </div>
                            </div>
                            <div class="col-md-12 mb-5">
                                <div class="mt-1 text-center">
                                    <div class="documents-preview-div">
                                        @foreach ($landlord->landlordDocuments() as $key => $item)
                                            <a href="{{ asset($item) }}" target="_blank">Doc{{ $key }}<img
                                                    src="{{ asset('assets/images/pdf.png') }}" alt="" width="50"
                                                    height="50"></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <!-- End row -->
                    </div>
                        <button  class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
                        margin:inherit;"  type="submit">update</button>
                        </div>
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

        $('#documens_id').change(function() {
            $('.documents-preview-div').empty();
            previewDocs(this, 'div.documents-preview-div');
        });
    </script>
@endsection
