type Mode = 'light' | 'dark'
interface ModeElement {
  label: string
  key: string
}

const ColorMode = () => ({
  mode: 'light' as Mode,
  list: [
    {
      label: 'Light',
      key: 'light',
    },
    {
      label: 'Dark',
      key: 'dark',
    },
  ] as ModeElement[],
  key: 'color-scheme',

  init() {
    this.setMode()
  },
  switchMode() {
    if (this.mode === 'light')
      this.mode = 'dark'
    else
      this.mode = 'light'

    this.toggleMode(this.mode)
  },
  toggleMode(mode: Mode) {
    const body = document.documentElement
    this.list.forEach((element) => {
      body.classList.remove(element.key)
    })
    body.classList.add(mode)

    localStorage.setItem(this.key, mode)
    this.setMode(mode)
  },
  setMode(mode?: Mode) {
    const currentMode = localStorage.getItem(this.key)
    if (currentMode)
      this.mode = currentMode as Mode

    if (mode === 'light')
      this.mode = 'light'
  },
})

export default ColorMode
