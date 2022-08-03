const lazyMedia = () => {
  const placeholder = '/default.webp'
  if (window.IntersectionObserver) {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const el = entry.target

          const transitionEl = el.children[0]
          const imgEl = el.children[1] as HTMLImageElement
          const placeholderEl = el.children[2] as HTMLImageElement

          if (imgEl) {
            const src = imgEl.getAttribute('data-src')
            imgEl.setAttribute('src', src || placeholder)

            imgEl.onload = () => {
              imgEl.classList.remove('hidden')
              placeholderEl.classList.add('hidden')
              transitionEl.classList.add('opacity-0')
            }
            imgEl.onerror = () => {
              transitionEl.classList.add('opacity-0')
            }

            observer.unobserve(entry.target)
          }
        }
      })
    }, { rootMargin: '0px 0px -100px 0px' })
    document.querySelectorAll('.lazy-media').forEach((img) => { observer.observe(img) })
  }
}

export default lazyMedia
