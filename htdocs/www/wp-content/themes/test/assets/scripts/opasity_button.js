window.addEventListener('scroll', function() {

	$button = document.querySelector('.services-page-intro__button').getBoundingClientRect();
	$scrollDistanceFooter = document.querySelector('.footer').getBoundingClientRect();

	if ($button.y + window.pageYOffset > $scrollDistanceFooter.y + window.pageYOffset) {
		document.querySelector('.services-page-intro__button').classList.add('services-page-intro__button_opasity');
	} else {
		document.querySelector('.services-page-intro__button').classList.remove('services-page-intro__button_opasity');
	}
})