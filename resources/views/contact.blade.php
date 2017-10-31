@extends('layouts.t1')

@section('content')
    <!-- contact-->
    <div class="contact app-pages app-section">
        <div class="container">
            <div class="pages-title">
                <h3>We 're happy to hear from you.</h3>
            </div>
            <form method="POST" action="{{action('HomeController@contact')}}">
                {{ csrf_field() }}
                <div class="input-field">
                    <input id="name" type="text" class="validate" name="name" value="{{ Auth::user()['name'] }}">
                    <label for="name">Name</label>
                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>
                <div class="input-field">
                    <input id="email" type="email" class="validate" name="email" value="{{ Auth::user()['email'] }}">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input id="phone" type="text" class="validate" name="phone" value="{{ Auth::user()['phone'] }}">
                    <label for="phone">Number</label>
                </div>
                <div class="input-field">
                    <textarea cols="20" rows="10" id="your-message" class="validate" name="message"></textarea>
                    <label for="your-message">Your Message</label>
                    @if ($errors->has('message'))
                        <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block"><strong>{{ $errors->first('g-recaptcha-response') }}</strong></span>
                    @endif
                </div>

                <button class="button">Submit</button>
            </form>
        </div>
    </div>
    <!-- end contact -->
@endsection
