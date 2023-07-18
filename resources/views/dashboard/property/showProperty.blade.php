@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Show property</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="Property name" value="{{ $property['name'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Tags</label>
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Tags"
                                    value="{{ $property['tags'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip03">Sale value</label>
                                <input data-parsley-type="digits" id="validationTooltip03" type="number"
                                    class="form-control" value="{{ $property['sale_value'] }}" readonly />
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Type</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>{{ $property['type'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Floors</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" required placeholder="Enter only digits"
                                    value="{{ $property['floors'] }}" readonly />
                                <div class="invalid-tooltip">
                                    Please enter valid mumber.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Area</label>
                                <input data-parsley-type="digits" id="validationTooltip04" type="number"
                                    class="form-control" required placeholder="Enter only digits"
                                    value="{{ $property['area'] }}" readonly />
                                <div class="invalid-tooltip">
                                    Please enter valid mumber.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Permit number</label>
                                <input type="text" class="form-control" id="validationTooltip05"
                                    placeholder="Permit number" value="{{ $property['permit_number'] }} "
                                    name="permit_number" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row-->

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Plot</label>
                                <input type="text" class="form-control" id="validationTooltip05" placeholder="Plot"
                                    value="{{ $property['plot'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Makani number</label>
                                <input type="text" class="form-control" id="validationTooltip05"
                                    placeholder="Makani number" value="{{ $property['makani_number'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip07">Community</label>
                                <input type="text" class="form-control" id="validationTooltip07" placeholder="Community"
                                    value="{{ $property['community'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">Sub community</label>
                                <input type="text" class="form-control" id="validationTooltip08"
                                    placeholder="Sub Community" value="{{ $property['sub_community'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-8">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Notes</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                    value="{{ $property['notes'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Address 1</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="Address 1"
                                    value="{{ $property['address1'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter address 1
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Address 2</label>
                                <input type="text" class="form-control" id="validationTooltip11" placeholder="Address 2"
                                    value="{{ $property['address2'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter address 2
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip12">City</label>
                                <input type="text" class="form-control" id="validationTooltip12" placeholder="City"
                                    value="{{ $property['city'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter city
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">State</label>
                                <input type="text" class="form-control" id="validationTooltip13" placeholder="State"
                                    value="{{ $property['state'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter state
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Country</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="">{{ $property['country'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip15">Postcode</label>
                                <input type="text" class="form-control" id="validationTooltip15" placeholder="Postcode"
                                    value="{{ $property['postcode'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter postcode
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip15">Alert message</label>
                                <input type="text" class="form-control" id="validationTooltip15"
                                    placeholder="Alert message" value="{{ $property['alert_message'] }}" readonly>
                                <div class="invalid-tooltip">
                                    Please enter alert message
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <label class="form-label">Landlord</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>{{ $property['landlord'] }}</option>
                            </select>
                            <div class="mb-3 position-relative">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">
                        <label class="col-md-2 form-label">Amenities</label>
                        <select class="js-example-basic-multiple" name="amenities[]" multiple="multiple" >
                            <option value=""></option>
                            @forelse ($property['amenities'] as $amenity)
                                <option value="{{ $amenity->name }}" selected>{{ $amenity->name }}</option>
                            @empty
                                <h6>No amenities found</h6>
                            @endforelse
                        </select>
                    </div>
                    <!-- End Row -->

                    <div class="row mt-3">
                        <label class="col-md-2 form-label">Maintenance active</label>
                        <input type="checkbox" id="switch1" switch="none"
                            {{ $property['maintenance_active'] ? 'checked' : '' }} readonly />
                        <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                    <a href="{{ route('web_properties_list') }}"  class="btn btn-primary"
                    style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
                    margin:inherit;"  type="submit">Back</a>
            </div>

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
