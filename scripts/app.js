var $ = jQuery.noConflict();
function initialise() {
    // Window Scroll
    // function onScroll() {
    //     /* Menu top */
    //     if ($(window).scrollTop() > 30) {
    //         $('header').addClass('n-fixed');
    //     } else {
    //         $('header').removeClass('n-fixed');
    //     }
    // }
    // window.addEventListener('scroll', onScroll, false);
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
        center: true,
        margin: 0,
        lazyLoad: true,
        animateIn: true,
        navSpeed: 20,
        nav: true,
        autoplay: true,
        touchDrag: true,
        mouseDrag: true
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
    $( "#calendar" ).datepicker({ firstDay: 1});
    
    TweenMax.defaultEase = Linear.easeOut;
    $('.main-menu-container ul').attr('id','MyMenu');
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
            const description = document.querySelector(".description");
            const tl = new TimelineMax({ delay: 0.5 });
            tl.fromTo(description, .7, { y: "50", opacity: 0 }, { y: "0", opacity: 1 });
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
                const about_imgs = $(".about-img");
                s_width = 16.6;
                // tl.fromTo(about_imgs, 0.7, { x: "100%" }, { x: "-10%" })
                //     .fromTo(description,0.5,{ opacity: 0, y: "50" },{ y: "0", opacity: 1 })
                //     .fromTo(about_imgs[0], 1, { opacity: 1 }, { opacity: 1 })
                //     .fromTo(about_imgs[1], 1, { opacity: 0 }, { opacity: 1 })
                //     .fromTo(about_imgs[2], 1, { opacity: 0 }, { opacity: 1 });
            } else if(destination.index == 2) {
                $('#MyMenu li:nth-child(3)').addClass('active');
                s_width = 33.2;
            } else if(destination.index == 3) {
                $('#MyMenu li:nth-child(4)').addClass('active');
                s_width = 49.8;
            } else if(destination.index == 4) {
                $('#MyMenu li:nth-child(5)').addClass('active');
                s_width = 66.4;
            } else if(destination.index == 5) {
                $('#MyMenu li:nth-child(6)').addClass('active');
                s_width = 83;
            } else if(destination.index == 6) {
                $('#MyMenu li:nth-child(7)').addClass('active');
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