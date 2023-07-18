@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new Inspection</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_inspection') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">name</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="name" name="name" value="{{ old('name') }}" required>
                                <div class="invalid-tooltip">
                                    Please enter Name
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Inspector</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="inspector" name="inspector_id" value="{{ old('inspector_id') }}">
                                <div class="invalid-tooltip">
                                    Please enter Inspector
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                       

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Inspection date</label>
                                <input type="date" class="form-control" id="validationTooltip05" placeholder="Inspection date"
                                    value="{{ old('inspection_date') }}" name="inspection_date" required >
                                    <div class="invalid-tooltip">
                                        Please enter Inspection date
                                    </div>
                                </div>
                            </div>
                        <!-- End Col -->
                        
                    </div>
                    <!-- End Row -->
                     
                     <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Type</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="inspection_type" required>
                                        <option value="" selected>Select Inspections Type</option>
                                        <option value=1 {{ old('inspection_type') == 1 ? 'selected' : '' }}>move in</option>
                                        <option value=2 {{ old('inspection_type') == 2 ? 'selected' : '' }}>move out</option>
                                        <option value=3 {{ old('inspection_type') == 3 ? 'selected' : '' }}>quarterly</option>
                                        <option value=4 {{ old('inspection_type') == 4 ? 'selected' : '' }}>general</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05" >Inspection time</label>
                                <input type="time" class="form-control" id="validationTooltip05" placeholder="Inspection time"
                                    value="{{ old('inspection_time') }}" name="inspection_time" required >
                                    <div class="invalid-tooltip">
                                        Please enter Inspection time
                                    </div>
                                </div>
                            </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id"
                                        >
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
                    <!-- End Row -->
                     
                     <div class="row">
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
                  
                        <div class="col-md-8">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Notes</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                    value="{{ old('notes') }}" name="notes">
                            </div>
                        </div>
                        <!-- End Col -->
                            </div>

                        
                              <!-- end row -->
                            </div>
 
                    
            <button  class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;"  type="submit"  type="submit">Create</button>
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

    {{-- <script>
        function submit(event) {
            alert('dd');
            e.preventDefault();
            let formdata = new FormData(event.target);
            $.ajax({
                type: 'post',
                url: '{{ route('web_store_property') }}',
                data: formData,
                success: function() {
                    console.log('success');
                },
                error: function() {
                    console.log('errors');
                }
            })

        }
    </script> --}}
@endsection
