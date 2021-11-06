@extends('layouts.app')

@section('title')
{{ $title ?? 'Default' }}
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{ route('sliders.store') }}" method="POST" class="d-inline" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="sliders-wrapper">
                    <p>Sliders</p>


                    <table class="table" id="sliderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    Image <br />
                                    <small>Max 400kb <br /></small>
                                    <small>1400x500 px</small>
                                </th>
                                <th style="width: 35%">
                                    Title <br />
                                    <small>Max 50 Characters</small>
                                </th>
                                <th style="width: 40%">
                                    Wording <br />
                                    <small>Max 100 Characters</small>
                                </th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- row 1 --}}
                            <tr class="mb-3 fieldRow" id="fieldRow_0" data-field-number="0">
                                <td>1</td>
                                <td>
                                    <img
                                        src="{{ asset('images/default.jpg') }}"
                                        alt="" class="w-100 mb-3">
                                    <input
                                        class="form-control" type="file"
                                        name="custom_fields[field_frontpage][0][image]">
                                </td>
                                <td>
                                    <input
                                        type="text" class="form-control"
                                        name="custom_fields[field_frontpage][0][title]"
                                        value=""
                                        maxlength="50">
                                </td>
                                <td>
                                    <textarea
                                        class="form-control" cols="8" rows="5"
                                        name="custom_fields[field_frontpage][0][wording]"
                                        maxlength="100"></textarea>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="text-decoration-none deleteRow">&#10006;</a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: right">
                                    <button type="button" class="btn btn-primary" id="addRowBtn">Add Row</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="col-md-3">
                <div class="image-feature-wrapper">
                    <p>Image Feature</p>
                    <img src="" alt="" id="imgFeaturePreview" class="img-fluid mb-3 d-block">


                    <input type="file" name="image_feature" class="form-control-file">
                    @error('image_feature') <div class="invalid-feedback">{{ $message }}</div> @enderror

                </div>
                <div class="button-submit mt-4">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    $(function(){
        let img_preview = $('#imgFeaturePreview');
        $('[name=image_feature]').on('change', function(){
            ScanImg(this);
        });

        // functions
        function ScanImg(input){
            if(input.files && input.files[0]){
                let reader = new FileReader();
                reader.onload = function(e){
                    img_preview.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
@endpush
