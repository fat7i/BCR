@extends('layouts.t1')

@section('content')
    <!-- slider -->
    <div class="slider-slick app-pages">
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
                    <button class="button">Add Photos</button> <!-- TODO add photos to product -->
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
                    <li><a href="#"><i class="fa fa-user"></i> {{ $product->user->name }}</a></li>
                    <li><a href="#"><i class="fa fa-star"></i> {{ $product->rate }}</a></li>
                    <li><a href="#"><i class="fa fa-money"></i> QR {{ $product->price }}</a></li>
                </ul>
            </div>
            <h5>{{ $product->title }}</h5>
            <p>{{ $product->description }}</p>

                <div class="share">
                    <ul>
                        <li><h6>Share via :</h6></li> <!-- TODO socail share -->
                        <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>

                <table class="bordered striped">
                    @foreach($product->location as $l)
                    <tr>
                        <td>{{ $l->title }}</td>
                        <td>QR {{ $l->price }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><strong class="right"><a href="{{ action('ProductController@addPrice', ['id' => $product->barcode]) }}"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Price</a></strong></td>
                    </tr>
                </table>
                <br />

                @foreach($product->category as $c)
                    <div class="chip">{{ $c->title  }}</div>
                @endforeach



                <div class="comment">
                    <h6>{{ count($product->comments)  }} Comment</h6>
                    @foreach($product->comments as $c)
                    <div class="content">
                        <img src="{{ url('/') }}/t1/img/comment1.png" alt="">
                        <div class="entry">
                            <strong><a href="">{{ $c->user->name }}</a></strong>
                            - <a href="#">{{ $c->rate }} <i class="fa fa-star"></i></a>
                            <p>{{ $c->message }}&nbsp;</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br />

                @if (Auth::check())
                <div class="post-comment">
                    <h6>Leave a Reply</h6>
                    <div class="content">
                        <form method="POST" action="{{action('ProductController@postComment')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="row">
                                <label>Star Rating</label>
                                <p>
                                    <input class="with-gap" name="rate" type="radio" id="s1" value="1" />
                                    <label for="s1">1</label>

                                    <input class="with-gap" name="rate" type="radio" id="s2" value="2" />
                                    <label for="s2">2</label>

                                    <input class="with-gap" name="rate" type="radio" id="s3" value="3" checked />
                                    <label for="s3">3</label>

                                    <input class="with-gap" name="rate" type="radio" id="s4" value="4" />
                                    <label for="s4">4</label>

                                    <input class="with-gap" name="rate" type="radio" id="s5" value="5" />
                                    <label for="s5">5 Stars</label>
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
                            <h5><a href="{{ route('register') }}" style="color: #fff">Leave a Reply ?</a></h5>
                            <p><a href="{{ route('register') }}" style="color: #fff; font-weight: bold;">Signup</a> to share your experience with the others</p>
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

@endsection