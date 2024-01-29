<script setup lang="ts">
import { ref } from 'vue';
import {
  locales,
  setTitle,
  queryRecord,
  handleAvatarUrl,
  handleDescr,
  handlePlateText,
  handlePlateColor,
  handleLevelColor,
  type ValType
} from '@/function';

setTitle(locales.title.query);
const query = ref('');
const val = ref<ValType | null | undefined>(null);
</script>

<template>
  <div class="mdui-card mdui-hoverable mdui-m-b-2 mdui-m-t-5 mdui-container">
    <div class="mdui-textfield mdui-textfield-floating-label">
      <label class="mdui-textfield-label"> {{ locales.queryTips }} </label>
      <input class="mdui-textfield-input" v-model="query" maxlength="40" type="text" />
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label">
      <button
        class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple"
        @click="async () => (val = await queryRecord(query.trim(), 'identity'))"
      >
        {{ locales.query }}
      </button>
    </div>
    <div
      v-if="val === undefined"
      class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-blue"
      style="width: 90%"
    >
      <h2><i class="mdui-icon material-icons mdui-text-color-yellow">mood_bad</i>{{ locales.queryEmpty }}</h2>
    </div>
    <div v-else-if="val && typeof val === 'object'" class="mdui-card mdui-hoverable mdui-m-b-2 mdui-container">
      <router-link :to="`/record/${val.uuid}`">
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
        <div class="mdui-card-content" v-html="handleDescr(val.descr)"></div></router-link
      ><br />
      <div class="mdui-card-header-subtitle">{{ locales.time }}{{ val.date }}</div>
    </div>
  </div>
</template>
