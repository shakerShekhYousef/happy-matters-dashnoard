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

                    <h4 class="card-title">List Vendors</h4>

                    <div style="overflow-x:auto;">
                        <table id="datatable-buttons" class="table table-bordered" style=" width: 300%;">
                            <thead>
                                <tr>
                                    <th class="td-center-content th-center-contnet-5">Email</th>
                                    <th class="td-center-content th-center-contnet-3">Company Name</th>
                                    <th class="td-center-content th-center-contnet-4">Contact Name</th>
                                    <th class="td-center-content th-center-contnet-3">Category</th>
                                    <th class="td-center-content th-center-contnet-4">Tax Registration Number</th>
                                    <th class="td-center-content th-center-contnet-4">Mobile</th>
                                    <th class="td-center-content th-center-contnet-4">Country</th>
                                    <th class="td-center-content th-center-contnet-4">Address 1</th>
                                    <th class="td-center-content th-center-contnet-4">Address 2</th>
                                    <th class="td-center-content th-center-contnet-3">City</th>
                                    <th class="td-center-content th-center-contnet-3">State</th>
                                    <th class="td-center-content th-center-contnet-3">Postcode</th>
                                    <th class="td-center-content th-center-contnet-5">Notes</th>
                                    <th class="td-center-content th-center-contnet-3"> Auto Assigned</th>
                                    <th class="td-center-content th-center-contnet-3">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($vendors as $vendor)
                                    <tr>
                                        <td class="td-center-content">{{ $vendor['email'] }}</td>
                                        <td class="td-center-content">{{ $vendor['company_name'] }}</td>
                                        <td class="td-center-content">{{ $vendor['contact_name'] }}</td>
                                        <td class="td-center-content">{{ $vendor['category']  }}</td>
                                        <td class="td-center-content">{{ $vendor['tax_registration'] }}</td>
                                        <td class="td-center-content">{{ $vendor['mobile'] }}</td>
                                        <td class="td-center-content">{{ $vendor['country'] }}</td>
                                        <td class="td-center-content">{{ $vendor['address1'] }}</td>
                                        <td class="td-center-content">{{ $vendor['address2'] }}</td>
                                        <td class="td-center-content">{{ $vendor['city'] }}</td>
                                        <td class="td-center-content">{{ $vendor['state'] }}</td>
                                        <td class="td-center-content">{{ $vendor['postcode'] }}</td>
                                        <td class="td-center-content">{{ $vendor['notes'] }}</td>
                                        <td class="td-center-content">
                                            <input type="checkbox" id="switch{{ $vendor['id'] }}" switch="none"
                                                {{ $vendor['auto_assigned'] ? 'checked' : '' }} />
                                            <label class="form-label" for="switch{{ $vendor['id'] }}"
                                                data-on-label="On" data-off-label="Off"></label>
                                        </td>
                                       
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ route('web_edit_vendor', $vendor['id']) }}"
                                                        type="button" class="far fa-edit fa-lg"></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form id="deleteform{{ $vendor['id'] }}"
                                                        action="{{ route('web_delete_vendor', $vendor['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="javascript:{}"
                                                            onclick="confirmDelete('deleteform{{ $vendor['id'] }}')">
                                                            <i class="fas fa-shopping-basket fa-lg"></i></a>
                                                    </form>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('web_show_vendor', $vendor['id']) }}"
                                                        type="button" class="far fa-eye fa-lg"></a> &nbsp;

                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <th>No vendors found</th>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
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
                }).then(function (){$('#'+instanc).submit();}) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
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
