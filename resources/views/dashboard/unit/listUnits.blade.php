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

                    <h4 class="card-title">List Units</h4>

                    <div style="overflow-x:auto;">
                        <table id="datatable-buttons" class="table table-bordered" style=" width: 400%;">
                            <thead>
                                <tr>
                                    <th class="td-center-content">Unit number</th>
                                    <th class="td-center-content">Unit type</th>
                                    <th class="td-center-content th-center-contnet-4">Size</th>
                                    <th class="td-center-content">Service charges per sqft</th>
                                    <th class="td-center-content">Rent</th>
                                    <th class="td-center-content th-center-contnet-3">Deposit</th>
                                    <th class="td-center-content th-center-contnet-3">Beds</th>
                                    <th class="td-center-content th-center-contnet-5">Baths</th>
                                    <th class="td-center-content th-center-contnet-5">Electricity number</th>
                                    <th class="td-center-content">Municipality number</th>
                                    <th class="td-center-content">Gas number</th>
                                    <th class="td-center-content">Number of parkings</th>
                                    <th class="td-center-content">Parking number</th>
                                    <th class="td-center-content">Unit status</th>
                                    <th class="td-center-content">Unit category</th>
                                    <th class="td-center-content">Compound number</th>
                                    <th class="td-center-content">Floor</th>
                                    <th class="td-center-content">Management fee type</th>
                                    <th class="td-center-content">Management fee</th>
                                    <th class="td-center-content">Options</th>
                                    <th class="td-center-content">Features</th>
                                    <th class="td-center-content">Marketing title</th>
                                    <th class="td-center-content">Marketing description</th>
                                    <th class="td-center-content-10">List images</th>
                                    <th class="td-center-content-3">Property name</th>
                                    <th class="td-center-content-5">Property photo</th>
                                    
                                    <th class="td-center-content-10">Property documents</th>
                                    <th class="td-center-content-3">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($units as $unit)
                                    <tr>
                                        <td class="td-center-content">{{ $unit['unit_number'] }}</td>
                                        <td class="td-center-content">{{ $unit['unit_type'] }}</td>
                                        <td class="td-center-content">{{ $unit['size'] }}</td>
                                        <td class="td-center-content">{{ $unit['service_charges_per_sqft'] }}</td>
                                        <td class="td-center-content">{{ $unit['rent'] }}</td>
                                        <td class="td-center-content">{{ $unit['deposit'] }}</td>
                                        <td class="td-center-content">{{ $unit['beds'] }}</td>
                                        <td class="td-center-content">{{ $unit['baths'] }}</td>
                                        <td class="td-center-content">{{ $unit['electricity_no'] }}</td>
                                        <td class="td-center-content">{{ $unit['municipality_no'] }}</td>
                                        <td class="td-center-content">{{ $unit['gas_no'] }}</td>
                                        <td class="td-center-content">{{ $unit['no_of_parkings'] }}</td>
                                        <td class="td-center-content">{{ $unit['parking_no'] }}</td>
                                        <td class="td-center-content">{{ $unit['unit_status'] }}</td>
                                        <td class="td-center-content">{{ $unit['unit_category'] }}</td>
                                        <td class="td-center-content">{{ $unit['compound_no'] }}</td>
                                        <td class="td-center-content">{{ $unit['floor'] }}</td>
                                        <td class="td-center-content">{{ $unit['management_fee_type'] }}</td>
                                        <td class="td-center-content">{{ $unit['management_fee'] }}</td>
                                        <td class="td-center-content">
                                            @if ($unit['options'] != null)
                                                <ul>
                                                    @foreach ($unit['options'] as $option)
                                                        <li>{{ $option }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td class="td-center-content">
                                            @if ($unit['features'] != null)
                                                <ul>
                                                    @foreach ($unit['features'] as $feature)
                                                        <li>{{ $feature }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td class="td-center-content">{{ $unit['marketing_title'] }}</td>
                                        <td class="td-center-content">{{ $unit['marketing_description'] }}</td>
                                        <td class="td-center-content">
                                            @foreach ($unit['lists'] as $list)
                                                <a href="{{ asset($list['name']) }}" target="_blank"><img src="{{ asset($list['name']) }}" alt="" width="100" height="100"></a>
                                            @endforeach
                                        </td>
                                        <td class="td-center-content">{{ $unit['property'] }}</td>
                                        <td class="td-center-content">
                                            <a href="{{ asset($unit['property_photo']) }}" target="_blank"><img src="{{ asset($unit['property_photo']) }}" alt="" width="100"
                                                height="100"></a>
                                        </td>
                                      
                                        <td class="td-center-content">
                                            @foreach ($unit['documents'] as $key => $document)
                                                Doc{{ $key }}
                                                <a href="{{ asset($document['name']) }}" target="_blank">
                                                    <img src="{{ asset('assets/images/pdf.png') }}" alt="pdf"
                                                        width="50px" height="50px">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ route('web_edit_unit', $unit['id']) }}" type="button"
                                                        class="far fa-edit fa-lg"></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form id="deleteform{{ $unit['id'] }}"
                                                        action="{{ route('web_delete_Unit', $unit['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="javascript:{}"
                                                            onclick="confirmDelete('deleteform{{ $unit['id'] }}')">
                                                            <i class="fas fa-shopping-basket fa-lg"></i></a>
                                                    </form>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('web_show_unit', $unit['id']) }}" type="button"
                                                        class="far fa-eye fa-lg"></a> &nbsp;

                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <th>No Properties found</th>
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
