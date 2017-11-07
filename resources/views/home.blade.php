@extends('layouts.t1')

@section('content')
<div class="login app-pages app-section">
    <div class="container">
        <div class="pages-title">
            <h3>Welcome {{ Auth::user()->name }}</h3>
        </div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <p>
                <label>Phone: </label> {{ Auth()->user()->phone }}<br />
                <label>Email: </label> {{ Auth()->user()->email }}<br />
            </p>
        </div>
    </div>
</div>
@endsection
