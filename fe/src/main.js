/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Plugins
import { registerPlugins } from '@/plugins'

// Components
import App from './App.vue'

// Composables
import { createApp } from 'vue'

// Styles
import 'unfonts.css'
// import router from "@/router/index.js";
// import router from "@/router/index.js";
import router from "@/modules/routes.js";
const app = createApp(App)

registerPlugins(app)
app.use(router)
/**
 * Create vue application.
 * @param target
 * @returns {ComponentPublicInstance}
 */
window.createVueApp = (target) => app.mount(target)

window.createVueApp('#app')
