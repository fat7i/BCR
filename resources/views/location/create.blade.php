@extends('layouts.t1')

@section('content')

    <!-- Add Product -->
    <div class="register app-section app-pages">
        <div class="container">
            <div class="pages-title">
                <div class="chip left"><a href="{{ URL::previous() }}">< Back</a></div>
                <h3>Add Shop</h3>
            </div>

            <form method="POST" action="{{action('LocationController@store')}}">
                {{ csrf_field() }}

                <div class="input-field">
                    <input id="title" type="text" class="validate" name="title"  value="{{ old('title') }}" autofocus>
                    <label for="title">Shop Name</label>

                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                </div>

                <button class="button">Post</button>
            </form>

        </div>
    </div>
    <!-- end Add Product -->
@endsection

@section('js')
@endsection