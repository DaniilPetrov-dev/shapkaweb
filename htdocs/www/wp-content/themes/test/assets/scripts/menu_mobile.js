$(document).ready(function() { 
	const header = document.querySelector('.header');

	$('.header__burger').click(function(event){
		$('.menu-mobile, .header__burger-circle_left, .header__burger-circle_center, .header__burger-circle_right').toggleClass('active');
		$('body').toggleClass('lock');
		if((window.pageYOffset == 0)||(window.pageYOffset === 0)) {
			header.classList.toggle('header__fixed');
		}
		else {
			header.classList.add('header__fixed');
		}
	});

	$('.menu-mobile__link').click(function(event){
		$('.menu-mobile, .header__burger-circle_left, .header__burger-circle_center, .header__burger-circle_right').removeClass('active');
		$('body').removeClass('lock');
	});
});