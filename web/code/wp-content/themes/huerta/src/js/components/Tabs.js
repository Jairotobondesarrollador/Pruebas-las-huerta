import { select, selectAll } from '../helpers'

class Tabs {
  constructor (options = { }) {
    // assign options and default values
    this.index = 0
    this.buttonClass = options.buttonClass || '.js-tab-btn'
    this.panelClass = options.panelClass || '.js-tab-panel'
    this.containerSelector = options.containerSelector
    this.tabs = selectAll(`${this.containerSelector} ${this.buttonClass}`)

    // bind methods
    this.handleClick = this.handleClick.bind(this)
    this.handleKeydown = this.handleKeydown.bind(this)

    if (!this.containerSelector) {
      console.log('Tabs Error: missing container class in options')
    } else {
      // call init method
      this.init()
    }
  }

  init () {
    this.tabs.forEach(el => {
      el.addEventListener('click', this.handleClick)
      el.addEventListener('keydown', this.handleKeydown)
    })
  }

  handleKeydown (e) {
    const LEFT_ARROW = 37
    const UP_ARROW = 38
    const RIGHT_ARROW = 39
    const DOWN_ARROW = 40
    let { tabs, index } = this
    let k = e.which || e.keyCode

    // if the key pressed was an arrow key
    if (k >= LEFT_ARROW && k <= DOWN_ARROW) {
      // move left one tab for left and up arrows
      if (k === LEFT_ARROW || k === UP_ARROW) {
        if (index > 0) {
          index--
        } else {
          index = tabs.length - 1
        }
      } else if (k === RIGHT_ARROW || k === DOWN_ARROW) {
        if (index < (tabs.length - 1)) {
          index++
        } else {
          index = 0
        }
      }

      // trigger a click event on the tab to move to
      tabs[index].click()
      e.preventDefault()
    }
  }

  handleClick (e) {
    this.tabs.forEach((tab, i) => {
      if (tab === e.target) this.index = i
    })
    this.setFocus()
    e.preventDefault()
  }

  setFocus () {
    let { tabs, index, panelClass, containerSelector } = this
    let current = tabs[index]

    // undo tab control selected state,
    // and make them not selectable with the tab key
    // (all tabs)
    tabs.forEach(tab => {
      tab.setAttribute('tabindex', '-1')
      tab.setAttribute('aria-selected', 'false')
      tab.classList.remove('is-selected')
    })

    // hide all tab panels.
    selectAll(`${containerSelector} ${panelClass}`).forEach(elem => elem.classList.remove('is-current'))

    // make the selected tab the selected one, shift focus to it
    current.setAttribute('tabindex', '0')
    current.setAttribute('aria-selected', 'true')
    current.classList.add('is-selected')
    current.focus()

    // add a current class also to the tab panel
    // controlled by the clicked tab
    // console.log(select(`${containerSelector} #${current.getAttribute('aria-controls')}`))
    select(`${containerSelector} #${current.getAttribute('aria-controls')}`).classList.add('is-current')
  }
}

export default Tabs
