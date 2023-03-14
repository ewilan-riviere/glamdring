const sidebarStore = {
  open: false,

  toggle() {
    console.log('sidebar open')
    this.open = !this.open
    console.log(this.open)
  },
  close() {
    this.open = false
  },
}

export default sidebarStore
