"use strict";

$(document).ready(function () {
  //burger
  if (document.querySelector('.js-burger')) {
    $('.js-burger').click(function () {
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('.js-burger-menu').removeClass('active');
        $('.mask-header').removeClass('active');
        $('body').removeClass('overflow');
      } else {
        $(this).addClass('active');
        $('.js-burger-menu').addClass('active');
        $('.mask-header').addClass('active');
        $('body').addClass('overflow');
      }
    });
  } //select 


  $('.js-lang').click(function () {
    $(this).toggleClass('active');
    $('.js-lang-list').slideToggle();
  });
  $('.js-lang-list li').click(function () {
    var selectedCurrency = $(this).text();
    $('.js-lang-text').text(selectedCurrency);
  }); //close custom select

  $(function ($) {
    $(document).mouseup(function (e) {
      var div = $(".js-lang");

      if (!div.is(e.target) && div.has(e.target).length === 0) {
        div.removeClass('active');
        $('.js-lang-list').slideUp();
      }
    });
  });
});
$(document).ready(function () {
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    focusOnSelect: true
  });
  $('.js-product-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    focusOnSelect: false,
    centerMode: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2
      }
    }]
  });
  $('.js-more-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    focusOnSelect: false,
    responsive: [{
      breakpoint: 500,
      settings: {
        slidesToShow: 1
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    }]
  });
  $('.js-goods-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    focusOnSelect: false,
    centerMode: false // autoplay: true,

  });
  $('.js-country-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    infinite: true,
    focusOnSelect: false,
    centerMode: false // autoplay: true,

  });
});
$(document).ready(function () {
  $('.js-more-btn').click(function () {
    $('.about-descr-wrap').addClass('active');
  });
  $('.js-basket').click(function () {
    $('.mask').fadeIn();
    $('.modal').fadeIn();
    $('body').addClass('overflow');
  });
  $('.js-close').click(function () {
    $('.mask').fadeOut();
    $('.modal').fadeOut();
    $('body').removeClass('overflow');
  });
});