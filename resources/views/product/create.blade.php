@extends('layouts.t1')

@section('content')

    @if ($barcode)
    <div class="offers app-section app-pages">
        <div class="container">
            <div class="offers-content">
                <div class="row">
                    <div class="col s4">
                        <div class="icon icon1">
                            <i class="fa fa-support"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Product not Found</h5>
                            <p>Help the others by adding it and share your experiance </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- Add Product -->
    <div class="register app-section">
        <div class="container">
            <div class="pages-title">
                <h3>Add Product</h3>
            </div>

            <form method="POST" action="{{action('ProductController@store')}}">
                {{ csrf_field() }}
                <input type="hidden" class="validate" name="barcode" value="{{ $barcode }}">
                <input type="hidden" class="validate" name="id" value="{{ old('id') }}" />


                <div class="input-field">
                    <input id="title" type="text" class="validate" name="title"  value="{{ old('title') }}" autofocus>
                    <label for="title">Product Name</label>

                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <input id="price" type="text" class="validate" name="price">
                    <label for="price">Price</label>
                    @if ($errors->has('price'))
                        <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
                    @endif
                </div>

                <div class="row">
                    <label>Star Rating</label>
                    <p class="star-rating">
                        <input class="with-gap" name="rate" type="radio" id="s1" value="1" />

                        <input class="with-gap" name="rate" type="radio" id="s2" value="2" />

                        <input class="with-gap" name="rate" type="radio" id="s3" value="3" checked />

                        <input class="with-gap" name="rate" type="radio" id="s4" value="4" />

                        <input class="with-gap" name="rate" type="radio" id="s5" value="5" />
                    </p>

                    @if ($errors->has('rate'))
                        <span class="help-block"><strong>{{ $errors->first('rate') }}</strong></span>
                    @endif
                </div>

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
                    @if ($errors->has('photos'))
                        <span class="help-block"><strong>{{ $errors->first('photos') }}</strong></span>
                    @endif
                </div>

                <div class="input-field col s12">
                    <select name="location">
                        <option value="" disabled selected>Shop Name</option>
                        @foreach($locations as $id=>$title)
                            <option value="{{ $id }}">{{ $title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('location'))
                        <span class="help-block"><strong>{{ $errors->first('location') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <span class="right"><a href="{{ route('add_shop') }}">Other Shop</a></span>
                    <br />
                </div>

                <div class="input-field">
                    <textarea cols="20" rows="2" id="description" class="materialize-textarea" name="description"></textarea>
                    <label for="description">Description</label>
                </div>

                <div class="row">
                    <label for="category">Category</label>
                    @foreach($categories as $id=>$title)
                    <p>
                        <input type="checkbox" name="categories[]" id="{{ $id }}" value="{{ $id }}" />
                        <label for="{{ $id }}">{{ $title }}</label>
                    </p>
                    @endforeach
                    @if ($errors->has('categories'))
                        <span class="help-block"><strong>{{ $errors->first('categories') }}</strong></span>
                    @endif
                </div>

                <button class="button">Post</button>
            </form>

        </div>
    </div>
    <!-- end Add Product -->
@endsection

@section('js')

    <script src="{{ asset('t1/js/blueimp/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('t1/js/blueimp/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('t1/js/blueimp/jquery.fileupload.js') }}"></script>

    <script src="{{ asset('t1/star-rating/rating.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('t1/star-rating/rating.css') }}">

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

            $('.star-rating').rating();
        });
    </script>
    <style>
        .pImg{
            width: 75px;
            height: 75px;
        }
    </style>
@endsection