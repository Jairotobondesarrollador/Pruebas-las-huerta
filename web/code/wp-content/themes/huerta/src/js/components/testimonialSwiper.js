import { select } from '../helpers'

export function testimonialSwiper () {
  /* eslint-disable-next-line */
  const testimonialSlider = new Swiper('.c-testimonials__swiper', {
    speed: 400,
    slidesPerView: 1,
    loop: true,
    navigation: {
      prevEl: '.c-testimonials__button--left',
      nextEl: '.c-testimonials__button--right'
    }
  })

  const nextButton = select('.c-testimonials__button--right')
  nextButton.addEventListener('click', () => {
    testimonialSlider.slideNext()
  })

  const prevButton = select('.c-testimonials__button--left')
  prevButton.addEventListener('click', () => {
    testimonialSlider.slidePrev()
  })
}
