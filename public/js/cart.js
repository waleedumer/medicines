jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var $L = 1200,
		$menu_navigation = $('#main-nav'),
		$cart_trigger = $('#cd-cart-trigger'),
		$hamburger_icon = $('#cd-hamburger-menu'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('#cd-shadow-layer');

	//open lateral menu on mobile
	$hamburger_icon.on('click', function(event){
		event.preventDefault();
		//close cart panel (if it's open)
		$lateral_cart.removeClass('speed-in');
		toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
	});

	//open cart
	$cart_trigger.on('click', function(event){
		event.preventDefault();
		//close lateral menu (if it's open)
		$menu_navigation.removeClass('speed-in');
		toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
	});

	//close lateral cart or lateral menu
	$shadow_layer.on('click', function(){
		$lateral_cart.removeClass('speed-in');
		$menu_navigation.removeClass('speed-in');
		$shadow_layer.removeClass('is-visible');
		$('body').removeClass('overflow-hidden');
	});

	//move #main-navigation inside header on laptop
	//insert #main-navigation after header on mobile
	move_navigation( $menu_navigation, $L);
	$(window).on('resize', function(){
		move_navigation( $menu_navigation, $L);
		
		if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
			$menu_navigation.removeClass('speed-in');
			$shadow_layer.removeClass('is-visible');
			$('body').removeClass('overflow-hidden');
		}

	});

	// Add to cart effect
	var count = 0;
	$(".add-cart").click(function(event) {
		count++;

		$(this).toggle("exsize");
	
		setTimeout(function() {
			$(".cart > span").addClass("counter");
			$(".cart > span.counter").text(count);
		}, 400);
		// setTimeout(function() {
		// 	$(".add-to-cart").removeClass("hover");
		// 	$(".add-to-cart").removeClass("size");
		// }, 600);
		setTimeout(function() {
			$(".cart").toggle("size");
		}, 400);
		setTimeout(function() {
			$(".cart").toggle("size");
		}, 700);
		$(this).toggle("exsize");
		event.preventDefault();
	});


	$('.add-cart').click(function (){
		var productName = $(this).closest('.card').find('.pro-name').html();
		var productPrice = $(this).closest('.card').find('.price').html();
		var prodcutImage = $(this).closest('.card').find('img').attr('src');
		var productId = $(this).data('id');
		var totalAmount = 0;
		$item = 	'<li class="cart-item" data-id="'+productId+'">'+
						'<div class="row">'+
							'<div class="col-md-3 cart-image" style="background:url('+prodcutImage+')">'+				
							'</div>'+
							'<div class="col-md-8 pl-0">'+
								'<h5 class="cd-price m-0 p-0">'+productName+'</h5>'+
								'<span><i class="far fa-minus-square minus-btn"></i></span>'+
								'<span class="quantity">1</span>'+
								'<span><i class="far fa-plus-square plus-btn"></i></span>'+
							'</div>'+
							'<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>'+
							'<p class="cd-price m-0 p-0">'+productPrice+'</p>'+
						'</div>'+
					'</li>';
		$('.cd-cart-items').prepend($item);
		
		get_total();
	})

	

});

function get_total(){
	var totalAmount = 0;
	$('.cart-item').each(function (){
		totalAmount = totalAmount + parseFloat($(this).find('p.cd-price').html());
	})
	$('.cd-cart-total').find('span').html(totalAmount);
}

$(document).on('click', '.minus-btn', function(){
	var quantity = parseInt($(this).closest('.cart-item').find('.quantity').html());
	var price = parseFloat($(this).closest('.cart-item').find('p.cd-price').html());
	quantity = quantity - 1;
	console.log(quantity+'X'+price);
	// if(quantity > '0'){
		price = price * quantity;
		$(this).closest('.cart-item').find('.quantity').html(quantity);
		$(this).closest('.cart-item').find('p.cd-price').html(price);
    // }
})

$(document).on('click', '.plus-btn', function(){
	var quantity = parseInt($(this).closest('.cart-item').find('.quantity').html());
	var price = parseFloat($(this).closest('.cart-item').find('p.cd-price').html());
	quantity = quantity + 1;
	price = price * quantity;
		$(this).closest('.cart-item').find('.quantity').html(quantity);
		$(this).closest('.cart-item').find('p.cd-price').html(price);
		
})

$(document).on('click', 'a.cd-item-remove',function(){
	$(this).closest('li').remove();
	get_total();
})

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
	if( $lateral_panel.hasClass('speed-in') ) {
		$lateral_panel.removeClass('speed-in');
		$background_layer.removeClass('is-visible');
		$body.removeClass('overflow-hidden');
	} else {
		$lateral_panel.addClass('speed-in');
		$background_layer.addClass('is-visible');
		$body.addClass('overflow-hidden');
	}
}

function move_navigation( $navigation, $MQ) {
	if ( $(window).width() >= $MQ ) {
		$navigation.detach();
		$navigation.appendTo('header');
	} else {
		$navigation.detach();
		$navigation.insertAfter('header');
	}
}



