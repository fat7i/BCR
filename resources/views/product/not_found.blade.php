@extends('layouts.t1')

@section('content')

    @if ($barcode)
        <div class="offers app-section app-pages">
            <div class="container">
                <div class="offers-content">
                    <div class="row">
                        <div class="col s4">
                            <div class="icon icon1">
                                <i class="fa fa-low-vision"></i>
                            </div>
                        </div>
                        <div class="col s8">
                            <div class="entry">
                                <h5>Product not Found</h5>
                                <p>Help the others by adding it and share your experience.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row container">
                    <i class="fa fa-barcode"></i> {{ $barcode }}<br />
                </div>

                <div class="row center-align">
                    <a class="waves-effect waves-light btn" href="{{ action('ProductController@create',["id" => $barcode]) }}">
                        <i class="material-icons left">add</i>
                        Add This Product
                    </a>
                </div>
            </div>
        </div>


    @endif

@endsection