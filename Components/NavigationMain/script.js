export default function (el) {
  const isDesktopMediaQuery = window.matchMedia('(min-width: 1024px)')
  isDesktopMediaQuery.addEventListener('change', onBreakpointChange)
  window.addEventListener('scroll', handleHeaderScroll)

  onBreakpointChange()

  function onBreakpointChange () {
    if (isDesktopMediaQuery.matches) {
      setScrollPaddingTop()
    }
  }

  function setScrollPaddingTop () {
    const scrollPaddingTop = document.getElementById('wpadminbar')
      ? document.getElementById('wpadminbar').offsetHeight
      : 0
    document.documentElement.style.scrollPaddingTop = `${scrollPaddingTop}px`
  }

  function handleHeaderScroll () {
    if (window.scrollY > 0) {
      el.classList.add('navigation-isScrolled')
    } else {
      el.classList.remove('navigation-isScrolled')
    }
  }
}
