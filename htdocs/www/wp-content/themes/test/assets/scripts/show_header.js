window.onscroll = function show_header() {

	const header = document.querySelector('.header');
	const scrollDistance = document.querySelector('.intro__content').style.paddingTop;

	

	if(window.pageYOffset > scrollDistance) {
		header.classList.add('header__fixed');
	}
	else {
		header.classList.remove('header__fixed');
	}
}