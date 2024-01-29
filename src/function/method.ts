import { locales, settings } from './locales';
import { plateColorList } from './config';
import type { ValType } from './types';
import mdui from 'mdui';

export async function getData(): Promise<ValType[]> {
  return (await fetch('/data.json')).json();
}

export function handleDescr(descr: string) {
  return descr.length <= 200 ? descr : /* html */ `${descr.slice(0, 200)}...<small>查看更多<small>`;
}

export function handleAvatarUrl(plate: string, identity: string) {
  return (
    {
      qq: `https://q.qlogo.cn/headimg_dl?dst_uin=${identity}&spec=100`,
      wechat: 'https://res.wx.qq.com/a/wx_fed/assets/res/NTI4MWU5.ico',
      bilibili: 'https://www.bilibili.com/favicon.ico',
      tieba: 'https://tieba.baidu.com/favicon.ico',
      weibo: 'https://weibo.com/favicon.ico',
      zhihu: 'https://static.zhihu.com/heifetz/favicon.ico',
      tiktok: 'https://lf1-cdn-tos.bytegoofy.com/goofy/ies/douyin_web/public/favicon.ico',
      kuaishou: 'https://www.kuaishou.com/favicon.ico',
      douban: 'https://www.douban.com/favicon.ico',
      redbook: 'https://www.xiaohongshu.com/favicon.ico'
    }[plate] ?? `${settings.dirs.imgs}/avatar.png`
  );
}

export function handlePlateText(plate: string) {
  return locales.plate[plate as keyof typeof locales.plate] ?? locales.plate.unknown;
}

export function handlePlateColor(plate: string) {
  return plateColorList[plate as keyof typeof plateColorList] ?? '';
}

export function handleLevelColor(level: number) {
  return ['mdui-color-light-blue-400', 'mdui-color-yellow-400', 'mdui-color-red-400'][
    level > 2 || level < 0 ? 0 : level
  ];
}

export async function queryRecord(uuid: string, target: keyof ValType = 'uuid') {
  return (await getData()).find((el) => el[target] === uuid);
}

export function setTitle(subtitle: string = '') {
  document.title = `${settings.webtitle}${subtitle ? ` - ${subtitle}` : ''}`;
}

export function notice() {
  const result = localStorage.getItem('notice');
  if (result && parseInt(result) === settings.notice.length) return;
  mdui.alert(settings.notice, locales.notice, undefined, {
    confirmText: /* html */ `<a href="/">${locales.known}</a>`
  });
  localStorage.setItem('notice', settings.notice.length.toString());
}
