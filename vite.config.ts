import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
  resolve: {
    alias: {
      '~/app': './',
    },
  },
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/ts/app.ts',
        'resources/css/filament.css',
      ],
      refresh: [
        ...refreshPaths,
        'app/Http/Livewire/**',
      ],
    }),
  ],
  optimizeDeps: {
    include: ['alpinejs'],
  },
})
