const Media = () => ({
  id: '',
  element: {} as HTMLElement,
  placeholder: {} as HTMLElement,
  media: {} as HTMLImageElement | HTMLIFrameElement,
  src: '',
  placeholderSrc: '/default.webp',
  options: {
    threshold: 1.0,
    rootMargin: '0px 0px 100px 0px',
  } as IntersectionObserverInit,

  boot(id: string) {
    this.id = id

    const el = document.getElementById(id)
    if (el) {
      this.element = el
      if (el.children[0])
        this.placeholder = el.children[0] as HTMLImageElement

      /**
       * Set media
       */
      if (el.children[1]) {
        this.media = el.children[1] as HTMLImageElement
        const src = this.media.getAttribute('data-src')
        if (src)
          this.src = src
      }
    }

    window.addEventListener('DOMContentLoaded', () => {
      this.setIntersectionObserver()
    })
  },
  setIntersectionObserver() {
    if (!window.IntersectionObserver)
      return

    const observer = new IntersectionObserver(([entry]) => {
      const target = entry.target
      if (entry.isIntersecting) {
        this.setMedia()

        observer.unobserve(target)
      }
    }, this.options)

    observer.observe(this.element)
  },
  setMedia() {
    this.media.setAttribute('src', this.src)

    this.media.onload = () => {
      this.media.classList.remove('hidden')
      this.placeholder.classList.add('opacity-0')
      this.placeholder.classList.remove('opacity-100')
    }
    this.media.onerror = () => {
      this.media.setAttribute('src', this.placeholderSrc)
    }
  },
})

export default Media
