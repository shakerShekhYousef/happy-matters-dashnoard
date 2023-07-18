@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show Inventory Item</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="Inventory name" name="item_name"
                                    value="{{ $inventory_item->item_name }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Location</label>
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Location"
                                    value="{{ $inventory_item->item_location }}" name="item_location" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip03">Qty</label>
                                <input data-parsley-type="digits" id="validationTooltip03" type="number"
                                    class="form-control" value="{{ $inventory_item->item_qty }}" name="item_qty"
                                    readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="validationTooltip11">Unit number</label>
                            <select name="unit" id="" class="form-select" required>
                                <option value="">{{ $inventory_item->unit_id }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationTooltip11">Photo </label>
                    
                            <div class="mb-3 position-relative">
                                <a href="{{ asset($inventory_item->photo) }}" target="_blank"><img src="{{ asset($inventory_item->photo) }}" alt="" width="100px" height="100px"></a>
                           
                        </div>
                    </div>

                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                
                </div>
                <a href="{{ route('web_inventory_list') }}"  class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
                margin:inherit;"  type="submit">Back</a>
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
    </script>
@endsection
