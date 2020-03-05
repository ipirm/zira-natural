@extends('layouts.app')
@section('pageTitle', 'Shop')
@section('content')
    <main class="main">
        <section class="shop-section">
            <div class="container">
                <h2 class="section-title">Онлайн магазин</h2>
                <div class="catalog" style="margin-bottom: 50px">
                    <ul>
                        @foreach($cats as $item)
                            @php
                                $url = explode("/",Request::url());
                            @endphp
                            <li><a href="#" onclick="searchShopCats('{{ $item->cat_name }}',event)"  class="{{ end($url) === $item->cat_name ? 'active' : '' }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
{{--                <div class="filter">--}}
{{--                    <ul>--}}
{{--                        <li><a href="#" onclick="searchShopCats('chip',event)">Сначала дешевые</a></li>--}}
{{--                        <li><a href="#" onclick="searchShopCats('expensive',event)">Сначала дорогие</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="goods-wrap">
                    @foreach($products as $item)
                            @include('sections.goods')
                    @endforeach
                </div>
                {{ $products->links('default.pagination') }}
            </div>
        </section>
    </main>
@endsection
