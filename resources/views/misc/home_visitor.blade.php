@extends('layouts.t1')

@section('content')
    <!-- offers -->
    <div class="offers app-section">
        <div class="container">
            <div class="offers-content">
                <div class="row">
                    <div class="col s4">
                        <div class="icon icon1">
                            <i class="fa fa-barcode"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Scan</h5>
                            <p>Scan product <b>barcode</b>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offers-content">
                <div class="row">
                    <div class="col s4">
                        <div class="icon icon2">
                            <i class="fa fa-info"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Know</h5>
                            <p>Know more info, buyer <b>reviews</b> and where is the <b>best price</b>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offers-content">
                <div class="row row-margin">
                    <div class="col s4">
                        <div class="icon icon3">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                    </div>
                    <div class="col s8">
                        <div class="entry">
                            <h5>Share</h5>
                            <p>Share your <b>experience</b> with the others</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end offers -->


    <div class="note app-section">
        <div class="container">
            <h5><a href="{{ route('login') }}" style="color: #fff">Join us ?</a></h5>
            <p>
                <a  class="waves-effect waves-light btn red darken-4" href="{{ route('login') }}">Login</a> OR
                <a  class="waves-effect waves-light btn red darken-4" href="{{ route('register') }}">Signup</a>
                <br />to share your experience with the others.
            </p>
        </div>
    </div>

    <div class="app-section">
        <div class="row">
            <div class="col s10 offset-s1 center-align">
                <h2>Tell a friend!</h2>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f2f310153a68b98"></script>
                <div class="addthis_inline_share_toolbox center-align"></div>
            </div>
        </div>
    </div>

    <br /><br /><br /><br /><br />
@endsection
