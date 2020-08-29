/**
 *
 * @param @obj elem - Element that will triger the Close Modal Function
 * @param @obj target - Modal that will be closed
 *
 */
function closeModal (elem, target) {
  elem.addEventListener('click', function () {
    target.remove()
  })
}
/**
 *
 * @param @Obj elem - Element that will trigger the Modal Window.
 * Need the follow attributes: data-mp4, data-webm, data-ogg, data-video
 *
 */
export default function (elem) {
  /** Define type and src variables */
  let type = elem.getAttribute('data-video')
  let mp4 = elem.getAttribute('data-mp4')
  let webm = elem.getAttribute('data-webm')
  let ogg = elem.getAttribute('data-ogg')
  let url = elem.getAttribute('data-url')
  /** Define base elements for component */
  let modal = document.createElement('div')
  let modalContent = document.createElement('div')
  let video = document.createElement('video')
  let iframe = document.createElement('iframe')
  let iframeContent = document.createElement('div')
  let close = document.createElement('div')
  /** Define classes */
  modal.classList.add('c-modal')
  modalContent.classList.add('c-modal__content')
  video.classList.add('c-modal__video')
  iframeContent.classList.add('u-oembed')
  close.classList.add('c-modal__close')
  /** Define attributes */
  video.setAttribute('controls', true)
  video.setAttribute('preload', true)

  if (type === 'embed') {
    // If video is an Embed
    iframe.setAttribute('src', url)
    iframeContent.appendChild(iframe)
    modalContent.appendChild(iframeContent)
  } else {
    // If video is uploaded
    if (mp4) {
      let srcmp4 = document.createElement('source')
      srcmp4.setAttribute('src', mp4)
      video.appendChild(srcmp4)
    }
    if (webm) {
      let srcwebm = document.createElement('source')
      srcwebm.setAttribute('src', webm)
      video.appendChild(srcwebm)
    }
    if (ogg) {
      let srcogg = document.createElement('source')
      srcogg.setAttribute('src', ogg)
      video.appendChild(srcogg)
    }
    modalContent.appendChild(video)
  }
  modalContent.appendChild(close)
  modal.appendChild(modalContent)
  document.body.appendChild(modal)
  closeModal(close, modal)
}
