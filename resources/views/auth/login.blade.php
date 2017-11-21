@extends('layouts.t1')

@section('content')

    <div class="login app-section">
        <div class="container">
            <div class="pages-title">
                <h3>Login</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="input-field">
                    <input id="email" type="text" class="validate" name="login"  value="{{ old('email') }}" autofocus>
                    <label for="email">Phone Number or Email</label>

                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password"  value="{{ old('password') }}">
                    <label for="password">Password</label>

                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <div><a href="{{ route('password.request') }}" class="forgot">Forgot Password?</a></div>
                <div class="chebox">
                    <input type="checkbox" id="checkbox" name="remember" checked />
                    <label for="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember me</label>
                </div>
                <button class="button">Login</button>
                <div class="create-account">Not Registered? <a href="{{ route('register') }}">Create an account</a></div>

            </form>
            {{--
            TODO
            <div class="or">
                <h5>OR</h5>
                <button class="button facebook">Login with Facebook</button>
                <button class="button twitter">Login with Twitter</button>
                <button class="button google">Login with Google+</button>
            </div>
            --}}
        </div>
    </div>
@endsection
