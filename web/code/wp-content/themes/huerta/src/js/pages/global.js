import { select, selectAll } from '../helpers'
// import $ from 'jquery'
import Accordions from '../components/Accordions'
import Tabs from '../components/Tabs'
import '../../scss/style.scss'
import Menu from '../components/Menu'
import modalVideo from '../components/ModalVideo'
import { heroSwiper } from '../components/heroSwiper'
import { testimonialSwiper } from '../components/testimonialSwiper'
import eventsCalendar from '../components/Calendar'
import Dialog from '../components/Dialog'
import { Form } from '../components/Form'

window.Huerta = {
  bodyID: null,
  init () {
    // get page <body> id (e.g. 'body#home')
    this.bodyID = document.body.getAttribute('id')

    // envoke page specific js
    if (this.pages.hasOwnProperty(this.bodyID)) {
      const page = this.pages[this.bodyID]

      // initialize init & bindEvents functions from page specific js (e.g. home.js)
      if (page.hasOwnProperty('init') && typeof page.init === 'function') {
        page.init(this)
      }

      if (
        page.hasOwnProperty('bindEvents') &&
        typeof page.bindEvents === 'function'
      ) {
        page.bindEvents()
      }
    }
    // sitewide js
    this.bindEvents()
  },
  bindEvents () {
    console.log('global js')

    selectAll('.js-accordion').forEach(
      ({ id, dataset: { single, active } }) => {
        /* eslint-disable-next-line */
        let accordion = new Accordions({
          singleActive:
            typeof single !== 'undefined' ? parseInt(single, 10) : null,
          activeIndex:
            typeof active !== 'undefined' ? parseInt(active, 10) : null,
          containerSelector: id ? `#${id}` : '.js-accordion',
          buttonClass: '.c-accordion__button'
        })
      }
    )

    selectAll('.js-tabs').forEach(({ id }) => {
      /* eslint-disable-next-line */
      let tab = new Tabs({ containerSelector: `#${id}` })
    })

    /* eslint-disable-next-line */
    new Menu({
      menu: select('.js-menu'),
      toggle: select('.js-toggle')
    })

    eventsCalendar()

    heroSwiper()

    testimonialSwiper()

    if (select('.js-video')) {
      Array.prototype.slice
        .call(selectAll('.js-video'))
        .forEach(function (elem) {
          elem.addEventListener('click', function (e) {
            if (
              !this.classList.contains('is-next') ||
              !this.classList.contains('is-prev')
            ) {
              e.preventDefault()
              modalVideo(this)
            }
          })
        })
    }

    const dialogOverlay = select('.js-dialog-overlay')

    selectAll('.js-dialog').forEach((navDialogEl, index) => {
      const Dialogs = new Dialog(navDialogEl, dialogOverlay)
      Dialogs.addEventListeners(
        `.js-open-dialog-${index}`,
        `.js-close-dialog-${index}`
      )
    })

    const formSubmit = () => {
      const formDefault = selectAll('.c-form--default')

      formDefault.forEach((form) => {
        form.addEventListener('submit', async (e) => {
          e.preventDefault()
          /* eslint-disable-next-line */
          const formData = new FormData(form)

          try {
            /* eslint-disable-next-line */
            const res = await fetch(
              '/wp-json/contact-form-7/v1/contact-forms/314/feedback',
              {
                'Access-Control-Allow-Origin': '*',
                'method': 'POST',
                'body': formData
              }
            )

            const result = await res.json()

            const modal = new Form({
              modals: selectAll('.js-dialog'),
              overlays: selectAll('.c-dialog__overlay')
            })

            switch (result.status) {
              case 'mail_failed':
                modal.addModal('error')
                break
              default:
                modal.addModal('success')
            }
          } catch (err) {
            console.log(err)
          }
        })
      })
    }

    formSubmit()

    /* eslint-disable-next-line */

    const nav = () => {
      const links = [...document.querySelectorAll('a[href*="#"]')]
      links.map((link) => {
        const section = link.getAttribute('href')
        link.addEventListener('click', (e) => {
          e.preventDefault()
          if (section) {
            document.querySelector(section).scrollIntoView({
              behavior: 'smooth',
              block: 'center',
              inline: 'nearest'
            })
          }
        })
      })
    }

    nav()
  },
  pages: {}
}

document.addEventListener('DOMContentLoaded', (event) => {
  window.Huerta.init()
})
