@extends('layouts.t1')


@section('content')

    <div class="login app-section">
        <div class="container">
            <div class="pages-title">
                <h3>Register</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="input-field">
                    <input id="name" type="text" class="validate" name="name"  value="{{ old('name') }}" autofocus>
                    <label for="name">Your Name</label>

                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <input id="email" type="text" class="validate" name="email"  value="{{ old('email') }}">
                    <label for="email">Email</label>

                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <input id="phone" type="text" class="validate" name="phone"  value="{{ old('phone') }}">
                    <label for="phone">Phone Number</label>

                    @if ($errors->has('phone'))
                        <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password"  value="{{ old('password') }}">
                    <label for="password">Password</label>

                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <input id="password-confirm" type="password" class="validate" name="password_confirmation"  value="{{ old('password-confirm') }}">
                    <label for="password-confirm">Confirm Password</label>

                    @if ($errors->has('password-confirm'))
                        <span class="help-block alert alert-danger"><strong>{{ $errors->first('password-confirm') }}</strong></span>
                    @endif
                </div>



                <button class="button">Register</button>
                <div class="create-account">Have Account? <a href="{{ route('login') }}">Login</a></div>

            </form>
        </div>
    </div>
@endsection
