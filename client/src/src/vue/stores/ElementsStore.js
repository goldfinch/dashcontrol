import { defineStore } from 'pinia';

export const useElementsStore = defineStore('ElementsStore', {

  state: () => ({
    elements: [],
  }),

  actions: {

    addElement(element) {
      this.elements.push({
        ref: element,
        id: element.getAttribute('data-ss-element'),
        anchor: element.getAttribute('data-anchor'),
        icon: element.getAttribute('data-icon'),
        type: element.getAttribute('data-type'),
        summary: element.getAttribute('data-summary'),
        href: element.getAttribute('data-href'),
        createdAt: element.getAttribute('data-created-at'),
        updatedAt: element.getAttribute('data-updated-at'),
        isOnDraft: element.getAttribute('data-is-on-draft'),
        stagesDiffer: element.getAttribute('data-stages-differ'),
        isPublished: element.getAttribute('data-is-published'),
        canPublish: element.getAttribute('data-can-publish'),
        canUnublish: element.getAttribute('data-can-unpublish'),
        canEdit: element.getAttribute('data-can-edit'),
        viewing: false,
      });
    },

  },

});
