<script setup>
import { ref } from 'vue';
import { useAppStore } from './stores/AppStore';
const store = useAppStore();

import Dashpanel from './components/Dashpanel.vue';
import ElementsTracker from './components/ElementsTracker.vue';

const props = defineProps({
  supplies: String,
});

store.setInitData(props.supplies);

const elementsOn = ref(true);
</script>
<template>
  <ElementsTracker v-if="elementsOn && store.elementTrack"></ElementsTracker>

  <div class="gfdashpanel">
    <Dashpanel v-if="store.panel"></Dashpanel>
    <button
      class="gfdashpanel__switch"
      :class="store.panel ? 'gfdashpanel__switch--active' : ''"
      @click="store.togglePanel()"
    ></button>
    <button
      v-if="elementsOn"
      class="gfdashpanel__elementswitch"
      :class="store.elementTrack ? 'gfdashpanel__elementswitch--hide' : ''"
      @click="store.toggleElementTrack()"
    ></button>
  </div>
</template>
