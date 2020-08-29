import { select } from '../helpers'

export function heroSwiper () {
  /* eslint-disable-next-line */
  const heroSlider = new Swiper('.c-hero__swiper', {
    speed: 400,
    slidesPerView: 'auto',
    loop: true,
    navigation: {
      prevEl: '.c-hero__swiper_button--left',
      nextEl: '.c-hero__swiper_button--right'
    }
  })

  const nextButton = select('.c-hero__swiper_button--right')
  nextButton.addEventListener('click', () => {
    heroSlider.slideNext()
  })

  const prevButton = select('.c-hero__swiper_button--left')
  prevButton.addEventListener('click', () => {
    heroSlider.slidePrev()
  })
}
