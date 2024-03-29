// import './bootstrap'

import Alpine from 'alpinejs'

// import ziggy from 'ziggy-js'
import Media from './modules/media'
import ColorMode from './modules/color-mode'

// import favicon from './modules/favicon'
import Tiptap from './modules/tiptap'
import Dialog from './modules/dialog'
import Project from './modules/project'
import Submission from './modules/submission'
import SlideOver from './modules/slide-over'

window.Alpine = Alpine

Alpine.data('colorMode', ColorMode)
Alpine.data('tiptap', Tiptap)
Alpine.data('media', Media)
Alpine.data('dialog', Dialog)
Alpine.data('project', Project)
Alpine.data('submission', Submission)
Alpine.store('sidebar', false)
Alpine.data('slideOver', SlideOver)

Alpine.start()
