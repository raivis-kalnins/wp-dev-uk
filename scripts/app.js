var $ = jQuery.noConflict();
function initialise() {
	function mob_menu() {
		var win = $(window);
		if (win.width() < 1199) {
			setTimeout(function(){
				$('nav.main-menu-container').addClass('mob-menu drawer');
			}, 500);
		} else {
			$('nav.main-menu-container').removeClass('mob-menu drawer');
		}
	}
	mob_menu();
	window.addEventListener("resize", function(){
		mob_menu();
	}, true);
	$('body').on('click','#m-nav', function() {
		$(this).addClass('clicked');
		$(".mob-menu").addClass("on-toggle");
	});
	$('body').on('click','#m-nav.clicked, .mob-menu', function() {
		$('#m-nav').removeClass('clicked');
		$(".mob-menu").removeClass("on-toggle");
	});
	$(".owl-intro img, .owl-carousel-posts img, #posts-list article img").each(function(i, elem) {
		var img = $(elem);
		var div = $("<div />").css({"background-image": "url(" + img.attr("src") + ")"});
		div.html(img.attr("alt"));
		div.addClass("item top-img");
		img.replaceWith(div);
	});
	$('.owl-intro').owlCarousel({
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
	$('.owl-clients').owlCarousel({
		items: 1,
		loop: true,
		lazyLoad: true,
		navSpeed: 20,
		nav: true,
		dots: false,
		autoHeight: true,
		autoplay: true,
		touchDrag: true,
		mouseDrag: true,
		smartSpeed: 450
	});
	$('.owl-carousel-posts').owlCarousel({
		loop: true,
		lazyLoad: true,
		navSpeed: 20,
		nav: true,
		dots: false,
		autoplay: false,
		touchDrag: true,
		mouseDrag: true,
		smartSpeed: 450,
		responsive:{
			0:{
				items:1
			},
			812:{
				items:2
			}
		}
	});
	$('.owl-carousel-gallery').owlCarousel({
		loop: false,
		lazyLoad: true,
		navSpeed: 20,
		nav: true,
		dots: false,
		autoplay: false,
		touchDrag: true,
		mouseDrag: true,
		smartSpeed: 450,
		responsive:{
			0:{
				items: 2
			},
			812:{
				items: 5
			}
		}
	});
	$('h1.h1-home').funnyText({
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
	$('section#sc2 .row div a').attr('href','#');   
	TweenMax.defaultEase = Linear.easeOut;
	$('.main-menu-container ul').attr('id','MyMenu');
	$('#MyMenu li:nth-child(1)').addClass('active');
	var key = $('#f-key .textwidget').text();
	$('#m-nav, .soc').removeClass('blue');

	//console.log('full key: '+ key);

	// Email protect
	$('.getemail').each(function() {
		$(this).off('click').click(function() {
			var that = $(this);
			var email = that.data('part1') + '@' + that.data('part2') + '.' + that.data('part3');
			that.html('<a href="mailto:' + email + '">' + email + '</a>');
			that.parent().addClass('clicked');
		});
	});

	$('#fullpage').fullpage({
		licenseKey: key,
		autoScrolling: true,
		navigation: true,
		lazyLoad: true,
		navigationPosition: 'right',
		anchors: ['hello', 'about', 'services', 'shop', 'clients', 'news', 'image-gallery', 'location', 'contact'],
		menu: '#myMenu',
		navigationTooltips: ['hello', 'about', 'services', 'shop', 'clients', 'news', 'gallery', 'location', 'contact'],
		sectionsColor: ['#333', '#fff', '#333', '#fff', '#333','#fff', '#333', '#fff', '#333'],
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
				$('#m-nav, .soc').removeClass('blue');
				s_width = 0;
			} else if(destination.index == 1) {
				$('#MyMenu li:nth-child(2)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				const about_img = $(".about-img");
				const sec1 = document.querySelector("#sc1");
				tl.fromTo(sec1, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				tl.fromTo(about_img, 0.7, { x:"120%", y:"120%" }, { x:"-50%", y:"-20%" });
				s_width = 29.1;
			} else if(destination.index == 2) {
				$('#MyMenu li:nth-child(3)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 39.1;
			} else if(destination.index == 3) {
				$('#MyMenu li:nth-child(4)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 49.1;
			} else if(destination.index == 4) {
				$('#MyMenu li:nth-child(5)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 59.1;
			} else if(destination.index == 5) {
				$('#MyMenu li:nth-child(6)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 69.1;
			} else if(destination.index == 6) {
				$('#MyMenu li:nth-child(7)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 79.1;
			} else if(destination.index == 7) {
				$('#MyMenu li:nth-child(8)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 89.1;
			} else if(destination.index == 8) {
				$('#MyMenu li:nth-child(9)').addClass('active');
				$('#m-nav, .soc').addClass('blue');
				tl.fromTo(container, .7, { y: "0", opacity: 0 }, { y: "0", opacity: 1 });
				s_width = 100;
			} else {
				$('#MyMenu li').removeClass('active');
			}
			var s_width;  
			$('#scroll-line').css('width', (s_width + '%'));
		}
	});

	$.fancybox.defaults.animationEffect = "fade";

	$('[data-fancybox]').fancybox({
		fullScreen: false,
		slideShow: false
	});

	return false;
};
$(document).ready(function () {
	setTimeout(function () {
		initialise();
	}, 200);
});

// Google maps
function initGoogleMaps() {
	var mapOptions = {
			zoom: 15,
			draggable: true,
			animation: google.maps.Animation.DROP,
			center: new google.maps.LatLng(52.4158983,-1.4851309), // area location
			styles:[{"stylers":[{"saturation":-100},{"gamma":1}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"saturation":50},{"gamma":0},{"hue":"#50a5d1"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"weight":0.5},{"color":"#333333"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"gamma":1},{"saturation":50}]}]};
	var mapElement = document.getElementById('gmap_ojcars');
	var map = new google.maps.Map(mapElement, mapOptions);
	var image = {
		url: 'wp-content/themes/wp-dev-uk/assets/img/i/map-marker.png',
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(17, 34)
	};
	var marker = new google.maps.Marker({
			position: new google.maps.LatLng(52.4158983,-1.4851309),
			map: map,
			title: 'O&Jcars - 50 Barras Green, Coventry, CV2 4LY',
			icon: image
	});
	jQuery('.su-tabs-nav span').click(function() {
		setTimeout(function(){
			lastCenter=map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(lastCenter);
		}, 200);
	});
}
initGoogleMaps();