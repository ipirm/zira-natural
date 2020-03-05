<div class="goods">
    <div class="goods__wrap">
        <div class="goods__images goods-slider js-goods-slider">
                <div class="goods__img-wrap slide">
                    <div class="goods__img"><img src="/storage/{{ $item->main_image }}" alt="{{ $item->main_image}}"></div>
                </div>
            @foreach(json_decode($item->product_images) as $image)
                <div class="goods__img-wrap slide">
                    <div class="goods__img"><img src="{{ $image->url }}" alt="{{ $image->image }}"></div>
                </div>
            @endforeach
        </div><span class="goods__name">{{ $item->title}}</span>
        <p class="goods__descr">{!! $item->text !!}</p>
        @if(request()->routeIs('shop'))
            <a class="goods__link" href="/shop/product/{{$item->slug}}">Перейти к продукту<span class="goods__price">{{ $item->price }}₼</span></a>
            @else
      <a class="goods__link" href="/catalog/product/{{$item->slug}}">Перейти к продукту</a>
        @endif
    </div>

</div>
