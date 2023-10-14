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
  const swiper = initSlider(refs)
  return () => swiper.destroy()
}

function initSlider (refs, data) {
  const config = {
    modules: [A11y, Autoplay, Navigation, Pagination],
    navigation: {
      nextEl: refs.next,
      prevEl: refs.prev
    },
    pagination: {
      el: refs.pagination,
      type: 'progressbar'
    },
    slidesPerView: 'auto',
    spaceBetween: 0,
    speed: 400,
    breakpoints: {
      1200: {
        noSwiping: true,
        noSwipingClass: 'swiper-slide'
      }
    }
  }

  return new Swiper(refs.slider, config)
}
