import { locales } from './locales';

export const sidebar = [
  {
    path: '/',
    icon: 'home',
    name: locales.home,
    color: 'mdui-text-color-blue-200'
  },
  {
    path: '/query',
    icon: 'search',
    name: locales.query,
    color: 'mdui-text-color-orange-600'
  },
  {
    path: '/about',
    icon: 'error',
    name: locales.about,
    color: 'mdui-text-color-black-a100'
  }
];

export const plateColorList = {
  qq: 'mdui-text-color-blue-300',
  wechat: 'mdui-text-color-green-300',
  bilibili: 'mdui-text-color-pink-300',
  tieba: 'mdui-text-color-blue-300',
  weibo: 'mdui-text-color-yellow-400',
  zhihu: 'mdui-text-color-blue-700',
  tiktok: 'mdui-text-color-black-300',
  kuaishou: 'mdui-text-color-yellow-700',
  douban: 'mdui-text-color-green-200',
  redbook: 'mdui-text-color-red-300'
};

export const user = {
  name: 'huli',
  link: '/'
};
