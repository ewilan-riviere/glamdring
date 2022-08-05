import './bootstrap'

import Alpine from 'alpinejs'

import Media from './modules/media'
import ColorMode from './modules/color-mode'
// import favicon from './modules/favicon'
import Tiptap from './modules/tiptap'
import Dialog from './modules/dialog'

window.Alpine = Alpine

Alpine.data('colorMode', ColorMode)
Alpine.data('tiptap', Tiptap)
Alpine.data('media', Media)
Alpine.data('dialog', Dialog)

Alpine.start()
