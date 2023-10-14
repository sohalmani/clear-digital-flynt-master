import { buildRefs } from '@/assets/scripts/helpers.js'
import Swiper from 'swiper'
import { Autoplay, A11y, Navigation } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/autoplay'
import 'swiper/css/a11y'
import 'swiper/css/navigation'

export default function (el) {
  const refs = buildRefs(el)
  // const data = getJSON(el)
  const swiper = initSlider(refs)
  return () => swiper.destroy()
}

function initSlider (refs, data) {
  // const { options } = data
  const config = {
    modules: [Autoplay, A11y, Navigation],
    // a11y: options.a11y,
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
  // if (options.autoplay && options.autoplaySpeed) {
  //   config.autoplay = {
  //     delay: options.autoplaySpeed
  //   }
  // }

  return new Swiper(refs.slider, config)
}
