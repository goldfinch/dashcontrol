import { createApp } from 'vue'
import { createPinia } from 'pinia';
import { plugin, defaultConfig } from '@formkit/vue'
import customConfig from './formkit.config.js'
import AppDashpanel from './App.vue'

const pinia = createPinia();

let dashpanelRef = '[goldfinch-dashpanel]';

const daspanel = document.querySelector(dashpanelRef);
const app = createApp(AppDashpanel, { ...daspanel.dataset });
app
  .use(pinia)
  .use(plugin, defaultConfig(customConfig))
  .mount(dashpanelRef);
