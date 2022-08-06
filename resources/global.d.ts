import { Alpine as AlpineType } from 'alpinejs'
import { AxiosStatic } from 'axios'
import route from 'ziggy-js'

/**
 * From https://bobbyhadz.com/blog/typescript-make-types-global
 */
declare global {
  const Alpine: AlpineType
  interface Window {
    Alpine: AlpineType
    // axios: AxiosStatic
    // ziggy: typeof route
  }
}

export { }
