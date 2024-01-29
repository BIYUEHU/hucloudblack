<script setup lang="ts">
import { locales, settings, user } from '@/function';
</script>

<template>
  <div class="appbar mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
      <span class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#drawer'}">
        <i class="mdui-icon material-icons">menu</i>
      </span>
      <router-link to="/" class="mdui-typo-headline">{{ settings.webtitle }}</router-link>
      <div class="mdui-toolbar-spacer"></div>
      <router-link :to="user.link">
        <div class="mdui-chip mdui-btn">
          <img class="mdui-chip-icon" :src="`${settings.dirs.imgs}/logo.png`" />
          <span class="mdui-chip-title">{{ user.name }} </span>
        </div>
      </router-link>
      <router-link to="/query/" class="mdui-btn mdui-btn-icon">
        <i class="mdui-icon material-icons">search</i>
      </router-link>
      <a mdui-menu="{target: '#menu1'}" class="mdui-btn mdui-btn-icon">
        <i class="mdui-icon material-icons">more_vert</i>
      </a>
      <ul class="mdui-menu" id="menu1">
        <li class="mdui-menu-item">
          <router-link to="/about" class="mdui-ripple">{{ locales.about }}</router-link>
        </li>
      </ul>
    </div>
  </div>
</template>
