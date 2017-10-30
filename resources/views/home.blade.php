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

            You are logged in!
        </div>
    </div>
</div>
@endsection
