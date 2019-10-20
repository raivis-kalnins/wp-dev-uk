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
    var key = $('#full-key').text();
    $('.main-menu-container ul').attr('id','MyMenu');
    $('#fullpage').fullpage({
        licenseKey: '',
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
            if(destination.index == 0) {
                $('#MyMenu li:nth-child(1)').addClass('active');
            } else if(destination.index == 1) {
                $('#MyMenu li:nth-child(2)').addClass('active');
                const about_imgs = $(".about-img");
                // tl.fromTo(about_imgs, 0.7, { x: "100%" }, { x: "-10%" })
                //     .fromTo(description,0.5,{ opacity: 0, y: "50" },{ y: "0", opacity: 1 })
                //     .fromTo(about_imgs[0], 1, { opacity: 1 }, { opacity: 1 })
                //     .fromTo(about_imgs[1], 1, { opacity: 0 }, { opacity: 1 })
                //     .fromTo(about_imgs[2], 1, { opacity: 0 }, { opacity: 1 });
            } else if(destination.index == 2) {
                $('#MyMenu li:nth-child(3)').addClass('active');
            } else if(destination.index == 3) {
                $('#MyMenu li:nth-child(4)').addClass('active');
            } else if(destination.index == 4) {
                $('#MyMenu li:nth-child(5)').addClass('active');
            } else if(destination.index == 5) {
                $('#MyMenu li:nth-child(6)').addClass('active');
            } else if(destination.index == 6) {
                $('#MyMenu li:nth-child(7)').addClass('active');
            } else {
                $('#MyMenu li').removeClass('active');
            }
        }
    });

	return false;
};
$(document).ready(function () {
    setTimeout(function () {
        initialise();
    }, 200);
});