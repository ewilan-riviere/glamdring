// import './bootstrap';
// import '../css/app.css';

// import { createInertiaApp } from '@inertiajs/vue3';
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
// import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//     setup({ el, App, props, plugin }) {
//         return createApp({ render: () => h(App, props) })
//             .use(plugin)
//             .use(ZiggyVue, Ziggy)
//             .mount(el);
//     },
//     progress: {
//         color: '#4B5563',
//     },
// });

import './routes' // add this line to import routes from `routes.ts` generated with `php artisan typescriptable:routes`

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {
  InertiaTyped,
  appResolve,
  appTitle,
} from '@kiwilan/typescriptable-laravel/vue'

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
