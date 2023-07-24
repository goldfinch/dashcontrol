<script setup>

import { ref } from 'vue'
import { useDashpanelStore } from '../stores/DashpanelStore';
const dashpanelStore = useDashpanelStore();

var cmsEditLink = document.head.querySelector('meta[name="x-cms-edit-link"]');

</script>
<template>

  <div class="gfdashpanel__wrapper">
    <div class="gfdashpanel__primary">
      <span class="siteentry"></span>
      <span class="siteenv"></span>
    </div>
    <div class="gfdashpanel__inner">
      <span class="pageentry"></span>
      <!-- <span class="pagestate" data-type="draft">Draft</span> -->
      <!-- <span class="pagestate" data-type="modified">Modified</span> -->
      <span class="pagestate" data-type="published">Published</span>
      <span class="pagetype"><span><i data-type="page"></i></span> Blocks</span>
      <span class="pagecreated" title="January 7th, 2023 at 22:30"><span><i data-type="clock"></i>created</span>7 months ago, <a href="#">admin</a></span>
      <span class="pageupdated" title="July 22nd, 2023 at 12:38"><span><i data-type="clock-history"></i>updated</span>2 minutes ago, <a href="#">admin</a></span>
    </div>
    <ul class="gfdashpanel__sidelinks">
      <li data-i="search"><a href="#" title="Search / Navigator"></a></li>
      <li data-i="info"><a href="#" title="Info"></a></li>
      <li data-i="robots"><a href="#" title="Robots"></a></li>
      <li data-i="sitemap"><a href="#" title="Sitemap"></a></li>
      <li data-i="performance"><a href="#" title="Performance"></a></li>
      <li data-i="bug"><a href="#" title="Errors"></a></li>
      <li data-i="inspect"><a href="javascript:void(0)"><span>Inspect</span></a></li>
      <li data-i="dev"><a href="#" title="Dev"><span>Live</span></a></li>
      <!-- <li data-i="logout"><a href="#"></a></li> -->
      <li data-splitter></li>
      <li data-i="person"><a href="#" title="User info"></a></li>
      <li data-i="settings"><a href="/admin/settings" title="Settings"></a></li>
      <li data-i="pages"><a href="/admin/pages" title="Pages"></a></li>
      <li data-i="dashboard"><a href="/admin/dashboard" title="Dashboard"></a></li>
      <li v-if="cmsEditLink" data-i="edit"><a :href="cmsEditLink.content" title="Edit page"></a></li>
    </ul>
  </div>

</template>
