@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }

        .documents-preview-div img {
            padding: 10px;
            max-width: 100px;
        }

    </style>
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/html/script.js" type="text/javascript">
    </script>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Update Tenant</h5>
            </div>
            <div class="card-body">
                <form id="mainform" class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_tenant', $tenant['id']) }}" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $tenant['email'] }}" readonly placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Confirm Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row for email and password -->

                    <div class="row mt-3">
                        <label class="col-md-2 form-label" style="color:black">Is Company</label>
                        <label class="col-md-2 switch"><input type="checkbox" id="switch" switch="none" name="is_company"
                                {{ $tenant['is_company'] == 'on' ? 'checked' : null }}>
                            <label class="form-label" for="switch" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    <!-- end row -->
                    <br>
                    <div class="row hideme" id="company"
                        style="display:{{ $tenant['is_company'] != 'on' ? 'none' : null }}">
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Company Name</label>
                                <input type="text" class="form-control" id="validationTooltip02"
                                    placeholder="Company Name" name="company_name" value="{{ $tenant['company_name'] }}">
                                <div class="invalid-tooltip">
                                    Please enter Company name
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Trade License</label>
                                <input type="text" class="form-control" id="validationTooltip02"
                                    placeholder="Company Trade License" name="trade_license"
                                    value="{{ $tenant['trade_license'] }}">
                                <div class="invalid-tooltip">
                                    Please enter trada license
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Trade License Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip02"
                                    placeholder="Company Trade License Expiry" name="trade_license_expiry"
                                    value="{{ $tenant['trade_license_expiry'] }}">
                                <div class="invalid-tooltip">
                                    Please enter trada license Expiry
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip02">Tax Registration Number</label>
                                <input type="number" class="form-control" id="validationTooltip02"
                                    placeholder="Company Tax  Registration Number" name="tax_registration"
                                    value="{{ $tenant['tax_registration'] }}">
                                <div class="invalid-tooltip">
                                    Please enter Tax Registration Number
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <br><br>
                    <div class="row">



                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">First Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter first name" name="fname" value="{{ $tenant['fname'] }}"
                                    required />
                                <div class="invalid-tooltip">
                                    Please enter first name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Middle Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter middle name" name="mname" value="{{ $tenant['mname'] }}" />
                                <div class="invalid-tooltip">
                                    Please enter valid middle name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Last Name</label>
                                <input id="validationTooltip04" type="text" class="form-control"
                                    placeholder="Enter last name" name="lname" value="{{ $tenant['lname'] }}" required />
                                <div class="invalid-tooltip">
                                    Please enter last name.
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row for names-->

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Date Of Brith</label>
                                <input type="date" class="form-control" id="validationTooltip05"
                                    placeholder="Date of Brith" value="{{ $tenant['dob'] }}" name="dob" required>
                                <div class="invalid-tooltip">
                                    Please enter Date Of Brith
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Gender</label>
                                <select class="form-select" id="validationTooltip05" name="gender">
                                    <option value="Male" {{ $tenant['gender'] == 'Male' ? 'selected' : null }}>Male
                                    </option>
                                    <option value="Female" {{ $tenant['gender'] == 'Female' ? 'selected' : null }}>Female
                                    </option>
                                </select>
                                <div class="invalid-tooltip">
                                    Please enter Gender
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip07">Marital Status</label>
                                <input type="text" class="form-control" id="validationTooltip07"
                                    placeholder="Marital Status" value="{{ $tenant['marital_status'] }}"
                                    name="marital_status">
                                <div class="invalid-tooltip">
                                    Please enter Marital Status
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">Phone</label>
                                <input type="text" class="form-control" id="validationTooltip08"
                                    placeholder="Tenant Phone" value="{{ $tenant['phone'] }}" name="phone">
                                <div class="invalid-tooltip">
                                    Please enter Phone
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Additional Phone1</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Additional Phone1" value="{{ $tenant['additional_phone1'] }}"
                                    name="additional_phone1">
                                <div class="invalid-tooltip">
                                    Please enter Additional Phone1
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Additional Phone2</label>
                                <input type="text" class="form-control" id="validationTooltip09"
                                    placeholder="Additional Phone2" value="{{ $tenant['additional_phone2'] }}"
                                    name="additional_phone2">
                                <div class="invalid-tooltip">
                                    Please enter Additional Phone2
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip08">National ID</label>
                                <input type="number" class="form-control" id="validationTooltip08"
                                    placeholder="National ID" value="{{ $tenant['national_id'] }}" name="national_id">
                                <div class="invalid-tooltip">
                                    Please enter National ID
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-2">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">National ID Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip09"
                                    placeholder="National ID Expiry" value="{{ $tenant['national_id_expiry'] }}"
                                    name="national_id_expiry">
                                <div class="invalid-tooltip">
                                    Please enter National ID Expiry
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-2">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Number</label>
                                <input type="number" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Number" value="{{ $tenant['passport'] }}" name="passport">
                                <div class="invalid-tooltip">
                                    Please enter Passport Number
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-2">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Passport Expiry</label>
                                <input type="date" class="form-control" id="validationTooltip09"
                                    placeholder="Passport Expiry" value="{{ $tenant['passport_expiry'] }}"
                                    name="passport_expiry">
                                <div class="invalid-tooltip">
                                    Please enter Passport Expiry
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip09">Visa State</label>
                                <input type="text" class="form-control" id="validationTooltip09" placeholder="Visa State"
                                    value="{{ $tenant['visa_state'] }}" name="visa_state">
                                <div class="invalid-tooltip">
                                    Please enter Visa State
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End row -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Home County</label>
                                <select class="form-select" name="home_country_id">
                                    @foreach ($countries as $country)
                                        @if ($country->name != $tenant['home_country_id']->name)
                                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                        @else
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Please enter Home County
                                </div>
                            </div>

                        </div>

                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Country</label>
                                <select class="form-select" name="country_id">
                                    {{-- <option value="{{ $tenant['country_id']->id }}">{{ $tenant['country_id']->name }}
                                    </option> --}}
                                    @foreach ($countries as $country)
                                        @if ($country->name != $tenant['country_id']->name)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @else
                                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Please enter County
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">City</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="City"
                                    value="{{ $tenant['city'] }}" name="city">
                                <div class="invalid-tooltip">
                                    Please enter City
                                </div>

                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">State</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="State"
                                    value="{{ $tenant['state'] }}" name="state">
                                <div class="invalid-tooltip">
                                    Please enter State
                                </div>

                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row -->


                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Address 1</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="Address 1"
                                    value="{{ $tenant['address1'] }}" name="address1">
                                <div class="invalid-tooltip">
                                    Please enter address 1
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Address 2</label>
                                <input type="text" class="form-control" id="validationTooltip11" placeholder="Address 2"
                                    value="{{ $tenant['address2'] }}" name="address2">
                                <div class="invalid-tooltip">
                                    Please enter address 2
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip11">Postcode</label>
                                <input type="text" class="form-control" id="validationTooltip11" placeholder="Postcode"
                                    value="{{ $tenant['postcode'] }}" name="postcode">
                                <div class="invalid-tooltip">
                                    Please enter postcode
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <div class="mb-3 position-relative">
                                    <label for="formFile" class="form-label">National ID Photo</label>
                                    <input class="form-control" type="file" id="formFile" name="national_id_photo">
                                    <div class="form-group" id="imagesdiv">
                                        <div class="images-preview-div">

                                            <a href="{{ asset($tenant['national_id_photo']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['national_id_photo']) }}" alt="" width="50px"
                                                    height="50px"></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <div class="mb-3 position-relative">
                                    <label for="formFile" class="form-label">Passport Photo</label>
                                    <input class="form-control" type="file" id="formFile" name="passport_photo">
                                    <div class="form-group" id="imagesdiv">
                                        <div class="images-preview-div">

                                            <a href="{{ asset($tenant['passport_photo']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['passport_photo']) }}" alt="" width="50px"
                                                    height="50px"></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <div class="mb-3 position-relative">
                                    <label for="formFile" class="form-label">Visa Photo</label>
                                    <input class="form-control" type="file" id="formFile" name="visa_photo">
                                    <div class="form-group" id="imagesdiv">
                                        <div class="images-preview-div">

                                            <a href="{{ asset($tenant['visa_photo']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['visa_photo']) }}" alt="" width="50px"
                                                    height="50px"></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <div class="mb-3 position-relative">
                                    <label for="formFile" class="form-label">Visa Page</label>
                                    <input class="form-control" type="file" id="formFile" name="visa_page">
                                    <div class="form-group" id="imagesdiv">
                                        <div class="images-preview-div">

                                            <a href="{{ asset($tenant['visa_page']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['visa_page']) }}" alt="" width="50px"
                                                    height="50px"></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <label class="form-label" for="validationTooltip13">Add documents</label>
                            <div class="col-md-12">
                                <input class="form-control" id="documens_id" type="file" name='documents[]' multiple
                                    accept="application/pdf">

                                <div class="form-group" id="documentsdiv">
                                    <div class="documents-preview-div">
                                        @foreach ($tenant['documents'] as $key => $item)
                                            <a href="{{ asset($item->name) }}" target="_blank">
                                                Doc{{ $key }}.{{ pathinfo(asset($item->name), PATHINFO_EXTENSION) }}<img
                                                    src="{{ asset('assets/images/pdf.png') }}" alt="" height="50px"
                                                    width="50px">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>





                        </div>

                        <!-- End Col -->


                    </div>
                    <!-- end row   -->
                    <br><br>
                    <div class="row mt-4">
                        <label class="col-md-2 form-label" style="color:black">Tenant Guests</label>
                        <label class="col-md-2 switch1"><input type="checkbox" id="switch1" switch="none"
                                {{ count($tenant['guests']) > 0 == 'on' ? 'checked' : null }} name="tenant_guest">
                            <label class="form-label" for="switch1" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    <!-- End row -->
                    {{-- show guests --}}
                    @if (count($tenant['guests']) > 0)
                        @foreach ($tenant['guests'] as $guestid => $guest)
                            <div class="row hideme1" id="guest">
                                <div class="ajaxModalBody ">
                                    <div class="container-fluid">
                                        <div id="AddItemOption1">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <table
                                                    class="table table-striped table-condensed table-additems table-additems1">
                                                    <tbody>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">
                                                                        Guest
                                                                        Type</label>
                                                                    <select class="form-select" type="string"
                                                                        name="guest_type[]" required>
                                                                        <option value="" selected>select guest type</option>
                                                                        <option value="spouse"
                                                                            {{ $guest->guest_type == 'spouse' ? 'selected' : null }}>
                                                                            spouse</option>
                                                                        <option value="kid"
                                                                            {{ $guest->guest_type == 'kid' ? 'selected' : null }}>
                                                                            kid</option>
                                                                        <option value="roommate"
                                                                            {{ $guest->guest_type == 'roommate' ? 'selected' : null }}>
                                                                            roommate</option>
                                                                        <option value="relative"
                                                                            {{ $guest->guest_type == 'relative' ? 'selected' : null }}>
                                                                            relative</option>
                                                                        <option value="maid"
                                                                            {{ $guest->guest_type == 'maid' ? 'selected' : null }}>
                                                                            maid</option>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Guest Type
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip11" placeholder="Guest Name"
                                                                        value="{{ $guest->name }}" name="guest_name[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Name
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>

                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Age</label>
                                                                    <input type="number" class="form-control"
                                                                        id="validationTooltip11" placeholder="Guest Age"
                                                                        value="{{ $guest->age }}" name="guest_age[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Age
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Nationality</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip11"
                                                                        placeholder="Guest Nationality"
                                                                        value="{{ $guest->nationality }}"
                                                                        name="guest_nationality[]" required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Nationality
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- End Col -->
                                                        </td>
                                                        <td class="action" style="vertical-align: middle">
                                                            <div class="position-relative">
                                                                <div class="col-md-4">
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-danger1 ">
                                                                        Delete</button>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        @if ($guestid + 1 == count($tenant['guests']))
                                                            <tr>
                                                                <td colspan="4">
                                                                    <button type="button"
                                                                        class="btn btn-default btn-default1 btn-xs">+
                                                                        Add New guest</button>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row hideme1" id="guest"
                            style="display:{{ old('tenant_guest') != 'on' ? 'none' : null }}">
                            <div class="ajaxModalBody ">
                                <div class="container-fluid">
                                    <div id="AddItemOption1">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <table
                                                class="table table-striped table-condensed table-additems table-additems1">
                                                <tbody>
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="validationTooltip11">
                                                                    Guest
                                                                    Type</label>
                                                                <select class="form-select" type="string"
                                                                    name="guest_type[]">
                                                                    <option value="" selected>select guest type</option>
                                                                    <option value="spouse">spouse</option>
                                                                    <option value="kid">kid</option>
                                                                    <option value="roommate">roommate</option>
                                                                    <option value="relative">relative</option>
                                                                    <option value="maid">maid</option>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Please enter Guest Type
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="Guest Name"
                                                                    name="guest_name[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Name
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>

                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Age</label>
                                                                <input type="number" class="form-control"
                                                                    id="validationTooltip11" placeholder="Guest Age"
                                                                    name="guest_age[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Age
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Nationality</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="Guest Nationality"
                                                                    name="guest_nationality[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Nationality
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- End Col -->
                                                    </td>
                                                    <td class="action" style="vertical-align: middle">
                                                        <div class="position-relative">
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn btn-danger btn-danger1 ">
                                                                    Delete</button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <tr>
                                                        <td colspan="4">
                                                            <button type="button"
                                                                class="btn btn-default btn-default1 btn-xs">+
                                                                Add New guest</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- End Row -->
                    <br><br>
                    <div class="row mt-3">
                        <label class="col-md-2 form-label" style="color:black">Tenant Pets</label>
                        <label class="col-md-2 switch2"><input type="checkbox" id="switch2" switch="none"
                                {{ count($tenant['pets']) > 0 ? 'checked' : null }} name="tenant_pet">
                            <label class="form-label" for="switch2" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    {{-- show pets --}}
                    @if (count($tenant['pets']) > 0)
                        @foreach ($tenant['pets'] as $petid => $pet)
                            <div class="row hideme2" . $petid id="pet" .$petid>
                                <div class="ajaxModalBody">
                                    <div class="container-fluid">
                                        <div id="AddItemOption2">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <table
                                                    class="table table-striped table-condensed table-additems table-additems2">
                                                    <tbody>
                                                        <td>
                                                            <div class="col-md-9">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">
                                                                        Pet
                                                                        Type</label>
                                                                    <select class="form-select" type="string"
                                                                        name="pet_type[]" required>
                                                                        <option value="" selected>Select Pet Type</option>
                                                                        <option value="dog"
                                                                            {{ $pet->pet_type == 'dog' ? 'selected' : null }}>
                                                                            dog</option>
                                                                        <option value="cat"
                                                                            {{ $pet->pet_type == 'cat' ? 'selected' : null }}>
                                                                            cat</option>
                                                                        <option value="bird"
                                                                            {{ $pet->pet_type == 'bird' ? 'selected' : null }}>
                                                                            bird</option>
                                                                        <option value="other"
                                                                            {{ $pet->pet_type == 'other' ? 'selected' : null }}>
                                                                            other</option>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Pet Type
                                                                    </div>
                                                                </div>
                                                        </td>

                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-9">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Pet
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip11" placeholder="Pet Name"
                                                                        value="{{ $pet->name }}" name="pet_name[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Pet Name
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="action" style="vertical-align: middle">
                                                            <div class="position-relative">
                                                                <div class="col-md-4">
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-danger2 ">
                                                                        Delete</button>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        @if ($petid + 1 == count($tenant['pets']))
                                                            <tr>
                                                                <td colspan="4">
                                                                    <button type="button"
                                                                        class="btn btn-default btn-default2 btn-xs">+
                                                                        Add New Pet</button>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row hideme2" id="pet"
                            style="display:{{ old('tenant_pet') != 'on' ? 'none' : null }}">
                            <div class="ajaxModalBody">
                                <div class="container-fluid">
                                    <div id="AddItemOption2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <table
                                                class="table table-striped table-condensed table-additems table-additems2">
                                                <tbody>
                                                    <td>
                                                        <div class="col-md-9">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="validationTooltip11">
                                                                    Pet
                                                                    Type</label>
                                                                <select class="form-select" type="string"
                                                                    name="pet_type[]">
                                                                    <option value="" selected>Select Pet Type</option>
                                                                    <option value="dog">dog</option>
                                                                    <option value="cat">cat</option>
                                                                    <option value="bird">bird</option>
                                                                    <option value="other">other</option>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Please enter Pet Type
                                                                </div>
                                                            </div>
                                                    </td>

                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-9">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="validationTooltip11">Pet
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="Pet Name"
                                                                    name="pet_name[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Pet Name
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="action" style="vertical-align: middle">
                                                        <div class="position-relative">
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn btn-danger btn-danger2 ">
                                                                    Delete</button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <tr>
                                                        <td colspan="4">
                                                            <button type="button"
                                                                class="btn btn-default btn-default2 btn-xs">+
                                                                Add New Pet</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- End row -->
                    <br><br>

                    <div class="row mt-3">
                        <label class="col-md-2 form-label" style="color:black">Tenant Vehicles</label>
                        <label class="col-md-2 switch3"><input type="checkbox" id="switch3" switch="none"
                                {{ count($tenant['vehicles']) > 0 ? 'checked' : null }} name="tenant_vehicles">
                            <label class="form-label" for="switch3" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    <!-- End row -->
                    {{-- show vehicles --}}
                    @if (count($tenant['vehicles']) > 0)
                        <div class="row hideme3" id="vehicles">
                            @foreach ($tenant['vehicles'] as $vehicleid => $vehicle)
                                <div class="ajaxModalBody ">
                                    <div class="container-fluid">
                                        <div id="AddItemOption3">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <table
                                                    class="table table-striped table-condensed table-additems table-additems3">
                                                    <tbody>
                                                        <td style="width: 20%">
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">
                                                                        Vehicle Type</label>
                                                                    <select class="form-select" type="string"
                                                                        name="vehicle_type[]" required>
                                                                        <option value="">select vehicle type</option>
                                                                        <option value="utomobile"
                                                                            {{ $vehicle->vehicle_type == 'utomobile' ? 'selected' : null }}>
                                                                            utomobile
                                                                        </option>
                                                                        <option value="motorcycle"
                                                                            {{ $vehicle->vehicle_type == 'motorcycle' ? 'selected' : null }}>
                                                                            motorcycle</option>
                                                                        <option value="truck"
                                                                            {{ $vehicle->vehicle_type == 'truck' ? 'selected' : null }}>
                                                                            truck</option>
                                                                        <option value="van"
                                                                            {{ $vehicle->vehicle_type == 'van' ? 'selected' : null }}>
                                                                            van</option>
                                                                    </select>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Tenant Vehicles
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Make</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip11" placeholder="make"
                                                                        value="{{ $vehicle->make }}" name="make[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Make
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Model</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip11" placeholder="model"
                                                                        value="{{ $vehicle->model }}" name="model[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Model
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Year</label>
                                                                    <input type="number" class="form-control"
                                                                        id="validationTooltip11" placeholder="year"
                                                                        value="{{ $vehicle->year }}" name="year[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Year
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Color</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationTooltip11" placeholder="color"
                                                                        value="{{ $vehicle->color }}" name="color[]"
                                                                        required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Color
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- end col -->
                                                        <td>
                                                            <div class="col-md-12">
                                                                <div class="mb-3 position-relative">
                                                                    <label class="form-label"
                                                                        for="validationTooltip11">Plate
                                                                        Number</label>
                                                                    <input type="number" class="form-control"
                                                                        id="validationTooltip11" placeholder="plate_number"
                                                                        value="{{ $vehicle->plate_no }}"
                                                                        name="plate_no[]" required>
                                                                    <div class="invalid-tooltip">
                                                                        Please enter Plate Number
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Col -->
                                                        </td>


                                                        <td class="action" style="vertical-align: middle">
                                                            <div class="position-relative">
                                                                <div class="col-md-4">
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-danger3 ">
                                                                        Delete</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        @if ($vehicleid + 1 == count($tenant['vehicles']))
                                                            <tr>
                                                                <td colspan="4">
                                                                    <button type="button"
                                                                        class="btn btn-default btn-default3 btn-xs">+
                                                                        Add New vehicle</button>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="row hideme3" id="vehicles"
                            style="display:{{ old('tenant_vehicles') != 'on' ? 'none' : null }}">
                            <div class="ajaxModalBody ">
                                <div class="container-fluid">
                                    <div id="AddItemOption3">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <table
                                                class="table table-striped table-condensed table-additems table-additems3">
                                                <tbody>
                                                    <td style="width: 20%">
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label" for="validationTooltip11">
                                                                    Vehicle Type</label>
                                                                <select class="form-select" type="string"
                                                                    name="vehicle_type[]">
                                                                    <option value="">select vehicle type</option>
                                                                    <option value="utomobile">utomobile</option>
                                                                    <option value="motorcycle">motorcycle</option>
                                                                    <option value="truck">truck</option>
                                                                    <option value="van">van</option>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Please enter Tenant Vehicles
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Make</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="make"
                                                                    name="make[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Make
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Model</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="model"
                                                                    name="model[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Model
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Year</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="year"
                                                                    name="year[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Year
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Color</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationTooltip11" placeholder="color"
                                                                    name="color[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Color
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- end col -->
                                                    <td>
                                                        <div class="col-md-12">
                                                            <div class="mb-3 position-relative">
                                                                <label class="form-label"
                                                                    for="validationTooltip11">Plate
                                                                    Number</label>
                                                                <input type="number" class="form-control"
                                                                    id="validationTooltip11" placeholder="plate_number"
                                                                    name="plate_no[]">
                                                                <div class="invalid-tooltip">
                                                                    Please enter Plate Number
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->
                                                    </td>


                                                    <td class="action" style="vertical-align: middle">
                                                        <div class="position-relative">
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn btn-danger btn-danger3 ">
                                                                    Delete</button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <tr>
                                                        <td colspan="4">
                                                            <button type="button"
                                                                class="btn btn-default btn-default3 btn-xs">+
                                                                Add New vehicle</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    <!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip10">Notes</label>
                                <input type="text" class="form-control" id="validationTooltip10" placeholder="notes"
                                    value="{{ $tenant['notes'] }}" name="notes">
                                <div class="invalid-tooltip">
                                    Please enter notes
                                </div>

                            </div>


                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End row -->

            </div>






            <button  class="btn btn-primary"
            style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('#appenddocument').click(function() {
            $('#documentsdiv').append(
                "<input type='file' name='documents[]' class='document' placeholder='Choose document'>");
        });

        $(function() {
            // Multiple images preview with JavaScript
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
            $('#documens_id').on('change', function() {
                $('div.documents-preview-div').empty();
                previewDocs(this, 'div.documents-preview-div');
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".switch input").on("change", function(e) {
                const isOn = e.currentTarget.checked;

                if (isOn) {
                    $(".hideme").show();
                } else {
                    $(".hideme").hide();
                }
            });
        });

        $(document).ready(function() {
            $(".switch1 input").on("change", function(e) {
                const isOn = e.currentTarget.checked;

                if (isOn) {
                    $(".hideme1").show();
                } else {
                    $(".hideme1").hide();
                }
            });
        });

        $(document).ready(function() {
            $(".switch2 input").on("change", function(e) {
                const isOn = e.currentTarget.checked;

                if (isOn) {
                    $(".hideme2").show();
                } else {
                    $(".hideme2").hide();
                }
            });
        });

        $(document).ready(function() {
            $(".switch3 input").on("change", function(e) {
                const isOn = e.currentTarget.checked;

                if (isOn) {
                    $(".hideme3").show();
                } else {
                    $(".hideme3").hide();
                }
            });
        });

        var i1 = 1;
        $('#AddItemOption1 .btn-default1').on('click', function(e) {
            i1++;
            var el = $('.table-additems1 tbody tr:eq(0)').clone();
            $(el).find('option:selected').removeAttr('selected');
            $(el).find(':input').each(function() {
                $(this).removeAttr('value');
            });
            //while cloning hide other input
            $(el).find('.inputother').css({
                'display': 'none'
            });

            $(this).closest('tr').before('<tr id="guest' + i1 + '" >' + $(el).html() + '</tr>');
        });
        $(document).on('click', '#AddItemOption1 .btn-danger1', function(e) {
            if ($('.table-additems1 tbody tr').length == 2) {
                var el = $('.table-additems1 tbody tr:eq(0)');
                $(el).find('select:eq(0)').val($(el).find('select:eq(0) option:first').val());
                $(el).find('select:eq(1)').val($(el).find('select:eq(1) option:first').val());
                $(el).find('input:eq(0)').val('');
                e.preventDefault();
            } else {
                $(this).closest('tr').remove();
            }
        });
        //use this because other slect-box are dynmically created
        $(document).on('change', '.sellitem', function(e) {
            if ($(this).val() == 'other') {
                //find this ->closest trs-> get input box show
                $(this).closest("tr").find('.inputother').css({
                    'display': 'block'
                });
            } else {
                $(this).closest("tr").find('.inputother').css({
                    'display': 'none'
                });
            }
        });


        var i2 = 1;
        $('#AddItemOption2 .btn-default2').on('click', function(e) {
            i2++;
            var el = $('.table-additems2 tbody tr:eq(0)').clone();
            $(el).find('option:selected').removeAttr('selected');
            $(el).find(':input').each(function() {
                $(this).removeAttr('value');
            });
            //while cloning hide other input
            $(el).find('.inputother').css({
                'display': 'none'
            });

            $(this).closest('tr').before('<tr id="pet' + i2 + '" >' + $(el).html() + '</tr>');
        });
        $(document).on('click', '#AddItemOption2 .btn-danger2', function(e) {
            if ($('.table-additems2 tbody tr').length == 2) {
                var el = $('.table-additems2 tbody tr:eq(0)');
                $(el).find('select:eq(0)').val($(el).find('select:eq(0) option:first').val());
                $(el).find('select:eq(1)').val($(el).find('select:eq(1) option:first').val());
                $(el).find('input:eq(0)').val('');
                e.preventDefault();
            } else {
                $(this).closest('tr').remove();
            }
        });
        //use this because other slect-box are dynmically created
        $(document).on('change', '.sellitem', function(e) {
            if ($(this).val() == 'other') {
                //find this ->closest trs-> get input box show
                $(this).closest("tr").find('.inputother').css({
                    'display': 'block'
                });
            } else {
                $(this).closest("tr").find('.inputother').css({
                    'display': 'none'
                });
            }
        });
        var i3 = 1;
        $('#AddItemOption3 .btn-default3').on('click', function(e) {
            i2++;
            var el = $('.table-additems3 tbody tr:eq(0)').clone();
            $(el).find('option:selected').removeAttr('selected');
            $(el).find(':input').each(function() {
                $(this).removeAttr('value');
            });
            //while cloning hide other input
            $(el).find('.inputother').css({
                'display': 'none'
            });

            $(this).closest('tr').before('<tr id="vehicles' + i3 + '" >' + $(el).html() + '</tr>');
        });
        $(document).on('click', '#AddItemOption3 .btn-danger3', function(e) {
            if ($('.table-additems3 tbody tr').length == 2) {
                var el = $('.table-additems2 tbody tr:eq(0)');
                $(el).find('select:eq(0)').val($(el).find('select:eq(0) option:first').val());
                $(el).find('select:eq(1)').val($(el).find('select:eq(1) option:first').val());
                $(el).find('input:eq(0)').val('');
                e.preventDefault();
            } else {
                $(this).closest('tr').remove();
            }
        });
        //use this because other slect-box are dynmically created
        $(document).on('change', '.sellitem', function(e) {
            if ($(this).val() == 'other') {
                //find this ->closest trs-> get input box show
                $(this).closest("tr").find('.inputother').css({
                    'display': 'block'
                });
            } else {
                $(this).closest("tr").find('.inputother').css({
                    'display': 'none'
                });
            }
        });
    </script>
@endsection
