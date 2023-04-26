function favicon() {
  document.addEventListener('DOMContentLoaded', () => {
    const link = document.querySelector('link[rel~=\'icon\']') as HTMLLinkElement
    const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches

    if (isDark)
      link.href = '/icon-dark.svg'
  })
}

export default favicon
