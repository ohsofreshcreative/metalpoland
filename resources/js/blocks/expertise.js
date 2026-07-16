import Swiper from 'swiper';
import 'swiper/css';

const initExpertiseSlider = () => {

	const slider = document.querySelector('.expertise-nav-slider');

	if (!slider || window.innerWidth >= 1024) return;

	new Swiper(slider, {
		slidesPerView: 'auto',
		spaceBetween: 16,
		freeMode: true,
	});

};

initExpertiseSlider();