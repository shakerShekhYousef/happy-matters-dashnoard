@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show Inspection</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder=" name" value="{{ $inspection['name'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Inspector</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder=" inspector_id" value="{{ $inspection['inspector_id'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Type</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example"readonly>
                                        <option selected>{{ $inspection['inspection_type'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Inspection date</label>
                                <input type="date" class="form-control" id="validationTooltip05" placeholder="Inspection date"
                                    value="{{$inspection['inspection_date']}}" name="inspection_date"  readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Inspection time</label>
                                <input type="time" class="form-control" id="validationTooltip05" placeholder="Inspection time"
                                    value="{{$inspection['inspection_time']}}" name="inspection_time"  readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id">
                                        <option selected>
                                            {{ $inspection['property'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">
                    
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Unit</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_id">
                                        <option selected>
                                            {{ $inspection['unit'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                            <!-- End Col -->
                           
                        
                            <div class="col-md-8">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip09">Notes</label>
                                    <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                        value="{{ $inspection['notes'] }}" name="notes"readonly>
                                </div>
                            </div>
                            <!-- End Col -->
                    </div>
                    
                     <!-- End Row -->
                    </div>

                       
            <a href="{{ route('web_inspections_list') }}" class="btn btn-primary"
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
