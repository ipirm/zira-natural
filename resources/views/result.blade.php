@extends('layouts.app')
@section('pageTitle', 'Search Result')
@section('content')
    <main class="main">
        <section class="catalog-section">
            <div class="container">
                <div class="results-heder">
                    <p>Результат поиска</p>
                </div>
                <div class="goods-wrap">
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                        @foreach($modelSearchResults as $searchResult)
                            <div class="goods">
                                <div class="goods__wrap">
                                    <div class="goods__images goods-slider js-goods-slider">
                                        <div class="goods__img-wrap slide">
                                            <div class="goods__img"><img
                                                        src="/storage/{{ $searchResult->searchable->main_image }}"
                                                        alt="{{ $searchResult->searchable->main_image}}"></div>
                                        </div>
                                        @foreach(json_decode($searchResult->searchable->product_images) as $image)
                                            <div class="goods__img-wrap slide">
                                                <div class="goods__img"><img src="{{$image->url}}"
                                                                             alt="{{$image->image}}"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span class="goods__name">{{$searchResult->searchable->title  }}</span>
                                    <p class="goods__descr">{!! $searchResult->searchable->text !!}</p>
                                    @if($searchResult->searchable->add_shop)
                                        <a class="goods__link" href="/shop/product/{{$searchResult->searchable->slug}}">Перейти к продукту<span class="goods__price">{{ $searchResult->searchable->price }}₼</span></a>
                                    @else
                                        <a class="goods__link" href="/catalog/product/{{$searchResult->searchable->slug}}">Перейти к продукту</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
