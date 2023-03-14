import './bootstrap'
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {
  InertiaTyped,
  appResolve,
  appTitle,
} from '@kiwilan/typescriptable-laravel/vue'
import './routes'

import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'

createInertiaApp({
  title: title => appTitle(title, 'Glamdring'),
  resolve: name =>
    appResolve(name, import.meta.glob('./Pages/**/*.vue', { eager: true })),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(InertiaTyped)
      .mount(el)
  },
  progress: {
    delay: 250,
    color: '#4B5563',
    includeCSS: true,
    showSpinner: false,
  },
})
