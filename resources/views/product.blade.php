@extends('layouts.app')
@section('pageTitle', 'Product')
@section('content')
    <main class="main">
        <section class="detailed-section">
            <div class="container">
                <div class="detailed-wrap">
                    <div class="product-images">
                        <div class="main-images">
                            <div class="main-img"><img src="/storage/{{$product->main_image}}"
                                                       alt="{{$product->main_image}}"></div>
                        </div>
                        <div class="sub-images">
                            <div class="sum-img"><img src="/storage/{{ $product->main_image }}"
                                                      alt="{{ $product->main_image }}"></div>
                            @foreach(json_decode($product->product_images) as $image)
                                <div class="sum-img"><img src="{{ $image->url }}" alt="{{ $image->image }}"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-info"><span class="product-name">{{ $product->title }}</span>
                        <span class="product-color">{{ $product->subtitle }}</span>
                        <p class="product-descr"> {!! $product->text !!} </p>
                        <div class="composition"><span>Состав:</span>
                            <p>{{$product->composition}}</p>
                        </div>
                        @if((request()->routeIs('catalogProduct')))
                        @else
                            <button class="main-btn js-basket" type="button">
                                <span>Купить</span><span>{{$product->price}}₼</span></button>
                            @if($session_item)
                                <button class="main-btn" type="button" onclick="removeBasket({{ $product->id }})">
                                    Удалить из корзины
                                </button>
                            @else
                                <button class="main-btn" type="button" onclick="addBasket({{ $product->id }})">
                                    Добавить в корзину
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="more"><span class="more-title">Смотреть так же другие продукты Zira</span>
                    <div class="more-wrap">
                        <div class="more-slider js-more-slider">
                            @foreach($randoms as $item)
                                <div class="slide">
                                    @if($item->add_shop)
                                        <a class="more-product" href="/shop/product/{{$item->slug}}">
                                            <div class="more-img"><img src="/storage/{{ $item->main_image }}"
                                                                       alt="{{ $item->main_image }}"></div>
                                            <span class="more-name">{{ $item->title }}</span>
                                            <a class="more-link" href="/shop/product/{{$item->slug}}">Перейти</a>
                                        </a>
                                    @else
                                        <a class="more-product" href="/catalog/product/{{$item->slug}}">
                                            <div class="more-img"><img src="/storage/{{ $item->main_image }}"
                                                                       alt="{{ $item->main_image }}"></div>
                                            <span class="more-name">{{ $item->title }}</span>
                                            <a class="more-link" href="/catalog/product/{{$item->slug}}">Перейти</a>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
