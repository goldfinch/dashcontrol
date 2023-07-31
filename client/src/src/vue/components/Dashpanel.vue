<script setup>

import { ref, inject } from 'vue'
import { useAppStore } from '../stores/AppStore';
// import { useDashpanelStore } from '../stores/DashpanelStore';
import moment from 'moment-timezone';

const cfg = inject('cfg')

// const dashpanelStore = useDashpanelStore();
const store = useAppStore();

var cmsEditLink = document.head.querySelector('meta[name="x-cms-edit-link"]');

var data = store.data;

function createdBy() {
  let author = data.page.versions.first.author;

  if (author) {
    return ', <a href="' + author.link + '">' + author.name + '</a>'
  }

  return;
}

function updatedBy() {
  let author = data.page.versions.last.author;

  if (author) {
    return ', <a href="' + author.link + '">' + author.name + '</a>'
  }

  return;
}

// moment().tz(data.info.timezone).format();
// console.log(data)
</script>
<template>

  <div class="gfdashpanel__wrapper">
    <div class="gfdashpanel__primary">
      <span v-if="data.siteAccess != 'Anyone'" :title="'Site restricted access: ' + data.siteAccess" class="siteentry"></span>
      <span v-if="data.env == 'dev'" :title="'Site in ' + data.env + ' environment type'" class="siteenv"></span>
    </div>
    <div class="gfdashpanel__inner">
      <span v-if="data.page.canViewType != 'Anyone'" :title="'Page restricted access: ' + data.page.canViewType" class="pageentry"></span>
      <span v-if="data.page.stagesDiffer" class="pagestate" data-type="draft">Draft</span>
      <span v-else-if="!data.page.isPublished" class="pagestate" data-type="modified">Modified</span>
      <span v-else class="pagestate" data-type="published">Published</span>
      <span class="pagetype" :title="data.page.classNamespace"><span><i data-type="page" :style="`opacity: .5`"><img :src="`${cfg.bootstrap_icon_path}${data.page.icon}.svg`"/></i></span> {{ data.page.className }}</span>
      <span class="pagecreated" :title="moment(data.page.createdAt).format('MMMM Do YYYY, HH:mm:ss')"><span><i data-type="clock"></i>created</span>{{ moment(data.page.createdAt).fromNow() }}<i v-html="createdBy()" /></span>
      <span class="pageupdated" :title="moment(data.page.updatedAt).format('MMMM Do YYYY, HH:mm:ss')"><span><i data-type="clock-history"></i>updated</span>{{ moment(data.page.updatedAt).fromNow() }}<i v-html="updatedBy()" /></span>
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

  <!-- <div class="controlwindow">
    <div class="controlwindow__inner">
      <div class="controlwindow__head">
        <ul class="controlwindow__tabs">
          <li data-active><button>Meta</button></li>
          <li><button>Schema</button></li>
          <li><button>Open Graph</button></li>
          <li><button>Analytics</button></li>
          <li><button>External components</button></li>
          <li><button>Images</button></li>
          <li><button>Fonts</button></li>
        </ul>
      </div>
      <div class="controlwindow__body"></div>
    </div>
  </div> -->

</template>
