class Menu {
  constructor ({menu, subMenu, toggle, subMenuButtons}) {
    this.menu = menu
    this.toggle = toggle

    this.init()
  }

  init () {
    this.menuHandler(this.menu)
  }

  menuOpen (el, subel) {
    el.setAttribute('aria-expanded', 'false')
    el.classList.remove('is-active')
  }

  menuClose (el) {
    el.classList.add('is-active')
    el.setAttribute('aria-expanded', 'true')
  }

  menuHandler (menu) {
    const self = this
    const toggle = this.toggle

    toggle.addEventListener('click', function () {
      if (menu.classList.contains('is-active')) {
        self.menuOpen(self.menu)
        toggle.classList.remove('active')
      } else {
        self.menuClose(self.menu)
        toggle.classList.add('active')
      }
    })
  }
}

export default Menu
