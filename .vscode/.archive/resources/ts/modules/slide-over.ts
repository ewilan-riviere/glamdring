const SlideOver = () => ({
  id: '',
  idContent: '',
  idWrapper: '',
  isOpened: false,
  elDialog: {} as HTMLElement,
  elContent: {} as HTMLElement,

  boot(id: string) {
    this.id = id
    this.idContent = `${this.id}-content`
    this.idWrapper = `${this.id}-wrapper`

    this.elDialog = document.getElementById(this.id) as HTMLElement
    this.elContent = document.getElementById(this.idContent) as HTMLElement
  },
  toggle() {
    this.isOpened = !this.isOpened

    if (this.isOpened) {
      document.body.appendChild(this.elContent)
      document.body.classList.add('overflow-hidden')
    }
    else {
      document.getElementById(this.idWrapper)?.appendChild(this.elContent)
      document.body.classList.remove('overflow-hidden')
    }
  },
})

export default SlideOver
