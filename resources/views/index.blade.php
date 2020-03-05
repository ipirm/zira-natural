@extends('layouts.app')
@section('pageTitle', 'Main')
@section('content')
    <main class="main">
        <section class="about-country-section">
            <div class="small-container">
                <div class="about-img-wrap country-slider js-country-slider">
                    @foreach(json_decode($main->images) as $image)
                        <div class="about-images slide">
                            <div class="about-img"><img src="{{$image->url}}" alt="{{$image->image}}"></div>
                        </div>
                    @endforeach
                </div>
                <div class="about-descr-wrap"><span class="more-btn js-more-btn">Читать далее</span>
                    <p class="about-descr">
                        {!! $main->text !!}
                    </p>
                </div>
            </div>
        </section>
        <section class="our-products-section">
            <div class="container">
                <h2 class="section-title">Наша продукция</h2>
                <div class="product-wrap product-slider js-product-slider">
                    @foreach($products as $product)
                        <div class="slide">
                            <div class="product">
                                <div class="product__wrap">
                                    <div class="product__img-wrap">
                                        <div class="product__img"><img src="/storage/{{ $product->main_image }}" alt="">
                                            @if($product->cat_name == 2)
                                            <span class="product__new">Новинка</span>
                                                @else
                                            @endif
                                            <div class="product__descr">
                                                <p class="product__descr-text">{!! $product->text !!}
                                                    <a href="">Читать дальше</a></p>
                                                @if($product->add_shop)
                                                <div class="product__descr-price">
                                                    <img src="images/prod.svg" alt="">
                                                    <span>{{ $product->price }}</span>
                                                    <span>₼</span>
                                                </div>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                    <span class="product__name">{{ $product->title }}</span><span class="product__sub-info">{{ $product->subtitle }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="all-prod" href="/catalog">Смотреть все</a>
            </div>
        </section>
        <section class="how-cook-section">
            <div class="container"><span class="cook-title">Как мы готовим</span>
                <div class="cook-content">
                    <p class="cook-descr">{!! $cook->text  !!} </p>
                    <div class="cook-wrap">
                        @foreach(json_decode($cook->images) as $image)
                            <div class="cook-img"><img src="{{$image->url}}" alt="{{$image->image}}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="about-us-section">
            <div class="container">
                <div class="about-wrap">
                    <div class="about-img"><img src="/storage/{{$about->image}}" alt=""></div>
                    <p class="aboutus-descr">
                        {!! $about->text !!}
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
