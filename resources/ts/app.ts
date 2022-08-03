import './bootstrap'

import Alpine from 'alpinejs'

import colorMode from './modules/color-mode'
import lazyMedia from './modules/lazy-media'
// import favicon from './modules/favicon'
import tiptap from './modules/tiptap'

lazyMedia()
// favicon()

window.Alpine = Alpine

Alpine.data('colorMode', colorMode)
Alpine.data('tiptap', tiptap)

Alpine.start()
