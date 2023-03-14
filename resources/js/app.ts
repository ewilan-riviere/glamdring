import './bootstrap'
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import {
  InertiaTyped,
  appResolve,
  appTitle,
} from '@kiwilan/typescriptable-laravel/vue'

import { Routes } from './routes'
console.log(Routes)

createInertiaApp({
  // helper for setup title
  title: title => appTitle(title, 'App'),
  // helper for setup resolve
  resolve: name =>
    appResolve(name, import.meta.glob('./Pages/**/*.vue', { eager: true })),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
    // add this line to use `useInertiaTyped` composable
      .use(InertiaTyped)

    app.mount(el)
  },
  progress: {
    delay: 250,
    color: '#4B5563',
    includeCSS: true,
    showSpinner: false,
  },
})
