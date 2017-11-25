@extends('layouts.t1')

@section('page_title'){{ $product->title }} - @endsection

@section('content')
    <!-- slider -->
    <div class="slider-slick">
        @foreach($product->photos as $p)
        <div class="slider-entry">
            <img src="{{ $p->path }}" alt="">
            <div class="overlay"></div>
            <div class="caption" style="top: 88% !important;">
                <div class="container">
                    <span class="button right">by: {{ $p->user->name }}</span>
                </div>
            </div>
        </div>
        @endforeach

        <div class="slider-entry">
            <img src="{{ url('/') }}/t1/img/add_product_photo.png" alt="">
            <div class="overlay"></div>
            <div class="caption">
                <div class="container">
                    <a href="{{ action('ProductController@addPhoto', ['id' => $product->barcode]) }}">
                    <button class="button">Add Photos</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider -->

    <div class="blog-single">
        <div class="container">
            <div class="entry">
            <div class="user-date">
                <ul>
                    <li><a><i class="fa fa-user"></i> {{ $product->user->name }}</a></li>
                    <li><a><i class="star fullStar"></i> <b>{{ $product->rate }}</b></a></li>
                    <li><a><i class="fa fa-money"></i> QR {{ $product->price }}</a></li>
                    <li><a><i class="fa fa-barcode"></i> {{ $product->barcode }}</a></li>
                </ul>
            </div>
            <h5>{{ $product->title }}</h5>
            <p>{{ $product->description }}</p>

                <div class="share">
                    <div class="addthis_inline_share_toolbox"></div>
                </div>

                <table class="bordered striped">
                    @foreach($product->location as $l)
                    <tr>
                        <td><a href="{{ action('LocationController@show', ['id' => $l->location_id]) }}">{{ $l->title }}</td>
                        <td>QR {{ $l->price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><strong class="right"><a href="{{ action('ProductController@addPrice', ['id' => $product->barcode]) }}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Price</a></strong></td>
                    </tr>
                </table>
                <br />

                @foreach($product->category as $c)
                    <div class="chip"><a href="{{ action('CategoryController@show', ['id' => $c->id]) }}">{{ $c->title  }}</a></div>
                @endforeach



                <div class="comment">
                    <h6>{{ count($product->comments)  }} Comment</h6>
                    @foreach($product->comments as $c)
                    <div class="content">
                        <img src="https://api.adorable.io/avatars/130/{{ rand (500, 1000)  }}.png" alt="{{ $c->user->name }}">
                        <div class="entry">
                            <a>{{ $c->user->name }}</a>
                            <div class="stars right">
                                @for ($i = 0; $i < $c->rate; $i++)
                                    <a class="star fullStar"></a>
                                @endfor
                            </div>

                            <p>{!!html_entity_decode($c->message)!!}&nbsp;
                                <br />
                                <small style="color: #e0e0e0;">{{ date('j M Y G:i', strtotime($c->created_at)) }}</small>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br />

                @if (Auth::check())
                <div class="post-comment">
                    <h6>Rate This ...</h6>
                    <div class="content">
                        <form method="POST" action="{{action('ProductController@postComment')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="row">
                                <p class="star-rating">
                                    <input class="with-gap" name="rate" type="radio" id="s1" value="1" />
                                    <input class="with-gap" name="rate" type="radio" id="s2" value="2" />
                                    <input class="with-gap" name="rate" type="radio" id="s3" value="3" checked />
                                    <input class="with-gap" name="rate" type="radio" id="s4" value="4" />
                                    <input class="with-gap" name="rate" type="radio" id="s5" value="5" />
                                </p>

                                @if ($errors->has('rate'))
                                    <span class="help-block"><strong>{{ $errors->first('rate') }}</strong></span>
                                @endif
                            </div>

                            <div class="input-field">
                                <textarea cols="20" rows="5" id="comment" class="validate" name="message"></textarea>
                                <label for="comment">Comments</label>
                            </div>
                            <button class="button">Post Comment</button>
                        </form>
                    </div>
                </div>

                @else
                    <div class="note app-section">
                        <div class="container">
                            <h5><a href="{{ route('login') }}" style="color: #fff">Rate this ?</a></h5>
                            <p>
                                <a  class="waves-effect waves-light btn red darken-4" href="{{ route('login') }}">Login</a> OR
                                <a  class="waves-effect waves-light btn red darken-4" href="{{ route('register') }}">Signup</a>
                                <br />to share your experience with the others.
                            </p>
                        </div>
                    </div>
                @endif

                <a href="{{ route('contact') }}" class="right"><i class="fa fa-exclamation-circle"></i> Something Wrong?!</a>
                <br />

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('t1/star-rating/rating.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('t1/star-rating/rating.css') }}">

    <script>
        $(function () {
            $('.star-rating').rating();
        });
    </script>
@endsection