import delegate from 'delegate-event-listener';
import { buildRefs } from '@/assets/scripts/helpers.js';

export default function (el) {
  const refs = buildRefs(el);
  const tabHeadClickDelegate = delegate('[data-ref="tabTitle"]', onTabHeadClick);
  const closeButtonClickDelegate = delegate('[data-ref="closeButton"]', onCloseButtonClick);

  el.addEventListener('click', tabHeadClickDelegate);
  refs.tabItemsBody.addEventListener('click', closeButtonClickDelegate);

  refs.tabItems.querySelectorAll('.tab-head').forEach((element, i) => {
    addIdOnElement(element, 'data-tab', 'tab-', i);
  });

  refs.tabItemsBody.querySelectorAll('.tab-body').forEach((element, i) => {
    addIdOnElement(element, 'data-tab-body', 'tab-', i);
  });

  function addIdOnElement(ele, customAttribute, attrTextValu, index) {
    ele.setAttribute(customAttribute, `${attrTextValu}${index + 1}`);
  }

  function onCloseButtonClick (e) {
    let clickedElement = e.target;

    clickedElement.closest('.tab-body').style.display = 'none';
    refs.tabItems.style.display = 'block';
  }

  function onTabHeadClick (e) {
    if (
      e.target.classList.contains('tab-head') ||
      e.target.tagName === 'H4' ||
      e.target.classList.contains('expand-btn')
    ) {
      let tabHead = e.target;
      let tabId =
        e.target.tagName === 'H4'
          ? tabHead.closest('.tab-head').getAttribute('data-tab')
          : tabHead.getAttribute('data-tab');
      let windowWidth = window.innerWidth;

      if (windowWidth > 767) {
        tabHead.closest('.tabs-with-content-items').style.display = 'none';
        refs.tabItemsBody.querySelector(`.tab-body[data-tab-body='${tabId}'`).style.display = 'block';
      } else {
        const closestCollapse = e.target.closest('.tab').querySelector('.tab-body');

        refs.tabItems.querySelectorAll('.tab-body').forEach((collapse) => {
          if (collapse !== closestCollapse) {
            slideUp(collapse);
          }
        });

        if (closestCollapse.classList.contains('show')) {
          slideUp(closestCollapse);
        } else {
          slideDown(closestCollapse);
        }
      }
    }
  }

  function slideDown (collapse) {
    collapse.classList.add('show');
    collapse.classList.add('collapsing');
    collapse.style.height = `${collapse.scrollHeight}px`;

    collapse.closest('.tab').classList.add('tab-isOpen');

    setTimeout(() => {
      collapse.classList.remove('collapsing');
    }, 350);
  }

  function slideUp (collapse) {
    collapse.classList.add('collapsing');
    collapse.removeAttribute('style');

    collapse.closest('.tab').classList.remove('tab-isOpen');

    setTimeout(() => {
      collapse.classList.remove('collapsing');
      collapse.classList.remove('show');
    }, 350);
  }
}

// Add id on tabHead and tabBody done
// Add click on tabs
// Add clcik on close button

// class TabsWithContent extends window.HTMLDivElement {
//   constructor (...args) {
//     const self = super(...args)
//     self.init()
//     return self
//   }

//   init () {
//     this.$ = $(this)
//     this.props = this.getInitialProps()
//     this.state = this.getInitialState()
//     this.resolveElements()
//     this.bindFunctions()
//     this.bindEvents()
//   }

//   getInitialProps () {
//     // eslint-disable-next-line prefer-const
//     let data = {}
//     // try {
//     //   data = JSON.parse($('script[type="application/json"]', this).text())
//     // } catch (e) {}
//     return data
//   }

//   getInitialState () {
//     return {}
//   }

//   resolveElements () {
//     this.$tabTitle = $('.tab-head', this)
//     this.$tabBody = $('.tabs-with-content-content .tab-body', this)
//     this.$closeButton = $('.tab-closeButton', this)
//   }

//   bindFunctions () {
//   }

//   bindEvents () {
//     this.$tabTitle.on('click', this.handleTabClick)
//     this.$closeButton.on('click', this.handleCloseButton)
//   }

//   connectedCallback () {
//     this.addIdOnInnerMenu(this.$tabTitle, 'data-tab', 'tab-')
//     this.addIdOnInnerMenu(this.$tabBody, 'data-tab-body', 'tab-')
//   }

//   addIdOnInnerMenu (elements, customAttribute, attrTextValue) {
//     $(elements).each(function (i) {
//       $(this).attr(customAttribute, attrTextValue + (i + 1))
//     })
//   }

//   handleTabClick (e) {
//     const tabId = $(this).attr('data-tab')
//     const windowWidth = $(window).width()

//     if (windowWidth > 767) {
//       $(this).closest('.tabs-with-content-items').css('display', 'none')
//       $(this).closest('[is="flynt-block-tabs-with-content"]').find('.tabs-with-content-content .tab-body[data-tab-body=' + tabId + ']').css('display', 'block')
//     } else {
//       if (!$(this).closest('.tab').hasClass('tab-isOpen')) {
//         $('.tab').removeClass('tab-isOpen')
//         $(this).closest('[is="flynt-block-tabs-with-content"]').find('.tab-body').stop(true, true).slideUp()
//         $(this).closest('.tab').addClass('tab-isOpen')
//         $(this).closest('.tab').find('.tab-body').stop(true, true).slideDown()
//       } else {
//         $('.tab').removeClass('tab-isOpen')
//         $(this).closest('[is="flynt-block-tabs-with-content"]').find('.tab-body').stop(true, true).slideUp()
//       }
//     }
//   }

//   handleCloseButton (e) {
//     $(this).closest('.tab-body').css('display', 'none')
//     $(this).closest('[is="flynt-block-tabs-with-content"]').find('.tabs-with-content-items').css('display', 'block')
//   }
// }
