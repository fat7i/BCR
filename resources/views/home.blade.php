@extends('layouts.t1')

@section('content')
<div class="login app-pages">
    <div class="container">
        <div class="pages-title">
            <h3>Hello {{ Auth::user()->name }}</h3>
        </div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @include('misc.user_activities')

            <br />

            <div class="app-title">
                <h4>Personal Info</h4>
                <div class="line"></div>
            </div>
            <p>
                <label>Phone: </label> {{ Auth()->user()->phone }}<br />
                <label>Email: </label> {{ Auth()->user()->email }}<br />
            </p>

        </div>
    </div>
</div>

<div class="app-section">
    <div class="row">
        <div class="col s10 offset-s1 center-align">
            <h2>Tell a friend About us!</h2>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f2f310153a68b98"></script>
            <div class="addthis_inline_share_toolbox center-align"></div>
        </div>
    </div>
</div>
@endsection
