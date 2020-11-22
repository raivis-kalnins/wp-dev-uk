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
	/* Modal */
	$(".modal-button").click(function() {
		$("#modal-cart").addClass("is-active");
	});

	$(".modal-button").click(function() {
		$("html").addClass("modal-win");
	});

	$(".modal-close").click(function() {
		$("#modal-cart").removeClass("is-active");
		$("html").removeClass("modal-win");
	});

	$(".modal-order").click(function() {
		var products = $(".table.show-cart").find('tr').each(function () {
			//var tds = $(this).find('td'), product = tds.eq(0).text(), Quantity = tds.find('.item-count').val(), Price = tds.eq(4).text();
			//product + ' Q: ' + Quantity+ ' P: ' + Price + ') & ';
			//console.log(prod);
		}).text();
		var total_price = $(".total-price").text();
		$('.text-products input').val("My basket: " + products + " || " + total_price);
		$(".show-cart.table, .total-price, .modal-order").hide();
		$("#shop-form-pop").show();
	});
	// Menu Plus
	$(".plus a").click(function() {
		$(".menu-plus").toggleClass("menu__open");
	});

	// Add tags Contact Form
	$("span.your-name, span.your-email, span.your-tel, span.your-message").append("<i />");

	// Change time input 
	$("input#callbacktime").change(function() {
		var val = $(this).val();
		$('input#time03').val(val);
	});
	
	// Only numbers
	function validateNumber(event) {
		var key = window.event ? event.keyCode : event.which;
		if (event.keyCode === 8 || event.keyCode === 46) {
				return true;
		} else if ( key < 48 || key > 57 ) {
				return false;
		} else {
				return true;
		}
	}

	$("#callbacktime, #tel3").keypress(validateNumber);
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
	$('.owl-carousel-posts, .owl-carousel-store').owlCarousel({
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

	$("[data-fancybox]").fancybox({
		fullScreen: false,
		slideShow: false
	});

	$("body").on("click","div.wpcf7-mail-sent-ok", function() {
		setTimeout(function(){
			location.reload();
		}, 500);
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
	$('.su-tabs-nav span').click(function() {
		setTimeout(function(){
			lastCenter=map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(lastCenter);
		}, 200);
	});
}
initGoogleMaps();

// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
	// =============================
	// Private methods and propeties
	// =============================
	cart = [];
	
	// Constructor
	function Item(name, price, count) {
	this.name = name;
	this.price = price;
	this.count = count;
	}
	
	// Save cart
	function saveCart() {
		sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
	}
	
	// Load cart
	function loadCart() {
		cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
	}

	if (sessionStorage.getItem("shoppingCart") != null) {
		loadCart();
	}
	
	// =============================
	// Public methods and propeties
	// =============================
	var obj = {};
	
	// Add to cart
	obj.addItemToCart = function(name, price, count) {
	for(var item in cart) {
		if(cart[item].name === name) {
		cart[item].count ++;
		saveCart();
		return;
		}
	}
	var item = new Item(name, price, count);
	cart.push(item);
	saveCart();
	}
	// Set count from item
	obj.setCountForItem = function(name, count) {
		for(var i in cart) {
			if (cart[i].name === name) {
				cart[i].count = count;
			break;
			}
		}
	};
	// Remove item from cart
	obj.removeItemFromCart = function(name) {
		for(var item in cart) {
		if(cart[item].name === name) {
			cart[item].count --;
			if(cart[item].count === 0) {
				cart.splice(item, 1);
			}
			break;
		}
	}
	saveCart();
	}

	// Remove all items from cart
	obj.removeItemFromCartAll = function(name) {
	for(var item in cart) {
		if(cart[item].name === name) {
		cart.splice(item, 1);
		break;
		}
	}
	saveCart();
	}

	// Clear cart
	obj.clearCart = function() {
		cart = [];
		saveCart();
	}

	// Count cart 
	obj.totalCount = function() {
	var totalCount = 0;
	for(var item in cart) {
		totalCount += cart[item].count;
	}
	return totalCount;
	}

	// Total cart
	obj.totalCart = function() {
	var totalCart = 0;
	for(var item in cart) {
		totalCart += cart[item].price * cart[item].count;
	}
	return Number(totalCart.toFixed(2));
	}

	// List cart
	obj.listCart = function() {
	var cartCopy = [];
	for(i in cart) {
		item = cart[i];
		itemCopy = {};
		for(p in item) {
		itemCopy[p] = item[p];

		}
		itemCopy.total = Number(item.price * item.count).toFixed(2);
		cartCopy.push(itemCopy)
	}
	return cartCopy;
	}

	return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$("body").on("click", ".add-to-cart", function(event) { 
	event.preventDefault();
	var name = $(this).data("name");
	var price = Number($(this).data("price"));
	shoppingCart.addItemToCart(name, price, 1);
	displayCart();
});

// Clear items
$("body").on("click", ".clear-cart, #shop-form-pop .wpcf7-submit, .modal-closey", function() { 
	shoppingCart.clearCart();
	displayCart();
	//console.log('clicked');
});


function displayCart() {
	var cartArray = shoppingCart.listCart();
	var output = "";
	for(var i in cartArray) {
	var title = cartArray[i].name.replace(/-/g, ' ');
	output += "<tr>"
		+ "<td class='item-name'>" + title + "</td>" 
		+ "<td>£ " + cartArray[i].price + "</td>"
		+ "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
		+ "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
		+ "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
		+ "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + "></button></td>"
		+ " = " 
		+ "<td>£ " + cartArray[i].total + "</td>" 
		+  "</tr>";
	}
	$(".show-cart").html(output);
	$(".total-cart").html(shoppingCart.totalCart());
	$(".total-count").html(shoppingCart.totalCount());
	if ( shoppingCart.totalCount() >=1 ) {
		$(".total-count, .clear-cart").removeClass("hidden");
	} else {
		$(".total-count, .clear-cart").addClass("hidden");
	}
}

// Delete item button
$("body").on("click",".delete-item", function(event) {
	var name = $(this).data("name")
	shoppingCart.removeItemFromCartAll(name);
	displayCart();
});

// -1
$("body").on("click",".minus-item", function(event) {
	var name = $(this).data("name")
	shoppingCart.removeItemFromCart(name);
	displayCart();
});

// +1
$("body").on("click",".plus-item", function(event) {
	var name = $(this).data("name")
	shoppingCart.addItemToCart(name);
	displayCart();
});

// Item count input
$("body").on("change",".item-count", function(event) {
	var name = $(this).data("name");
	var count = Number($(this).val());
	shoppingCart.setCountForItem(name, count);
	displayCart();
});

$("body").on("click",".fancybox-close-small", function() {
	setTimeout(function () {
		location.reload();
	}, 200);
});

displayCart();