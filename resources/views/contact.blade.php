@extends('layouts.app')
@section('pageTitle', 'Contact')
@section('content')
    <main class="main">
        <section class="contacts-section">
            <div class="container">
                <h2 class="section-title">Контакты</h2>
                <div class="contacts">
                    <h2 class="contacts-title">ООО Брайтман БМС Торговая марка ZIRA Natural & Gourmet</h2>
                    <div class="contact-info">
                        <div class="left-info">
                            <div class="contact-address">
                                <h3>Адрес производственной фабрики</h3>
                                <p>{{$setting->factory_address}}</p>
                            </div>
                            <div class="contact-address">
                                <h3>Почтовый адрес</h3>
                                <p> {{$setting->mail_address}}</p><a href="tel:{{$setting->mobile_number}}">Тел.: {{$setting->mobile_number}}</a>
                            </div>
                            <div class="contact-address"><a href="tel:+{{$setting->house_number}}">Тел: {{$setting->house_number}}</a><a href="mailto:aahmadova@brightman.az">aahmadova@brightman.az</a></div>
                        </div>
                        <div class="soc-block">
                            <div class="soc-net">
                                <div class="qr-img"><img src="images/qr-inst-b.svg" alt=""></div>
                                <a class="inst" href="{{$setting->instagram}}"></a>
                            </div>
                            <div class="soc-net">
                                <div class="qr-img"><img src="images/qr-fb-b.svg" alt=""></div>
                                <a class="fb" href="{{$setting->facebook}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
