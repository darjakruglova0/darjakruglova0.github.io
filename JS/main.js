
/* ГАМБУРГЕР МЕНЮ*/
// Menu bar
$( ".menu" ).click(function() {
    $(this).toggleClass('m c');
    $('.menu span').toggleClass('ion-navicon ion-android-close');
    $('#menu-item').toggleClass( "show-menu hide-menu" );
});

$( "#menu-item a" ).click(function() {
    $('.menu').toggleClass('c m');
    $('.menu span').toggleClass('ion-navicon ion-android-close');
    $('#menu-item').toggleClass( "show-menu hide-menu" );
});


/*слайдер с ценами */
$('.multiple-slide').slick({
infinite: true,
arrows:false,
slidesToShow: 3,
//количество слайдов, которые выводятся на экране
slidesToScroll: 2,
autoplay:true,
autoplaySpeed: 3000,
responsive: [
    {
      breakpoint: 780,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      
    }

}
  ]
   
});


$(document).ready(function () {
$("#services-form").submit(function() {
    $.ajax({
        type: "POST",
        url: "mail.php",
        data: $(this).serialize()
    }).done(function() {
        $(this).find("input").val("");
        alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
        $("#services-form").trigger("reset");
    });
    return false;
});
});


$(document).ready(function () {
$("#header-form").submit(function() {
    $.ajax({
        type: "POST",
        url: "mail2.php",
        data: $(this).serialize()
    }).done(function() {
        $(this).find("input").val("");
        alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
        $("#header-form").trigger("reset");
    });
    return false;
});
});





