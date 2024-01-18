import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { plugin, defaultConfig } from '@formkit/vue';
import cfg from '@/app.config.json';
import customConfig from './formkit.config.js';
import AppDashpanel from './App.vue';

const pinia = createPinia();

const dashpanelRef = '[goldfinch-dashpanel]';

const dashpanel = document.querySelector(dashpanelRef);

if (dashpanel) {
  const app = createApp(AppDashpanel, { ...dashpanel.dataset });

  app.provide('cfg', cfg);

  app.use(pinia).use(plugin, defaultConfig(customConfig)).mount(dashpanelRef);
}
