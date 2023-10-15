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

function initSlider (refs) {
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

  return new Swiper(refs.slider, config)
}
