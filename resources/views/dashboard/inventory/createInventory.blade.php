@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new Inventory</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_inventory') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder=" name"
                                    name="item_name" value="{{ old('item_name') }}" required>
                                <div class="invalid-tooltip">
                                    Please enter name
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Location</label>
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Location"
                                    name="item_location" value="{{ old('item_location') }}" required>
                                <div class="invalid-tooltip">
                                    Please enter Location.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip03">Qty</label>
                                <input data-parsley-type="digits" id="validationTooltip03" type="number"
                                    class="form-control" required placeholder="Enter only digits"
                                    value="{{ old('item_qty', 0) }}" name="item_qty" />
                                <div class="invalid-tooltip">
                                    Please enter Qty.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="validationTooltip11">Unit number</label>
                            <select name="unit" id="" class="form-select" required>
                                        <option value="">Select unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->unit_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Photo</label>
                                <input type="file" class="form-control" id="validationTooltip11" placeholder="Enter Photo"
                                    value="{{ old('photo') }}" name="photo" required>
                                <div class="invalid-tooltip">
                                    Please enter Photo
                                </div>

                            </div>
                        </div>
                        <!-- End Col -->
                       
                    </div>
                    <!-- end row -->
            </div>

            <button class="btn btn-primary"  style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
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
@endsection
