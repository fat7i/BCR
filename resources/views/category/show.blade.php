@extends('layouts.t1')

@section('content')
    <div class="app-section">
        <h2 class="container">{{ $category->title  }}</h2>
        <ul class="collection">
            @foreach($category->products as $p)
            <li class="collection-item avatar">
                <i class="material-icons circle red">brightness_1</i>
                <span class="title">
                    <a href="{{ action('ProductController@show', ['id' => $p->barcode]) }}">
                        {{ $p->title  }}
                    </a>
                </span>
                <p>
                    QR {{ $p->price  }}
                    <br />
                    @for ($i = 0; $i < $p->rate; $i++)
                        <a class="star fullStar" href="{{ action('ProductController@show', ['id' => $p->barcode]) }}"></a>
                    @endfor
                </p>
            </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('t1/star-rating/rating.css') }}">
@endsection