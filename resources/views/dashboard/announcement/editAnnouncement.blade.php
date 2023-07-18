@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Announcement</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_announcement', $announcement['id']) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Properties</label>
                            <select class="form-select" aria-label="Default select example" name="property_id">
                                <option selected>{{ $announcement['Property_id'] }}</option>
                                @forelse ($properties as $property)
                                    <option value="{{ $property->id }}"
                                        {{ $announcement->property_id == $property->id ? 'selected' : '' }}>
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
                                <option selected>{{ $announcement['unit_id'] }}</option>
                                @forelse ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ $announcement->unit_id == $unit->id ? 'selected' : '' }}>
                                        {{ $unit['id'] }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->
                    
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Subject</label>
                                <input  id="validationTooltip04" type="text"
                                    class="form-control"   placeholder="Subject"
                                    value="{{ $announcement['subject'] }}" name="subject"  />
                                <div class="invalid-tooltip">
                                    Please enter  subject .
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                 <!-- End row -->
                    <div class="row">
                    
                        <div class="col-md">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02" >Details</label>
                                <div class="col-md-12">
                                    <textarea type="text" class="form-control" name="details" id="validationTooltip02" placeholder="details">{{ $announcement['details'] }} </textarea>
                                    
                                </div>
                            </div>
                        </div>

                        
                        <!-- End Col -->

                    </div>
                    <!-- End row -->
            </div>


            <button class="btn btn-primary"  style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
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
