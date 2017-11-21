@extends('layouts.t1')

@section('content')
    <div class="app-section">
        <h2 class="container">{{ $location->title  }}</h2>

        @if ($location->iframe)
            <br />
            {!! $location->iframe !!}
        @endif
    </div>
@endsection


@section('js')
@endsection