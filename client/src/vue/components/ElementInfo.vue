<script setup>

import moment from 'moment-timezone';
// moment().tz('Pacific/Auckland').format(); // TODO dynamic

const props = defineProps({
  element: Object
})

</script>
<template>
  <div class="controleelementinfo">
    <div>
      <div class="controleelementinfo__body">
        <div class="controleelementinfo__icon"><img :src="`/build-cms/enchantment/assets/extra/bootstrap-icons/${element.icon.substr(3)}.svg`"></div>
        <div class="controleelementinfo__title" v-text="element.type"></div>
        <div class="controleelementinfo__description" v-text="element.summary"></div>
      </div>
      <div class="controleelementinfo__relationship">
        <span>This block also appears on:</span>
        <ul>
          <li><a href="#">About page</a></li>
          <li><a href="#">Contact page</a></li>
        </ul>
      </div>
      <div class="controleelementinfo__info">
        <span v-if="!element.stagesDiffer" class="blockstate" data-type="published">Published</span>
        <span v-else-if="element.stagesDiffer" class="blockstate" data-type="modified">Modified</span>
        <span class="blockcreated" :title="moment(element.createdAt).format('MMMM Do YYYY, HH:mm:ss')"><span><i data-type="clock"></i>created</span>{{ moment(element.createdAt).fromNow() }}, <a href="#">admin</a></span>
        <span class="blockupdated" :title="moment(element.updatedAt).format('MMMM Do YYYY, HH:mm:ss')"><span><i data-type="clock-history"></i>updated</span>{{ moment(element.updatedAt).fromNow() }}, <a href="#">admin</a></span>
      </div>
    </div>
  </div>
</template>
