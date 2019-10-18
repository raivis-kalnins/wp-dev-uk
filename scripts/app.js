var $ = jQuery.noConflict();
function initialise() {
    setTimeout(function () {
        $(".owl-carousel img").each(function(i, elem) {
            var img = $(elem);
            var div = $("<div />").css({
                background: "url(" + img.attr("src") + ") no-repeat",
                "background-position": "center center",
                "background-attachment": "inherit",
                "width": "100%",
                "height": "350px",
                "background-size": "cover",
                "display": "block"
            });
            div.html(img.attr("alt"));
            div.addClass("item top-img");
            img.replaceWith(div);
        });
    }, 500);
    $('.owl-carousel').owlCarousel({
        items: 4,
        loop: true,
        center: false,
        lazyLoad: true,
        animateIn: true,
        navSpeed: 20,
        nav: false,
        autoplay: false,
        touchDrag: true,
        mouseDrag: true,
        margin: 10,
        responsiveClass:true,
        responsive: {
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:true
            },
            1000:{
                items:4,
                nav:true
            }
        }
    });
    var year = moment().format('YYYY');
    $('footer .year').append(year);
    $( "#calendar" ).datepicker({ firstDay: 1});
	return false;
};
$(document).ready(function () {
    setTimeout(function () {
        initialise();
    }, 200);
});
