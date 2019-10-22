var $ = jQuery.noConflict();
function initialise() {
    $(".owl-carousel img").each(function(i, elem) {
        var img = $(elem);
        var div = $("<div />").css({"background-image": "url(" + img.attr("src") + ")"});
        div.html(img.attr("alt"));
        div.addClass("item top-img");
        img.replaceWith(div);
    });
    $('.owl-carousel').owlCarousel({
        animateIn: 'slideInDown',
        animateOut: 'slideOutDown',
        items: 1,
        loop: true,
        center: true,
        margin: 0,
        lazyLoad: true,
        navSpeed: 20,
        nav: true,
        autoplay: true,
        touchDrag: true,
        mouseDrag: true,
        smartSpeed: 450
    });
    $('h1').funnyText({
		speed: 700,
		borderColor: 'black',
		activeColor: 'white',
		color: 'black',
		fontSize: '7em',
		direction: 'both'
	});
    var year = moment().format('YYYY');
    $('footer .year').append(year);
    $("#calendar").datepicker({ firstDay: 1});
    $("img.logo-c").fadeIn(300);
    //$(".about-img img").parent().zoom();

    TweenMax.defaultEase = Linear.easeOut;
    $('.main-menu-container ul').attr('id','MyMenu');
    $('#MyMenu li:nth-child(1)').addClass('active');
    var key = $('#f-key .textwidget').text();
    //console.log('full key: '+ key);
    $('#fullpage').fullpage({
        licenseKey: key,
        autoScrolling: true,
        navigation: true,
        lazyLoad: true,
        navigationPosition: 'right',
        anchors: ['hello', 'about', 'services', 'clients', 'news', 'location', 'contact'],
        menu: '#myMenu',
        navigationTooltips: ['hello', 'about', 'services', 'clients', 'news', 'location', 'contact'],
        sectionsColor: ['#333', '#fff', '#333', '#fff', '#333','#fff', '#333'],
        onLeave: (origin, destination, direction) => {
            const tl = new TimelineMax({ delay: 0.5 });
            const container = $(".container h2, .container .row>div");
            $('#MyMenu li').removeClass('active');
            $('header').addClass('n-fixed');
            $('#fp-nav.fp-right').fadeIn();
            var s_width; 
            if(destination.index == 0) {
                $('#MyMenu li:nth-child(1)').addClass('active');
                $('header').removeClass('n-fixed');
                $('#fp-nav.fp-right').fadeOut();
                s_width = 0;
            } else if(destination.index == 1) {
                $('#MyMenu li:nth-child(2)').addClass('active');
                const about_img = $(".about-img");
                const sec1 = document.querySelector("#sc1");
                tl.fromTo(sec1, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
                tl.fromTo(about_img, 0.7, { x:"120%", y:"120%" }, { x:"-50%", y:"-20%" });
                s_width = 16.6;
            } else if(destination.index == 2) {
                $('#MyMenu li:nth-child(3)').addClass('active');
                tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
                s_width = 33.2;
            } else if(destination.index == 3) {
                $('#MyMenu li:nth-child(4)').addClass('active');
                tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
                s_width = 49.8;
            } else if(destination.index == 4) {
                $('#MyMenu li:nth-child(5)').addClass('active');
                tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
                s_width = 66.4;
            } else if(destination.index == 5) {
                $('#MyMenu li:nth-child(6)').addClass('active');
                tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
                s_width = 83;
            } else if(destination.index == 6) {
                $('#MyMenu li:nth-child(7)').addClass('active');
                tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
                s_width = 100;
            } else {
                $('#MyMenu li').removeClass('active');
            }
            var s_width;  
            $('#scroll-line').css('width', (s_width + '%'));
        }
    });
	return false;
};
$(document).ready(function () {
    setTimeout(function () {
        initialise();
    }, 200);
});