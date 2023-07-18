@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new Maintenance</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('web_store_maintenance') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Category</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder=" category"
                                    name="maintenance_category" value="{{ old('maintenance_category') }}" required>
                                <div class="invalid-tooltip">
                                    Please enter category
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id"
                                        required>
                                        <option value="">Select property</option>
                                        @forelse ($properties as $property)
                                            <option value="{{ $property['id'] }}"
                                                {{ old('country') == $property['id'] ? 'selected' : '' }}>
                                                {{ $property['name'] }}
                                            </option>
                                        @empty
                                            <h6>No properties found</h6>
                                        @endforelse
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please select property
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Units</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_id" required>
                                        <option value="">Select unit</option>
                                        @forelse ($units as $unit)
                                            <option value="{{ $unit['id'] }}"
                                                {{ old('country') == $unit['id'] ? 'selected' : '' }}>
                                                {{ $unit['unit_number'] }}
                                            </option>
                                        @empty
                                            <h6>No units found</h6>
                                        @endforelse
                                    </select>
                                    <div class="invalid-tooltip">
                                        Please select unit
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Responsible person</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder=" Responsible person" name="responsible_person"
                                    value="{{ old('responsible_person') }}" required>
                                <div class="invalid-tooltip">
                                    Please enter Responsible person
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">Title</label>
                                <input type="text" class="form-control" id="validationTooltip13" placeholder="Title"
                                    value="{{ old('title') }}" name="title" required>
                                <div class="invalid-tooltip">
                                    Please enter Title
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">Details</label>
                                <input type="text" class="form-control" id="validationTooltip13" placeholder="Details"
                                    value="{{ old('details') }}" name="details">
                                <div class="invalid-tooltip">
                                    Please enter Details
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Available date</label>
                                <input type="date" class="form-control" id="validationTooltip05"
                                    placeholder="Available date" value="{{ old('available_date') }}"
                                    name="available_date">
                                <div class="invalid-tooltip">
                                    Please enter Available date
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Time slot</label>
                                <input type="time" class="form-control" id="validationTooltip05"
                                    placeholder="Available date" value="{{ old('time_slot') }}" name="time slot">
                                <div class="invalid-tooltip">
                                    Please enterTime slot
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip13">Priority</label>
                                <input type="text" class="form-control" id="validationTooltip13" placeholder="Priority"
                                    value="{{ old('priority') }}" name="priority">
                                <div class="invalid-tooltip">
                                    Please enter Priority
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- end row -->
                    <div class="row mt-3">
                        <label class="col-md-3 form-label" style="color:black">maintenance media</label>
                        <label class="col-md-2 switch2"><input type="checkbox" id="switch2" switch="none"
                                {{ old('maintenance_media') == 'on' ? 'checked' : null }} name="maintenance_media">
                            <label class="form-label" for="switch2" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    <div class="row hideme2" id="media"
                        style="display:{{ old('maintenance_media') != 'on' ? 'none' : null }}">
                        <div class="ajaxModalBody">
                            <div class="container-fluid">
                                <div id="AddItemOption2">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <table class="table table-striped table-condensed table-additems table-additems2">
                                            <tbody>
                                                <td>
                                                    <div class="col-md-9">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationTooltip11"> media
                                                                Type</label>
                                                            <select class="form-select" type="string"
                                                                name="media_type[]">
                                                                <option value="" selected>Select media Type</option>
                                                                <option value="photo">photo</option>
                                                                <option value="video">video</option>

                                                            </select>
                                                            <div class="invalid-tooltip">
                                                                Please enter media Type
                                                            </div>
                                                        </div>
                                                </td>

                                                <!-- end col -->
                                                <td>
                                                    <div class="col-md-9">
                                                        <label class="form-label" for="validationTooltip13">Add
                                                            Media</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" id="media_id" type="file"
                                                                name='media[]' multiple
                                                                accept="application/png,jpg,jpeg,mp4">
                                                            <!-- <button type="button" id="appenddocument" class="btn btn-primary btn-sm">Add</button> -->
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
                                                        <button type="button" class="btn btn-default btn-default2 btn-xs">+
                                                            Add New Media</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                    <br><br>

                    <!-- End row -->
                    <div class="row mt-3">
                        <label class="col-md-3 form-label" style="color:black">maintenance documents</label>
                        <label class="col-md-2 switch3"><input type="checkbox" id="switch3" switch="none"
                                {{ old('maintenance_documents') == 'on' ? 'checked' : null }}
                                name="maintenance_documents">
                            <label class="form-label" for="switch3" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    <div class="row hideme3" id="documents"
                        style="display:{{ old('maintenance_documents') != 'on' ? 'none' : null }}">
                        <div class="ajaxModalBody">
                            <div class="container-fluid">
                                <div id="AddItemOption3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <table class="table table-striped table-condensed table-additems table-additems3">
                                            <tbody>
                                                <td>
                                                    <div class="col-md-9">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationTooltip11">
                                                                document
                                                                Type</label>
                                                            <select class="form-select" type="string"
                                                                name="document_types[]">
                                                                <option value="" selected>Select document Type</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>

                                                            </select>
                                                            <div class="invalid-tooltip">
                                                                Please enter document Type
                                                            </div>
                                                        </div>
                                                </td>

                                                <!-- end col -->
                                                <td>
                                                    <div class="col-md-9">
                                                        <label class="form-label" for="validationTooltip13">Add
                                                            documents</label>
                                                        <div class="col-md-12">
                                                            <input class="form-control" id="documens_id" type="file"
                                                                name='documents[]' multiple accept="application/pdf">
                                                            <!-- <button type="button" id="appenddocument" class="btn btn-primary btn-sm">Add</button> -->
                                                        </div>
                                                    </div>
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
                                                        <button type="button" class="btn btn-default btn-default3 btn-xs">+
                                                            Add New document</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

            </div>



            <button  class="btn btn-primary" style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
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
    <script>
        $('.js-example-basic-multiple').select2();
    </script>
    <script>
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
