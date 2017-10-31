@extends('layouts.t1')

@section('content')
    <!-- Add Product -->
    <div class="register app-section app-pages">
        <div class="container">
            <div class="pages-title">
                <div class="chip left"><a href="{{ URL::previous() }}">< Back</a></div>
                <h3>Add Price for <br /> <u>{{ $product->title }}</u></h3>
            </div>

            <form method="POST" action="{{action('ProductController@postPrice')}}">
                {{ csrf_field() }}
                <input type="hidden" class="validate" name="product_id" value="{{ $product->id }}" />

                <div class="input-field">
                    <input id="price" type="text" class="validate" name="price"  value="{{ old('price') }}">
                    <label for="price">Price</label>

                    @if ($errors->has('price'))
                        <span class="help-block"><strong>{{ $errors->first('price') }}</strong></span>
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

                <button class="button">Post</button>

            </form>

            <br />
            <div class="app-title">
                <h4>{{ $product->title }} Prices</h4>
                <div class="line"></div>
            </div>
            <table class="bordered striped">
                @foreach($product->location as $l)
                    <tr>
                        <td>{{ $l->title }}</td>
                        <td>QR {{ $l->price }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
    $(function () {
        $('select').material_select();
    });
    </script>
@endsection