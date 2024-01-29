<script setup lang="ts">
import {
  handleAvatarUrl,
  handleLevelColor,
  handlePlateColor,
  handlePlateText,
  locales,
  queryRecord,
  setTitle,
  settings,
  type ValType
} from '@/function';
import { ref } from 'vue';
import { useRoute } from 'vue-router';

setTitle(locales.title.record);

const val = ref<ValType | undefined | null>(null);
(async () => {
  val.value = await queryRecord(useRoute().params.uuid as string);
})();
</script>

<template>
  <div v-if="val !== null" id="tab1" class="mdui-m-l-3 mdui-m-r-3 mdui-m-t-1">
    <div class="mdui-card mdui-hoverable mdui-m-b-2 mdui-container">
      <div v-if="val && typeof val === 'object' && Object.values(val).length > 0">
        <div class="mdui-card-header mdui-row">
          <img class="mdui-card-header-avatar" :src="handleAvatarUrl(val.plate, val.identity)" />
          <div class="mdui-card-header-title">
            <h3>
              {{ val.identity }} <span :class="handleLevelColor(val.level)">LV{{ val.level }}</span>
              <small
                ><br />{{ val.phone ? `${locales.phone}${val.phone}` : '' }}
                <span :class="handlePlateColor(val.plate)">{{ handlePlateText(val.plate) }}</span>
              </small>
            </h3>
          </div>
        </div>
        <div class="mdui-card-content" v-html="val.descr"></div>
        <a v-if="val.imgs.length > 0" v-for="img in val.imgs" :href="img" target="_blank"
          ><img class="mdui-img-rounded mdui-img-fluid" width="45%" :src="img" /></a
        ><br />
        <div class="mdui-card-header-subtitle">{{ locales.time }}{{ val.date }}</div>
      </div>
      <div v-else>
        <div class="mdui-card-header mdui-row">
          <img class="mdui-card-header-avatar" :src="`${settings.dirs.imgs}/avatar.png`" />
          <div class="mdui-card-header-title">
            <h3>{{ locales.recordEmpty }}</h3>
          </div>
        </div>
        <div class="mdui-card-content">{{ locales.none }}</div>
        <div class="mdui-card-header-subtitle"></div>
      </div>
    </div>
  </div>
</template>
