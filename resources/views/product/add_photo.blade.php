@extends('layouts.t1')

@section('content')
    <!-- Add Product -->
    <div class="register app-section">
        <div class="container">
            <div class="pages-title">
                <div class="chip left"><a href="{{ action('ProductController@show', ['id' => $product->barcode]) }}">< Back</a></div>
                <h3>Add Photos for <br /> <u>{{ $product->title }}</u></h3>
            </div>

            <form method="POST" action="{{action('ProductController@postPhoto')}}">
                {{ csrf_field() }}
                <input type="hidden" class="validate" name="product_id" value="{{ $product->id }}" />

                <div class="file-field input-field">
                    <div class="btn">
                        <span>Photos</span>
                        <input type="file" multiple>
                        <input type="file" id="fileupload" name="photo" data-url="{{ url('/product/upload') }}" multiple />
                        <input type="hidden" name="photos" id="file_ids" value="" />
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more photos" id="loading">
                    </div>
                    <div id="files_list"></div>
                </div>

                <button class="button">Post</button>
            </form>
        </div>
        <!-- slider -->
        <div class="slider-slick app-pages">
            @foreach($product->photos as $p)
                <div class="slider-entry">
                    <img src="{{ $p->path }}" alt="">
                    <div class="overlay"></div>
                    <div class="caption" style="top: 88% !important;">
                        <div class="container">
                            <span class="button right">by: {{ $p->user->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end slider -->
    </div>

@endsection

@section('js')

    <script src="{{ asset('t1/js/blueimp/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('t1/js/blueimp/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('t1/js/blueimp/jquery.fileupload.js') }}"></script>
    <script>
        $(function () {
            $('select').material_select();
            $('#fileupload').fileupload({
                dataType: 'json',
                add: function (e, data) {
                    $('#loading').val('Uploading...');
                    data.submit();
                },
                done: function (e, data) {
                    var file = data.result.path;

                    $('#files_list').append('<img src="'+ file +'" class="pImg" />');

                    if ($('#file_ids').val() != '') {
                        $('#file_ids').val($('#file_ids').val() + ',');
                    }
                    $('#file_ids').val($('#file_ids').val() + file);

                    $('#loading').val('');
                }
            });
        });
    </script>
    <style>
        .pImg{
            width: 75px;
            height: 75px;
        }
    </style>
@endsection

