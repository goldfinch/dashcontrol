<script setup>

import { ref, onMounted } from 'vue'
import ElementInfo from "./ElementInfo.vue";
import { useElementsStore } from '../stores/ElementsStore';
const elementsStore = useElementsStore();

function initElements() {

  let controlelements = document.getElementsByClassName('controlelements')[0];

  if (controlelements) {

    let elements = document.querySelectorAll('[data-ss-element]');

    if (elements.length) {

      elements.forEach((el, key) => {

        elementsStore.addElement(el)

      })
    }
  }
}

function setElementPosition(el) {
  return 'top: ' + el.offsetTop + 'px; height: ' + el.clientHeight + 'px;';
}

function elementMouseover(element) {

  element.ref.style.filter = 'grayscale(1) blur(1px)';
  element.viewing = true;
}
function elementMouseout(element) {

  element.ref.style.filter = '';
  element.viewing = false;
}

onMounted(() => {

  initElements()

});

</script>
<template>

  <div class="controlelements">
    <a
      v-for="element in elementsStore.elements"
      :v-key="element.id"
      :href="element.href"
      :style="setElementPosition(element.ref)"
      @mouseover="elementMouseover(element)"
      @mouseout="elementMouseout(element)"
    >
      <!-- <Transition> -->
        <ElementInfo v-if="element.viewing" :element="element"></ElementInfo>
      <!-- </Transition> -->
    </a>
  </div>

</template>
