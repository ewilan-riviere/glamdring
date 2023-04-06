import './bootstrap'

import Alpine from 'alpinejs'
import Collapse from '@alpinejs/collapse'
import Focus from '@alpinejs/focus'
import Intersect from '@alpinejs/intersect'
import Persist from '@alpinejs/persist'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'

Alpine.plugin(Collapse)
Alpine.plugin(Focus)
Alpine.plugin(Intersect)
Alpine.plugin(Persist)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)

window.Alpine = Alpine

Alpine.start()
