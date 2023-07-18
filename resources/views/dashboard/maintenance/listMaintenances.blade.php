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
                        <table id="datatable-buttons" class="table table-bordered" style=" width: 115%;">
                            <thead>
                                <tr>
                                    <th class="td-center-content">Category</th>
                                    <th class="td-center-content">Property</th>
                                    <th class="td-center-content th-center-contnet-4">Unit</th>
                                    <th class="td-center-content">Responsible person</th>
                                    <th class="td-center-content">Title</th>
                                    <th class="td-center-content th-center-contnet-3">Details</th>
                                    <th class="td-center-content th-center-contnet-3">Available date</th>
                                    <th class="td-center-content th-center-contnet-5">Time slot</th>
                                    <th class="td-center-content th-center-contnet-5">Priority</th>
                                    <th class="td-center-content-10">media</th>
                                    <th class="td-center-content-10">documents</th>
                                    <th class="td-center-content">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($maintenances as $maintenance)
                                    <tr>
                                        <td class="td-center-content">{{ $maintenance['maintenance_category'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['property'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['unit'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['responsible_person'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['title'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['details'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['available_date'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['time_slot'] }}</td>
                                        <td class="td-center-content">{{ $maintenance['priority'] }}</td>
                                      
                                        <td>
                                          
                                            <div class="col-md-2">
                                                <a href="{{ route('web_media_list', $maintenance['id']) }}" type="button"
                                                class="btn btn-primary">media</a>
                                            </div>
                                        </td>
                                        
                                        <td>
                                           <div class="col-md-2">
                                                    <a href="{{ route('web_documents_list', $maintenance['id']) }}" type="button"
                                                    class="btn btn-primary">documents</a>
                                                </div>
                                            </td>
                                          
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ route('web_edit_maintenance', $maintenance['id']) }}" type="button"
                                                        class="far fa-edit fa-lg"></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form id="deleteform{{ $maintenance['id'] }}"
                                                        action="{{ route('web_delete_maintenance', $maintenance['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <a href="javascript:{}"
                                                            onclick="confirmDelete('deleteform{{ $maintenance['id'] }}')">
                                                            <i class="fas fa-shopping-basket fa-lg"></i></a>
                                                    </form>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('web_show_maintenance', $maintenance['id']) }}" type="button"
                                                        class="far fa-eye fa-lg"></a> &nbsp;

                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <th>No maintenances found</th>
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
