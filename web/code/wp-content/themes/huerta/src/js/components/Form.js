import { select } from '../helpers'

export class Form {
  constructor ({modals, overlays}) {
    this.modals = modals
    this.overlays = overlays
    this.removeModals()
  }

  removeModals () {
    Array.prototype.slice.call(this.modals).map((modal, index) => {
      modal.setAttribute('aria-hidden', true)
      this.overlays[index].setAttribute('aria-hidden', true)
    })
  }

  addModal (type) {
    const body = select('body')
    const markup = `<div class="c-dialog js-dialog js-dialog-${type}" role="dialog" aria-labelledby="dialogTitle" aria-describedby="dialogDescription">
    <div class="c-dialog__error" id="modal-error">
    <div class="c-form__bg c-form__bg--info">
      <button type="button" aria-label="Close Navigation" class="c-form__close js-close-dialog-${type}">
      <img src="/wp-content/themes/huerta/dist/img/close-white.svg" alt="">
      </button>
    </div>
      <div class="o-container">
        <div class="o-grid o-grid--middle o-grid--center">
        <div class="o-grid__col u-8/12@md">
            <div class="c-dialog__body">
              <img class="c-dialog__img" src="${type !== 'error' ? '/wp-content/themes/huerta/dist/img/message.svg' : '/wp-content/themes/huerta/dist/img/close-pink.svg'}" alt="Error" />
              <p class="c-dialog_title c-dialog__title--${type}">${type !== 'error' ? 'Listo, Estás Inscrito' : 'Oops!, Error en la Inscripción'}</p>
              <p class="c-dialog__copy">Pronto estaremos en contacto</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="c-dialog__overlay js-dialog-overlay js-dialog-overlay-${type}"></div>
  `
    body.insertAdjacentHTML('afterbegin', markup)

    this.addEventListeners(
      select(`.js-close-dialog-${type}`),
      select(`.js-dialog-${type}`),
      select(`.js-dialog-overlay-${type}`)
    )
  }

  addEventListeners (close, modal, overlay) {
    close.addEventListener('click', () => {
      modal.setAttribute('aria-hidden', true)
      overlay.setAttribute('aria-hidden', true)
      overlay.remove()
      modal.remove()
      close.remove()
    })
  }
}
