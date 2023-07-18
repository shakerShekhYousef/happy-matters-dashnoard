@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Inspection</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_inspection', $inspection['id']) }}">
                    @csrf
                    <div class="row">
                      
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="name" name="name" value="{{ $inspection['name'] }}" readonly >
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Inspector</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="Inspector" name="inspector_id" value="{{ $inspection['inspector_id'] }}" >
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Type</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="inspection_type">
                                        <option value="" selected>Select inspections Type</option>
                                        <option {{ $inspection['inspection_type'] == 1 ? 'selected' : '' }} value=1
                                            {{ $inspection->type == 1 ? 'selected' : '' }}>move in</option>
                                        <option {{ $inspection['inspection_type'] == 2 ? 'selected' : '' }} value=2
                                            {{ $inspection->type == 2 ? 'selected' : '' }}>move out</option>
                                        <option {{ $inspection['inspection_type'] == 3 ? 'selected' : '' }} value=3
                                            {{ $inspection->type == 3 ? 'selected' : '' }}>quarterl</option>
                                        <option {{ $inspection['inspection_type'] == 4 ? 'selected' : '' }} value=4
                                            {{ $inspection->type == 4 ? 'selected' : '' }}>general</option>
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
                                    value="{{$inspection['inspection_date']}}" name="inspection_date"  >
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Inspection time</label>
                                <input type="time" class="form-control" id="validationTooltip05" placeholder="Inspection time"
                                    value="{{$inspection['inspection_time']}}" name="inspection_time"  >
                            </div>
                        </div>
                        <!-- End Col -->
                       
                        <div class="col-md-4">
                            <label class="form-label">Properties</label>
                            <select class="form-select" aria-label="Default select example" name="property_id">
                                <option selected>{{ $inspection['property_id'] }}</option>
                                @forelse ($properties as $property)
                                    <option value="{{ $property->id }}"
                                        {{ $inspection->property_id == $property->id ? 'selected' : '' }}>
                                        {{ $property['name'] }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->
                        
                    </div>
                    <!-- End Row -->

                    
                        <div class="row">
                     
                         
                           <div class="col-md-4">
                                <label class="form-label">Unit</label>
                                <select class="form-select" aria-label="Default select example" name="unit_id">
                                    <option selected>{{ $inspection['unit_id'] }}</option>
                                    @forelse ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ $inspection->unit_id == $unit->id ? 'selected' : '' }}>
                                            {{ $unit['id'] }}
                                        </option>
                                    @empty
                                        <h6>No unit found</h6>
                                    @endforelse
                                </select>
                            </div>
                            <!-- End Col -->
                            <!-- End Col -->
                        
                            <div class="col-md-8">
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="validationTooltip09">Notes</label>
                                    <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                        value="{{ $inspection['notes'] }}" name="notes">
                                </div>
                            </div>
                            <!-- End Col -->
                            </div>
                                <!-- End Row -->
                            </div>


                        
            <button  class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;"  type="submit">Update</button>
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
