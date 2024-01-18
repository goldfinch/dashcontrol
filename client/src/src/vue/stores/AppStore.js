import { defineStore } from 'pinia';
import { useLocalStorage } from '@vueuse/core';

export const useAppStore = defineStore('AppStore', {
  state: () => ({
    panel: useLocalStorage('Dashpanel:panel', false),
    elementTrack: useLocalStorage('Dashpanel:elementTrack', false),
    data: {},
  }),

  getters: {
    hidePanel(state) {
      return (state.panel = false);
    },

    showPanel(state) {
      return (state.panel = true);
    },
  },

  actions: {
    setInitData(data) {
      this.data = JSON.parse(data);
    },

    togglePanel() {
      this.panel = !this.panel;
    },

    toggleElementTrack() {
      this.elementTrack = !this.elementTrack;
    },
  },
});
