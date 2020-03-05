@extends('layouts.app')
@section('pageTitle', 'Catalog')
@section('content')
    <main class="main">
        <section class="catalog-section">
            <div class="container">
                <h2 class="section-title">Каталог продукции</h2>
                <div class="catalog">
                    <ul>
                        @foreach($cats as $item)
                            @php
                                $url = explode("/",Request::url());
                            @endphp
                            <li>
                                <a
                                        href="#"
                                        onclick="searchCats('{{ $item->cat_name }}',event)"
                                        class="{{ end($url) === $item->cat_name ? 'active' : '' }}"
                                >
                                    {{ $item->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class=" goods-wrap">
                    @foreach($products as $item)
                        @include('sections.goods')
                    @endforeach
                </div>
                {{ $products->links('default.pagination') }}
            </div>
        </section>
    </main>
@endsection
