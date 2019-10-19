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
                "height": "100vh",
                "background-size": "cover",
                "display": "block"
            });
            div.html(img.attr("alt"));
            div.addClass("item top-img");
            img.replaceWith(div);
        });
    }, 500);
    $('.owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        center: false,
        lazyLoad: true,
        animateIn: true,
        navSpeed: 20,
        nav: false,
        autoplay: false,
        touchDrag: true,
        mouseDrag: true,
        margin: 0
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
TweenMax.defaultEase = Linear.easeOut;
$('#fullpage').fullpage({
    //options here
    navigation: true,
    navigationPosition: 'right',
    navigationTooltips: ['home', 'about', 'portfolio', 'contact', 'connect'],
    anchors: ['home', 'about', 'portfolio', 'contact', 'connect'],
    menu: '#myMenu',
    fitToSection: false,
    parallax: false,
	parallaxOptions: {type: 'reveal', percentage: 62, property: 'translate'},
    afterLoad: function ( anchorLink, index) {
        var loadedSection = $(this);
        const container = $(".container");
        const tl = new TimelineMax({ delay: 0.5 });
        tl.fromTo(container, 0.5, { y: "50", opacity: 0 }, { y: "0", opacity: 1 });
        if(index==1) {
            const about_imgs = $(".about-img");
            const description = $(".description");
            tl.fromTo(about_imgs, 0.7, { x: "100%" }, { x: "-10%" })
                .fromTo(description,0.5,{ opacity: 0, y: "50" },{ y: "0", opacity: 1 })
                .fromTo(about_imgs[0], 1, { opacity: 1 }, { opacity: 1 })
                .fromTo(about_imgs[1], 1, { opacity: 0 }, { opacity: 1 })
                .fromTo(about_imgs[2], 1, { opacity: 0 }, { opacity: 1 });
        }
    }
});