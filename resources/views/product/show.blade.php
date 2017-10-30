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
                    <button class="button">Add Photos</button> <!-- TODO add photos to product -->
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
                    <h6>2 Comment</h6>
                    @foreach($product->comments as $c)
                    <div class="content">
                        <img src="{{ url('/') }}/t1/img/comment1.png" alt="">
                        <div class="entry">
                            <strong><a href="">{{ $c->user->name }}</a></strong>
                            <p>{{ $c->message }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="post-comment">
                    <h6>Leave a Reply</h6>
                    <div class="content">
                        <form action="#">
                            <div class="input-field">
                                <input id="name" type="text" class="validate">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field">
                                <input id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input id="phone" type="text" class="validate">
                                <label for="phone">Phone</label>
                            </div>

                            <div class="row">
                                <label>Star Rating</label>
                                <p>
                                    <input class="with-gap" name="rate" type="radio" id="s1" value="1" checked />
                                    <label for="s1">1</label>

                                    <input class="with-gap" name="rate" type="radio" id="s2" value="2" />
                                    <label for="s2">2</label>

                                    <input class="with-gap" name="rate" type="radio" id="s3" value="3" />
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
                                <textarea cols="20" rows="10" id="comment" class="validate"></textarea>
                                <label for="comment">Comments</label>
                            </div>
                            <button class="button">Post Comment</button>
                            <a href="#" class="right"><i class="fa fa-exclamation-circle"></i> Something Wrong?!</a> <!-- TODO -->
                        </form>
                        <br />
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection