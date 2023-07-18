@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Maintenance</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST"
                    action="{{ route('web_update_maintenance', $maintenance->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Category</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Category"
                                    name="maintenance_category" value="{{ $maintenance->maintenance_category }}">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <label class="form-label">Properties</label>
                            <select class="form-select" aria-label="Default select example" name="property_id">
                                <option selected>{{ $maintenance->Property_id }}</option>
                                @forelse ($properties as $property)
                                    <option value="{{ $property->id }}"
                                        {{ $maintenance->property_id == $property->id ? 'selected' : '' }}>
                                        {{ $property->name }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <label class="form-label">Unit</label>
                            <select class="form-select" aria-label="Default select example" name="unit_id">
                                <option selected>{{ $maintenance->unit_id }}</option>
                                @forelse ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ $maintenance->unit_id == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->id }}
                                    </option>
                                @empty
                                    <h6>No unit found</h6>
                                @endforelse
                            </select>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Row -->


                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Responsible person</label>
                                <input type="text" class="form-control" id="validationTooltip01"
                                    placeholder="Responsible person" name="responsible_person"
                                    value="{{ $maintenance->responsible_person }}">
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Title</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Title"
                                    name="title" value="{{ $maintenance->title }}">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Details</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Details"
                                    name="details" value="{{ $maintenance->details }}">
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->


                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Available date</label>
                                <input type="date" class="form-control" id="validationTooltip05"
                                    placeholder="Available date" value="{{ $maintenance->available_date }}"
                                    name="available_date">
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Time slot</label>
                                <input type="time" class="form-control" id="validationTooltip05" placeholder="Time slot"
                                    value="{{ $maintenance->time_slot }}" name="time_slot">
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Priority</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Priority"
                                    name="priority" value="{{ $maintenance->priority }}">
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                    <br><br>
                    <div class="row mt-3">
                        <label class="col-md-2 form-label" style="color:black">maintenance media</label>
                        <label class="col-md-2 switch2"><input type="checkbox" id="switch2" switch="none" name="maintenance_media">
                            <label class="form-label" for="switch2" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>

                    {{-- show media --}}
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
                    <div class="row mt-3">
                        <label class="col-md-2 form-label" style="color:black">maintenance documents</label>
                        <label class="col-md-2 switch3"><input type="checkbox" id="switch3" switch="none"
                                name="maintenance_documents">
                            <label class="form-label" for="switch3" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    {{-- show documents --}}
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
                    <br><br>


            </div>




            <button class="btn btn-primary" style="width:14%; font-size: 15px; align-self:center; padding: 9px 9px;
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
