@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit property</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_property', $property['id']) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="Property name" name="name" value="{{ $property['name'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Tags</label>
                                <input type="text" class="form-control" id="validationTooltip02" placeholder="Tags"
                                    value="{{ $property['tags'] }}" name="tags">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip03">Sale value</label>
                                <input data-parsley-type="digits" id="validationTooltip03" type="number"
                                    class="form-control" value="{{ $property['sale_value'] }}" name="sale_value" />
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
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option value="" selected>Select Property Type</option>
                                        <option {{ $property['type'] == 1 ? 'selected' : '' }} value=1
                                            {{ $property->type == 1 ? 'selected' : '' }}>Residential</option>
                                        <option {{ $property['type'] == 2 ? 'selected' : '' }} value=2
                                            {{ $property->type == 2 ? 'selected' : '' }}>Commercial</option>
                                        <option {{ $property['type'] == 3 ? 'selected' : '' }} value=3
                                            {{ $property->type == 3 ? 'selected' : '' }}>Mixed</option>
                                        <option {{ $property['type'] == 4 ? 'selected' : '' }} value=4
                                            {{ $property->type == 4 ? 'selected' : '' }}>Hotel</option>
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
                                    value="{{ $property['floors'] }}" name="floors" />
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
                                    value="{{ $property['area'] }}" name="area" />
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
                                    placeholder="Permit number" value="{{ $property['permit_number'] }}"
                                    name="permit_number">
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
                                    value="{{ $property['plot'] }}" name="plot">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Makani number</label>
                                <input type="text" class="form-control" id="validationTooltip05"
                                    placeholder="Makani number" value="{{ $property['makani_number'] }}"
                                    name="makani_number">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip07">Community</label>
                                <input type="text" class="form-control" id="validationTooltip07" placeholder="Community"
                                    value="{{ $property['community'] }}" name="community">
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">Sub community</label>
                                <input type="text" class="form-control" id="validationTooltip08"
                                    placeholder="Sub Community" value="{{ $property['sub_community'] }}"
                                    name="sub_community">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-8">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Notes</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Notes"
                                    value="{{ $property['notes'] }}" name="notes">
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Address 1</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="Address 1"
                                    value="{{ $property['address1'] }}" name="address1" required>
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
                                    value="{{ $property['address2'] }}" required name="address2">
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
                                    value="{{ $property['city'] }}" name="city">
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
                                    value="{{ $property['state'] }}" required name="state">
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
                                    <select class="form-select" aria-label="Default select example" name="country">
                                        {{-- <option value="">{{ $property['country'] }}</option> --}}
                                        @forelse ($countries as $key => $country)
                                            <option value="{{ $key }}"
                                                {{ $property['country'] == $key ? 'selected' : '' }}>{{ $country }}
                                            </option>
                                        @empty
                                            <h6>No countries found</h6>
                                        @endforelse
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
                                    value="{{ $property['postcode'] }}"  name="postcode">
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
                                    placeholder="Alert message" value="{{ $property['alert_message'] }}"
                                    name="alert_message">
                                <div class="invalid-tooltip">
                                    Please enter alert message
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <label class="form-label">Landlord</label>
                            <select class="form-select" aria-label="Default select example" name="landlord">
                                <option selected>{{ $property['landlord'] }}</option>
                                @forelse ($landlords as $landlord)
                                    <option value="{{ $landlord->id }}"
                                        {{ $property->landlord_id == $landlord->id ? 'selected' : '' }}>
                                        {{ $landlord->getFullName() }}
                                    </option>
                                @empty
                                    <h6>No landlord found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->
                    </div>
                    <div class="row">
                        <label class="col-md-2 form-label">Amenities</label>
                        <select class="js-example-basic-multiple" name="amenities[]" multiple="multiple">
                            <option value=""></option>
                            @forelse ($amenities as $key => $amenity)
                                <option value="{{ $key }}"
                                    {{ in_array($amenity, $property['amenities']->pluck('name')->toArray() ?: []) ? 'selected' : '' }}>
                                    {{ $amenity }}
                                </option>

                                {{-- <option value="{{ $amenity->name }}" selected>{{ $amenity->name }}</option> --}}
                            @empty
                                <h6>No amenities found</h6>
                            @endforelse
                        </select>
                    </div>
                    <!-- End Row -->

                    <div class="row mt-3">
                        <label class="col-md-2 form-label">Maintenance active</label>
                        <input type="checkbox" id="switch1" switch="none"
                            {{ $property['maintenance_active'] ? 'checked' : '' }} name="maintenance_active" />
                        <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
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
