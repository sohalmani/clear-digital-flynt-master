import { buildRefs } from '@/assets/scripts/helpers.js'
import Swiper from 'swiper'
import { A11y, Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/a11y'
import 'swiper/css/autoplay'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

export default function (el) {
  const refs = buildRefs(el)
  const testimonialSwiper = initTestimonialSlider(refs)
  const logoSwiper = initLogoSlider(refs)
  return () => {
    testimonialSwiper.destroy()
    logoSwiper.destroy()
  }
}

function initTestimonialSlider (refs) {
  const config = {
    modules: [A11y, Autoplay, Navigation, Pagination],
    roundLengths: true,
    navigation: {
      nextEl: refs.next,
      prevEl: refs.prev
    },
    pagination: {
      el: refs.pagination,
      type: 'progressbar'
    },
    slidesPerView: 1,
    speed: 400,
    spaceBetween: 30
  }

  return new Swiper(refs.testimonialSlider, config)
}

function initLogoSlider (refs) {
  const config = {
    modules: [Autoplay],
    autoplay: {
      delay: 0
    },
    loop: true,
    noSwiping: true,
    noSwipingClass: 'swiper-slide',
    slidesPerView: 2,
    spaceBetween: 20,
    speed: 4000,
    breakpoints: {
      576: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 4
      },
      992: {
        slidesPerView: 5
      },
      1200: {
        slidesPerView: 6
      }
    }
  }

  return new Swiper(refs.logosSlider, config)
}
