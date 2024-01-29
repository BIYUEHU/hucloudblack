<script setup lang="ts">
import {
  handleAvatarUrl,
  handleLevelColor,
  handlePlateColor,
  handlePlateText,
  handleDescr,
  setTitle,
  notice,
  locales,
  type ValType,
  getData
} from '@/function';
import { ref } from 'vue';

setTitle();
notice();

const black = ref<ValType[] | null>(null);
(async () => {
  black.value = await getData();
})();
</script>

<template>
  <div v-if="black" id="tab1" class="mdui-m-l-3 mdui-m-r-3 mdui-m-t-1">
    <div v-if="black.length !== 0" v-for="val in black" :key="val.uuid">
      <div v-if="val.status" class="mdui-card mdui-hoverable mdui-m-b-2 mdui-container">
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
          <div class="mdui-card-content" v-html="handleDescr(val.descr)"></div>
          <table v-if="val.imgs.length > 0" :width="val.imgs.length >= 2 ? '100%' : '70%'">
            <tr>
              <td>
                <a :href="val.imgs[0]" target="_blank"
                  ><img class="mdui-img-rounded mdui-img-fluid mdui-col-xs-6" :src="val.imgs[0]"
                /></a>
              </td>

              <td v-if="val.imgs.length >= 2">
                <a :href="val.imgs[1]" target="_blank"
                  ><img class="mdui-img-rounded mdui-img-fluid mdui-col-xs-6" :src="val.imgs[1]"
                /></a>
              </td>
            </tr>
          </table> </router-link
        ><br />
        <div class="mdui-card-header-subtitle">{{ locales.time }}{{ val.date }}</div>
      </div>
    </div>
    <div v-else class="mdui-text-center mdui-center" style="font-weight: 500">
      <strong>{{ locales.dataEmpty }}</strong>
    </div>
  </div>

  <div v-else class="mdui-text-center mdui-center" style="font-weight: 500">
    <strong>{{ locales.loading }}</strong>
  </div>
</template>
