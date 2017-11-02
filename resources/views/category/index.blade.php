@extends('layouts.t1')

@section('content')
    <div class="app-section app-pages">
        <div>
            <h3 class="center-align">Categories List</h3>
        </div>

        <ul class="collection">
            @foreach($categories as $id=>$title)
                <a href="{{ action('CategoryController@show', ['id' => $id]) }}" class="collection-item">{{ $title }}</a>
            @endforeach
        </ul>
    </div>
@endsection