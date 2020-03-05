<footer class="footer">
    <div class="container">
        <div class="main-info">
            <nav class="nav">
                <ul>
                    <li><a href="/" class="{{ (request()->routeIs('index')) ? 'active' : '' }}">Главная</a></li>
                    <li><a href="/about" class="{{ (request()->routeIs('about')) ? 'active' : '' }}">О нас</a></li>
                    <li><a href="/catalog"
                           class="{{ (request()->routeIs('catalog')) || (request()->routeIs('catalogProduct')) ? 'active' : '' }}">Каталог</a>
                    </li>
                    <li><a href="/shop"
                           class="{{ (request()->routeIs('shop')) || (request()->routeIs('ShopProduct')) ? 'active' : '' }}">Магазин</a>
                    </li>
                    <li><a href="/contact" class="{{ (request()->routeIs('contact')) ? 'active' : '' }}">Контакты</a>
                    </li>
                </ul>
            </nav>
            <div class="address">
                <div class="left-info"><span class="addr-title">Почтовый адрес</span>
                    <p>{{$setting->mail_address}}</p>
                    <a href="tel:{{$setting->house_number}}">Тел.: {{$setting->house_number}}</a>
                </div>
                <div class="right-info"><a href="tel:{{$setting->mobile_number}}">Тел: {{$setting->mobile_number}}</a><a
                            href="mailto:{{$setting->email}}">{{$setting->email}}</a></div>
            </div>
            <div class="soc-block">
                <div class="soc-net">
                    <div class="qr-img"><img src="/images/qr-inst.svg" alt=""></div>
                    <a class="inst" href="{{$setting->instagram}}"></a>
                </div>
                <div class="soc-net">
                    <div class="qr-img"><img src="/images/qr-fb.svg" alt=""></div>
                    <a class="fb" href="{{$setting->facebook}}"></a>
                </div>
            </div>
        </div>
        <p class="copyright">Copyright © 2010 by OOO Brightman BMC</p>
    </div>
</footer>
<div class="mask"></div>
<div class="modal scroll-wrap"><span class="modal__close js-close"></span>
    <div class="modal__wrap">
        <div class="modal__basket scroll-wrap">
            @if(session()->has('cart'))
            @foreach(request()->session()->get('cart') as $item)
                <div class="modal__product"><span class="modal__name">{{ $item->title }}</span>
                    <span class="modal__delete" onclick="removeFromBasket({{ $item->id }},event,{{$item->price}})"></span>
                </div>
            @endforeach
            @php
                $price = 0;
                 foreach(request()->session()->get('cart') as $item){
                     $price = $price + $item->price;
                 }
            @endphp
                <div class="modal__total"><span>Общая стоимость:</span><span>{{ $price }}₼</span></div>
                @else
                <div class="modal__total"><span>Общая стоимость:</span><span>0 ₼</span></div>
            @endif

        </div>
        <div class="modal__order">
            <span class="modal__order-title">Оформление заказа</span>
            <form class="mainForm" action="#">
                <div class="mainForm__wrap">
                    <input class="mainForm__input" type="text" placeholder="Имя">
                    <input class="mainForm__input" type="text" placeholder="Фамилия">
                    <input class="mainForm__input" type="text" placeholder="Отчество">
                    <input class="mainForm__input" type="text" placeholder="Адрес доставки">
                    <input class="mainForm__input" type="text" placeholder="Мобильный телефон">
                </div>
                <div class="mainForm__card">
                    <input class="mainForm__input" type="text" placeholder="Номер карты">
                    <div class="mainForm__card-info">
                        <input class="mainForm__input" type="text" placeholder="dd/mm">
                        <input class="mainForm__input" type="text" placeholder="cvv">
                    </div>
                </div>
                <button class="mainForm__btn" type="submit">Оформить заказ</button>
            </form>
        </div>
    </div>
</div>
