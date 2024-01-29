/*
 * @Author: Hotaru biyuehuya@gmail.com
 * @Blog: https://hotaru.icu
 * @Date: 2024-01-29 10:43:33
 * @LastEditors: Hotaru biyuehuya@gmail.com
 * @LastEditTime: 2024-01-29 13:01:11
 */
import { createApp } from 'vue';
import VueClipboards from 'vue-clipboard2';
import '../node_modules/mdui/dist/css/mdui.css';
import '@/styles/index.css';
import App from '@/App.vue';
import router from '@/router';

const app = createApp(App);
app.use(router);
app.use(VueClipboards);
app.mount('#app');
