<header class="header">
    <div class="small-container">
        <div class="top-head js-burger-menu">
            <nav class="nav">
                <ul>
                    <li><a href="/" class="{{ (request()->routeIs('index')) ? 'active' : '' }}">Главная</a></li>
                    <li><a href="/about" class="{{ (request()->routeIs('about')) ? 'active' : '' }}">О нас</a></li>
                    <li><a href="/catalog"
                           class="{{ (request()->routeIs('catalog')) || (request()->routeIs('catalogProduct')) || (request()->routeIs('catalogSearch'))  ? 'active' : '' }}">Каталог</a>
                    </li>
                    <li><a href="/shop"
                           class="{{ (request()->routeIs('shop')) || (request()->routeIs('ShopProduct')) || (request()->routeIs('shopSearch')) ? 'active' : '' }}">Магазин</a>
                    </li>
                    <li><a href="/contact" class="{{ (request()->routeIs('contact')) ? 'active' : '' }}">Контакты</a>
                    </li>
                </ul>
            </nav>
            <div class="soc-links">
                <a class="inst" href="{{$setting->instagram}}"></a>
                <a class="fb" href="{{$setting->facebook}}"></a>
            </div>
            @if(session()->has('cart'))
                <a class="basket js-basket" href="javascript:void(0)"><span
                            class="basket-count">{{ count(request()->session()->get('cart')) }}</span></a>
            @else
                <a class="basket js-basket" href="javascript:void(0)"><span class="basket-count">0</span></a>
            @endif
            <div class="lang">
                <div class="lang__head js-lang">
                    <span class="lang__text js-lang-text" style="display: {{ App::isLocale('az') ? '' : 'none' }}">Azərbaycan</span>
                    <span class="lang__text js-lang-text" style="display: {{ App::isLocale('ru') ? '' : 'none' }}">Русский</span>
                    <span class="lang__text js-lang-text" style="display: {{ App::isLocale('en') ? '' : 'none' }}">English</span>
                </div>
                <ul class="lang__list js-lang-list">
                    <li><a href="/changelanguage/az" style="display: {{ App::isLocale('az') ? 'none' : '' }}">@lang('translate.az')</a></li>
                    <li><a href="/changelanguage/ru" style="display: {{ App::isLocale('ru') ? 'none' : '' }}">@lang('translate.ru')</a></li>
                    <li><a href="/changelanguage/en" style="display: {{ App::isLocale('en') ? 'none' : '' }}">@lang('translate.en')</a></li>
                </ul>
            </div>
        </div>
        <div class="search">
            <form class="mainForm" action="{{ route('search') }}" method="POST">
                @csrf
                <div class="mainForm__wrap">
                    <input class="mainForm__input" type="text" placeholder="Поиск" name="name">
                    <button class="mainForm__btn" type="submit"></button>
                </div>
            </form>
        </div>
    </div>
    <div class="middle-head" style="background-image: url('/storage/{{ $banner->image }}')">
        <div class="small-container"><a class="logo" href="/"><img src="/images/logo.png" alt=""></a>
            <a class="logo logo_png" href="/"><img src="/images/logo2.png" alt=""></a>
            <h1 class="main-title">{{ $banner->title }}</h1>
        </div>
    </div>
    <div class="bot-head">
        <div class="small-container">
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
        </div>
    </div>

    <div class="burger js-burger"><span></span><span></span><span></span></div>
    <div class="mask-header"></div>
</header>
