function Submission() {
  return {
    loading: false,

    async send() {
      this.loading = true
      const message = {
        name: 'Ewilan',
        email: 'ewilan.riviere@gmail.com',
        message: 'In aliquip pariatur esse mollit ullamco dolor reprehenderit duis id minim irure aliqua ad velit. Adipisicing anim anim non sunt incididunt. Adipisicing duis id do incididunt et anim esse non ex esse culpa ad dolor.',
      // app: 'ewilan-riviere.com',
      // to: 'ewilan.riviere@mail.com',
      // honeypot: false,
      }

      const csrfToken = document.head.querySelector('meta[name=csrf-token]')

      await fetch('/api/submissions', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken?.getAttribute('content') ?? '',
        },
        body: JSON.stringify(message),
      })
      this.loading = false
    },
  }
}

export default Submission
