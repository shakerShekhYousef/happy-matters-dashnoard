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
                <form class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Category</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Category"
                                    name="maintenance_category" value="{{ $maintenance['maintenance_category'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id">
                                        <option selected>
                                            {{ $maintenance['property'] }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Unit</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="unit_id">
                                        <option selected>
                                            {{ $maintenance['unit'] }}
                                        </option>
                                    </select>
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
                                    placeholder="Responsible person" name="responsible_person"
                                    value="{{ $maintenance['responsible_person'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Title</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Title"
                                    name="title" value="{{ $maintenance['title'] }}"readonly>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Details</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Details"
                                    name="details" value="{{ $maintenance['details'] }}"readonly>
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
                                    placeholder="Available date" value="{{ $maintenance['available_date'] }}"
                                    name="available_date"readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip05">Time slot</label>
                                <input type="time" class="form-control" id="validationTooltip05" placeholder="Time slot"
                                    value="{{ $maintenance['time_slot'] }}" name="time_slot" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip01">Priority</label>
                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Priority"
                                    name="priority" value="{{ $maintenance['priority'] }}" readonly>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->

                    <br><br>
                    <div class="row mt-3">
                        <label class="col-md-2 form-label" style="color:black">maintenance media</label>
                        <label class="col-md-2 switch2"><input type="checkbox" id="switch2" switch="none"
                                {{ count($maintenance['media']) > 0 ? 'checked' : null }} name="maintenance_media">
                            <label class="form-label" for="switch2" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    {{-- show media --}}
                    @if (count($maintenance['media']) > 0)
                        <div class="row hideme2" . $mediaid id="media" .$mediaid>
                            <div class="ajaxModalBody">
                                <div class="container-fluid">
                                    <div id="AddItemOption2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <table class="table table-striped">
                                                <thead style="text-align: center; vertical-align: middle">
                                                    <th>Media type</th>
                                                    <th>Media</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($maintenance['media'] as $media)
                                                        <tr style="text-align: center; vertical-align: middle">
                                                            <td>{{ $media->media_type }}</td>
                                                            <td>
                                                                <a href="{{ asset($media->name) }}" target="_blank">
                                                                    @if ($media->media_type == 'photo')
                                                                        <img src="{{ asset($media->name) }}" alt=""
                                                                            width="200" height="200">
                                                                    @else
                                                                        <video src="{{ asset($media->name) }}"
                                                                            width="200" height="200"></video>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                        <label class="col-md-2 form-label" style="color:black">maintenance documents</label>
                        <label class="col-md-2 switch3"><input type="checkbox" id="switch3" switch="none"
                                {{ count($maintenance['documents']) > 0 ? 'checked' : null }}
                                name="maintenance_documents">
                            <label class="form-label" for="switch3" data-on-label="On" data-off-label="Off"></label>
                            <!-- End Col -->
                    </div>
                    {{-- show documents --}}
                    @if (count($maintenance['documents']) > 0)
                        <div class="row hideme3" . $documentid id="media" .$documentid>
                            <div class="ajaxModalBody">
                                <div class="container-fluid">
                                    <div id="AddItemOption3">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <table class="table table-striped">
                                                <thead style="text-align: center; vertical-align: middle">
                                                    <th>Document type</th>
                                                    <th>Document</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($maintenance['documents'] as $key => $document)
                                                        <tr style="text-align: center; vertical-align: middle">
                                                            <td>{{ $document->type }}</td>
                                                            <td>
                                                                <a href="{{ asset($document->name) }}"
                                                                    target="_blank">Doc{{ $key }}.{{ pathinfo(asset($document->name), PATHINFO_EXTENSION) }}<img
                                                                        src="{{ asset('assets/images/pdf.png') }}" alt=""
                                                                        width="50" height="50"></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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

            </div>

            <a href="{{ route('web_maintenances_list') }}"  class="btn btn-primary"
            style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;"  type="submit">Back</a>
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
