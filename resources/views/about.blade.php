@extends('layouts.app')
@section('pageTitle', 'About')
@section('content')
    <main class="main">
        <section class="aboutus-section">
            <div class="container">
                <h2 class="section-title">О нас</h2>
                <div class="flex-content">
                    @foreach($abouts as $item)
                    <div class="flexWrap {{ $item->big_image ? 'flexWrap_column' : '' }}">
                        <div class="flexWrap__img"><img src="/storage/{{ $item->image }}" alt=""></div>
                        <div class="flexWrap__info"><span>{{ $item->title }}</span>
                            <p>{!! $item->text !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
        </section>
    </main>
@endsection
