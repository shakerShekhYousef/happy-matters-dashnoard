@extends('dashboard.layout.app')
@section('style')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Create new Announcement</h5>
            </div>
            <div class="card-body">

                <form novalidate method="POST" action="{{ route('web_store_announcement') }}">
                    @csrf
                    <div class="row">


                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Properties</label>
                                <div class="col-md-12">
                                    <select class="form-select" aria-label="Default select example" name="property_id" required>
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
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
       
                        <div class="col-md-4">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="validationTooltip04">Subject</label>
                                <input  id="validationTooltip04" type="text" class="form-control"  placeholder="subject"
                                    value="{{ old('subject') }}" name="subject"  />
                                <div class="invalid-tooltip">
                                    Please enter  subject .
                                </div>
                            </div>
                        </div>
                        
                        <!-- End Col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label class="col-md-4 form-label">Details</label>
                                <div class="col-md-12">

                                    <textarea type="text" name="details" class="form-control" id="validationTooltip02" placeholder="details"
                                    value="{{ old('details') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>


            <button class="btn btn-primary"  style="width:14%; font-size: 15px;   align-self:center; padding: 9px 9px;
            margin:inherit;" type="submit">Create</button>
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

    {{-- <script>
        function submit(event) {
            alert('dd');
            e.preventDefault();
            let formdata = new FormData(event.target);
            $.ajax({
                type: 'post',
                url: '{{ route('web_store_announcement') }}',
                data: formData,
                success: function() {
                    console.log('success');
                },
               
            })

        }
    </script> --}}
@endsection
