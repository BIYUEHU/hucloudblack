<script setup lang="ts">
import { locales, setTitle, settings } from '@/function';

setTitle(locales.title.about);
</script>

<template>
  <div class="mdui-card mdui-hoverable mdui-m-b-2 mdui-m-t-5 mdui-container">
    <div class="mdui-center mdui-card-header mdui-row">
      <img class="mdui-card-header-avatar" src="/favicon.ico" />
      <strong>
        <h1 class="mdui-card-header-title mdui-text-color-grey-800">{{ settings.webtitle }}</h1>
      </strong>
      <div class="mdui-card-header-subtitle mdui-text-color-orange-900">{{ locales.info }}</div>
      <br />
    </div>
    <div class="mdui-center">
      <img class="mdui-center" width="70%" style="max-width: 400px" :src="`${settings.dirs.imgs}/about.png`" />
      <h3 class="mdui-text-center mdui-text-color-theme">By {{ settings.author }}</h3>
      <h3 class="mdui-text-center"><div v-html="settings.contact"></div></h3>
      <h4 class="mdui-text-center mdui-text-color-red-a700">{{ settings.webdescr }}</h4>
    </div>

    <div v-if="settings.notice">
      <div class="mdui-textfield mdui-textfield-floating-label">
        <button
          mdui-dialog="{target: '#open'}"
          class="mdui-center mdui mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple"
        >
          {{ locales.viewNotice }}
        </button>
      </div>

      <div class="mdui-dialog" id="open">
        <div class="mdui-dialog-title mdui-text-color-green-a400">
          <strong>{{ locales.notice }}</strong>
        </div>
        <div class="mdui-dialog-content" v-html="settings.notice"></div>
        <div class="mdui-dialog-actions">
          <button class="mdui-btn mdui-ripple">{{ locales.known }}</button>
        </div>
      </div>
    </div>

    <div v-if="settings.sponsor">
      <div class="mdui-textfield mdui-textfield-floating-label">
        <button
          mdui-dialog="{target: '#sponsor'}"
          class="mdui-center mdui mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple"
        >
          {{ locales.sponsor }}
        </button>
      </div>

      <div class="mdui-dialog" id="sponsor">
        <div class="mdui-dialog-title">{{ locales.sponsor }}</div>
        <div class="mdui-dialog-content" v-html="settings.sponsor"></div>
        <div class="mdui-dialog-actions">
          <button class="mdui-btn mdui-ripple" mdui-dialog-close>{{ locales.cancel }}</button>
          <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>{{ locales.sure }}</button>
        </div>
      </div>
      <div />
    </div>
  </div>
</template>
