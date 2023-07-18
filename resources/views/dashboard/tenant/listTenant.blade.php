@extends('dashboard.layout.app')
@section('style')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <style>
        table thead tr th {
            font-weight: bold;
            color: #1b82ec
        }

        .td-center-content {
            vertical-align: middle;
            text-align: center;
        }

        .th-center-contnet-3 {
            width: 3%
        }

        .th-center-contnet-4 {
            width: 4%
        }

        .th-center-contnet-5 {
            width: 5%
        }

        .th-center-contnet-7 {
            width: 7%
        }

        .th-center-contnet-10 {
            width: 10%
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">List Maintenances</h4>

                    <div style="overflow-x:auto;">
                        <table id="datatable-buttons" class="table table-bordered" style=" width: 400%;">
                            <thead>
                                <tr>
                                    <th class="td-center-content  th-center-content-5">Email</th>
                                    <th class="td-center-content  th-center-content-5">First Name</th>
                                    <th class="td-center-content  th-center-content-7">Middle Name</th>
                                    <th class="td-center-content  th-center-content-7">Last Name</th>
                                    <th class="td-center-content  th-center-content-5">Is Company</th>
                                    <th class="td-center-content  th-center-content-5">Dob</th>
                                    <th class="td-center-content  th-center-content-5">Gender</th>
                                    <th class="td-center-content  th-center-content-7">Martial status</th>
                                    <th class="td-center-content  th-center-content-5">Phone</th>
                                    <th class="td-center-content  th-center-content-7">Additional phone 1</th>
                                    <th class="td-center-content  th-center-content-7">Additional phone 2</th>
                                    <th class="td-center-content  th-center-content-5">National ID</th>
                                    <th class="td-center-content  th-center-content-5">National ID expiry</th>
                                    <th class="td-center-content  th-center-content-5">Passport number</th>
                                    <th class="td-center-content  th-center-content-5">Passport expiry</th>
                                    <th class="td-center-content  th-center-content-5">Visa state</th>
                                    <th class="td-center-content  th-center-content-5">Home country</th>
                                    <th class="td-center-content  th-center-content-5">Country</th>
                                    <th class="td-center-content  th-center-content-5">City</th>
                                    <th class="td-center-content  th-center-content-5">State</th>
                                    <th class="td-center-content  th-center-content-5">Address 1</th>
                                    <th class="td-center-content  th-center-content-5">Address 2</th>
                                    <th class="td-center-content  th-center-content-5">Postcode</th>
                                    <th class="td-center-content  th-center-content-5">National ID photo</th>
                                    <th class="td-center-content  th-center-content-5">Passport photo</th>
                                    <th class="td-center-content  th-center-content-5">Visa photo</th>
                                    <th class="td-center-content  th-center-content-5">Visa Page</th>
                                    <th class="td-center-content  th-center-content-5">Additional documents</th>
                                    <th class="td-center-content th-center-contnet-3">Guests</th>
                                    <th class="td-center-content th-center-contnet-3">Pets</th>
                                    <th class="td-center-content  th-center-content-3">Vehicles</th>
                                    <th class="td-center-content  th-center-content-5">Notes</th>
                                    <th class="td-center-content th-center-contnet-3">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($tenants as $tenant)
                                    <tr>
                                        <td class="td-center-content">{{ $tenant['email'] }}</td>
                                        <td class="td-center-content">{{ $tenant['fname'] }}</td>
                                        <td class="td-center-content">{{ $tenant['mname'] }}</td>
                                        <td class="td-center-content">{{ $tenant['lname'] }}</td>

                                        @if ($tenant['is_company'] != 1)
                                            <td class="td-center-content"> No</td>
                                        @endif

                                        @if ($tenant['is_company'] == 1)
                                        
                                            <td>
                                          
                                                <div class="col-md-2">
                                                    <a href="{{ route('web_company_list', $tenant['id']) }}" type="button"
                                                    class="btn btn-primary">company</a>
                                                </div>
                                            </td>
                                        @endif

                                        <td class="td-center-content">{{ $tenant['dob'] }}</td>
                                        <td class="td-center-content">{{ $tenant['gender'] }}</td>
                                        <td class="td-center-content">{{ $tenant['marital_status'] }}</td>
                                        <td class="td-center-content">{{ $tenant['phone'] }}</td>
                                        <td class="td-center-content">{{ $tenant['additional_phone1'] }}</td>
                                        <td class="td-center-content">{{ $tenant['additional_phone2'] }}</td>
                                        <td class="td-center-content">{{ $tenant['national_id'] }}</td>
                                        <td class="td-center-content">{{ $tenant['national_id_expiry'] }}</td>
                                        <td class="td-center-content">{{ $tenant['passport'] }}</td>

                                        <td class="td-center-content">{{ $tenant['passport_expiry'] }}</td>
                                        <td class="td-center-content">{{ $tenant['visa_state'] }}</td>
                                        <td class="td-center-content">{{ $tenant['home_country_id']['name'] }}</td>
                                        <td class="td-center-content">{{ $tenant['country_id']['name'] }}</td>
                                        <td class="td-center-content">{{ $tenant['city'] }}</td>
                                        <td class="td-center-content">{{ $tenant['state'] }}</td>
                                        <td class="td-center-content">{{ $tenant['address1'] }}</td>
                                        <td class="td-center-content">{{ $tenant['address2'] }}</td>
                                        <td class="td-center-content">{{ $tenant['postcode'] }}</td>

                                        <td class="td-center-content">
                                            <a href="{{ asset($tenant['national_id_photo']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['national_id_photo']) }}" alt="" width="100"
                                                    height="100"></a>
                                        </td>
                                        <td class="td-center-content">
                                            <a href="{{ asset($tenant['passport_photo']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['passport_photo']) }}" alt="" width="100"
                                                    height="100"></a>
                                        </td>
                                        <td class="td-center-content">
                                            <a href="{{ asset($tenant['visa_photo']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['visa_photo']) }}" alt="" width="100"
                                                    height="100"></a>
                                        </td>
                                        <td class="td-center-content">
                                            <a href="{{ asset($tenant['visa_page']) }}" target="_blank"><img
                                                    src="{{ asset($tenant['visa_page']) }}" alt="" width="100"
                                                    height="100"></a>
                                        </td>

                                        <td class="td-center-content">
                                            @foreach ($tenant['documents'] as $key => $document)
                                                <a href="{{ asset($document->name) }}"
                                                    target="_blank">Doc{{ $key }}<img
                                                        src="{{ asset('assets/images/pdf.png') }}" alt="" width="50"
                                                        height="50"></a>
                                            @endforeach
                                        </td>
                                        
                                        <td>
                                          
                                            <div class="col-md-2">
                                                <a href="{{ route('web_guests_list', $tenant['id']) }}" type="button"
                                                class="btn btn-primary">guests</a>
                                            </div>
                                        </td>
                                        <td>
                                          
                                            <div class="col-md-2">
                                                <a href="{{ route('web_pets_list', $tenant['id']) }}" type="button"
                                                class="btn btn-primary">pets</a>
                                            </div>
                                        </td>
                                        <td>
                                          
                                            <div class="col-md-2">
                                                <a href="{{ route('web_vehicles_list', $tenant['id']) }}" type="button"
                                                class="btn btn-primary">vehicles</a>
                                            </div>
                                        </td>
                                      
                                        <td class="td-center-content">{{ $tenant['notes'] }}</td>
                                        <td style="text-align: center; vertical-align: middle">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ route('web_edit_tenant', $tenant['id']) }}" type="button"
                                                        class="far fa-edit fa-lg"></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form id="deleteform{{ $tenant['id'] }}"
                                                        action="{{ route('web_delete_tenant', $tenant['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="javascript:{}"
                                                            onclick="confirmDelete('deleteform{{ $tenant['id'] }}')">
                                                            <i class="fas fa-shopping-basket fa-lg"></i></a>
                                                    </form>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('web_show_tenant', $tenant['id']) }}" type="button"
                                                        class="far fa-eye fa-lg"></a> &nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <th>No Tenants found</th>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(instanc) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: !1
            }).then(function(t) {
                t.value ? Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    type: "success"
                }).then(function() {
                    $('#' + instanc).submit();
                }) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    type: "error"
                })
            })
        }
    </script>
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
