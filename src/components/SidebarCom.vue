<script setup lang="ts">
import { settings, sidebar } from '@/function';
</script>

<template>
  <div class="mdui-drawer" id="drawer">
    <div class="mdui-card">
      <div class="mdui-card-media">
        <img :src="`${settings.dirs.imgs}/card.png`" />
      </div>
    </div>
    <ul class="mdui-list" mdui-collapse="{accordion: true}" v-for="item in sidebar" :key="item.name">
      <router-link v-if="item.path" :to="item.path">
        <li class="mdui-list-item mdui-ripple">
          <i class="mdui-list-item-icon mdui-icon material-icons" :class="item.color">{{ item.icon }} </i>
          <div class="mdui-list-item-content">{{ item.name }}</div>
        </li>
      </router-link>
    </ul>
  </div>
</template>
