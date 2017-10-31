@extends('layouts.t1')

@section('content')

    <!-- slider -->
    <div class="slider-slick app-pages">
        <div class="slider-entry">

            <img src="img/slider1.jpg" alt="">
            <div class="overlay"></div>
            <div class="caption">
                <div class="container">
                    <h2>Clean Templates</h2>
                    <p>Lorem Ipsum Dolor Sit Meta</p>
                </div>
            </div>
        </div>
        <div class="slider-entry">
            <div class="overlay"></div>
            <img src="img/slider2.jpg" alt="">
            <div class="caption">
                <div class="container">
                    <h2>Awesome Features</h2>
                    <p>Lorem Ipsum Dolor Sit Meta</p>
                    <button class="button">Read More</button>
                </div>
            </div>
        </div>
        <div class="slider-entry">
            <div class="overlay"></div>
            <img src="img/slider3.jpg" alt="">
            <div class="caption">
                <div class="container">
                    <h2>Perfect Templates</h2>
                    <p>Lorem Ipsum Dolor Sit Meta</p>
                    <button class="button">Read More</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider -->

    <!-- note -->
    <div class="note app-section">
        <div class="container">
            <h5>Amazing Design</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt numquam possimus suscipit facere, delectus, quaerat voluptatibus architecto mollitia.</p>
        </div>
    </div>
    <!-- end note -->

    <!-- portfolio -->
    <div class="portfolio app-section app-bg-dark">
        <div class="container">
            <div class="app-title">
                <h4>Portfolio</h4>
                <div class="line"></div>
            </div>
            <ul class="portfolio-filter">
                <li data-filter="all" class="active">All</li>
                <li data-filter="1">Nature</li>
                <li data-filter="2">Abstract</li>
                <li data-filter="3">Objects</li>
            </ul>
            <div class="portfolio-item">
                <div class="row">
                    <div class="col s6 filtr-item" data-category="1, 2">
                        <a href="img/portfolio1.jpg" data-lightbox="image-1"><img src="img/portfolio1.jpg" alt=""></a>
                    </div>
                    <div class="col s6 filtr-item" data-category="2, 3">
                        <a href="img/portfolio2.jpg" data-lightbox="image-1"><img src="img/portfolio2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 filtr-item" data-category="3, 3">
                        <a href="img/portfolio3.jpg" data-lightbox="image-1"><img src="img/portfolio3.jpg" alt=""></a>
                    </div>
                    <div class="col s6 filtr-item" data-category="3, 1">
                        <a href="img/portfolio4.jpg" data-lightbox="image-1"><img src="img/portfolio4.jpg" alt=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 filtr-item" data-category="2">
                        <a href="img/portfolio5.jpg" data-lightbox="image-1"><img src="img/portfolio5.jpg" alt=""></a>
                    </div>
                    <div class="col s6 filtr-item" data-category="2, 1">
                        <a href="img/portfolio6.jpg" data-lightbox="image-1"><img src="img/portfolio6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end portfolio -->

@endsection