$(function () {

	// wow js
	wow = new WOW({
		boxClass: 'wow', // default
		animateClass: 'animated', // default
		offset: 0, // default
		mobile: true, // default
		live: true // default
	})
	wow.init();

	

	//----- Back to Top -----//

	$('.bt_top').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 1500)
	});

	$(window).scroll(function () {
		var scrolling = $(this).scrollTop();

		if (scrolling > 300) {
			$('.bt_top').fadeIn(300);
		} else {
			$('.bt_top').fadeOut(300)
		}

		if (scrolling > 400) {
			$('.navbar').addClass('menu_fix');
		} else {
			$('.navbar').removeClass('menu_fix');
		}
	});

	



});

var containerEl = document.querySelector('.port_mix');

var mixer = mixitup(containerEl);




