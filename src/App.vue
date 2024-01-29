<script setup lang="ts">
import HeaderCom from '@/components/HeaderCom.vue';
import SidebarCom from '@/components/SidebarCom.vue';
import FooterCom from '@/components/FooterCom.vue';
import { settings } from './function';
</script>

<template>
  <div :class="`mdui-theme-primary-${settings.theme.primary} mdui-theme-accent-${settings.theme.accent} `">
    <HeaderCom />
    <SidebarCom />
    <div class="mdui-container-fluid">
      <router-view />
    </div>
    <FooterCom />
  </div>
</template>
