function Project() {
  return {
    gitId: '',
    token: '',

    boot(gitId: string, token: string) {
      this.gitId = gitId
      this.token = token

      this.fetchLangs()
    },
    async fetchLangs() {
      const api = `https://gitlab.com/api/v4/projects/${this.gitId}/languages`
      const response = await fetch(api)
      let langs = {}
      if (response.status === 200) {
        const body = await response.json()
        langs = body
      }

      // const csrfToken = document.head.querySelector('meta[name=csrf-token]')
      // const xsrfToken = this.getCookie('XSRF-TOKEN')
      // console.log(this.token)
      await fetch('/api/projects', {
        method: 'PATCH',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          // 'CSRF-TOKEN': csrfToken?.getAttribute('content') ?? '',
          // 'X-CSRF-TOKEN': csrfToken?.getAttribute('content') ?? '',
          // 'X-XSRF-TOKEN': xsrfToken,
          // 'XSRF-TOKEN': xsrfToken,
          // 'X-Requested-With': 'XMLHttpRequest',
          'Authorization': `Bearer ${this.token}`,
        },
        // credentials: 'include',
        body: JSON.stringify({
          gitId: this.gitId,
          langs,
        }),
      }).catch(() => {

      })
    },
    getCookie(cname: string) {
      const name = `${cname}=`
      const decodedCookie = decodeURIComponent(document.cookie)
      const ca = decodedCookie.split(';')
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i]
        while (c.charAt(0) === ' ')
          c = c.substring(1)

        if (c.indexOf(name) === 0)
          return c.substring(name.length, c.length)
      }
      return ''
    },
  }
}

export default Project
