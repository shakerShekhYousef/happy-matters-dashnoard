@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="sheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show Announcement</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                     
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id">
                                        <option selected>
                                            {{ $announcement['property'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Unit</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_id">
                                        <option selected>
                                            {{ $announcement['unit'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Subject</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="validationTooltip01"
                                        placeholder="Announcement subject" name="subject"
                                        value="{{ $announcement['subject']  }}" readonly>
                                    <div class="invalid-tooltip">
                                        Please enter subject
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Details</label>
                                <div class="col-md-12">

                                    <textarea type="text" name="details" class="form-control" id="validationTooltip01"
                                        readonly>{{ $announcement['details'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <a href="{{ route('web_announcements_list') }}" class="btn btn-primary"
                    style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
                    margin:inherit;"  type="submit">Back</a>
                </form>
            </div>
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
