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
      e.target.classList.contains('tab-expandButton')
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
