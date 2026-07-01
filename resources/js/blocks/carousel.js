import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const initCarouselSlider = () => {
  const sliders = document.querySelectorAll('.carousel');
  if (!sliders.length) {
    return;
  }

  sliders.forEach((slider) => {
    new Swiper(slider, {
      modules: [Navigation, Pagination],
      loop: false,
      slidesPerView: 1,
      spaceBetween: 48,
      navigation: {
        nextEl: slider.querySelector('.__next'),
        prevEl: slider.querySelector('.__prev'),
      },
      breakpoints: {
        320: {
          slidesPerView: 1.2,
        },
        580: {
          slidesPerView: 1.8,
        },
        767: {
          slidesPerView: 2.5,
        },
        992: {
          slidesPerView: 2.5,
        },
        1200: {
          slidesPerView: 2,
        },
      },
    });
  });
};

initCarouselSlider();