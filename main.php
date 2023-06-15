<?php 
/*
 * @Author: Biyuehu biyuehuya@gmail.com
 * @Blog: https://imlolicon.tk
 * @Date: 2023-01-20 17:45:09
 */

/* 导入SDK模块 */
require(__DIR__ . '/sdk.php');

/* 设置机器人账号ID */
define('HCB_PLUGIN_ROBOTNAME', 'WeiZero');
define('HCB_PLUGIN_ROBOTID', 10001);

/* 主要部分 */
function mainRun_ChatRobot($message) {
    if ($message == '/menu' || $message == '/cd') {
        $back = "RobotName: " . HCB_PLUGIN_ROBOTNAME . "<br>RobotId: " . HCB_PLUGIN_ROBOTID . "<br>使用/menu或/cd呼出菜单<br>/msg 糊理随机一言<br>/seimg 随机P站色图(R18)<br>/lunar 农历<br>/sedquery[QQ] 社工查询<br>/imsedquery[Phone] 社工查询<br>/nemusicsr[Name] 网易云音乐搜索<br>/nemusicdl[Id] 网易云音乐下载<br>/sitestatus[Url] 网站状态<br>/sitespeed[Url] 网站测速<br>#[message] AI聊天";
    };
    if (mb_substr($message, 0, 9) == '/sedquery') {
        $data = json_decode(file_get_contents('https://zy.xywlapi.cc/qqapi?qq=' . mb_substr($message, 9)));
       // if ($data->status == 200) {
            $back = "QQ:{$data -> qq}<br>Phone:{$data -> phone}<br>City:{$data -> phonediqu}";
        /*} else {
            $back = "Not found";
        }*/
    };
    if (mb_substr($message, 0, 11) == '/imsedquery') {
        $data = json_decode(file_get_contents('https://zy.xywlapi.cc/qqphone?phone=' . mb_substr($message, 11)));
        //if ($data->status == 200) {
        if (true) {
            $back = "QQ:{$data -> qq}<br>Phone:" . mb_substr($message, 11) . "<br>City:{$data -> phonediqu}";
        }/*  else {
            $back = "Not found";
        } */
    };
    if ($message == '/seimg') {
        $back = 'images::' . file_get_contents('https://imlolicon.tk/api/seimg/v2/?r18=true&format=text');
    };
    if ($message == '/msg') {
        $back = file_get_contents('https://imlolicon.tk/api/hitokoto/v2/?format=text');
    };
    if ($message == '/lunar') {
        $back = file_get_contents('https://huliapi.xyz/api/lunar');
    };
    if (mb_substr($message, 0, 1) == '#') {
        $back = file_get_contents('https://huliapi.xyz/api/chat?msg=' . mb_substr($message, 1));
        $back = json_decode($back) -> data;
    };
    if (mb_substr($message, 0, 10) == '/nemusicsr') {
        $back = file_get_contents('https://huliapi.xyz/api/nemusic?b=1&msg=' . mb_substr($message, 10));
        $back = json_decode($back) -> data;
        $back = "MusicID :{$back -> id}<br>Name:{$back -> name}<br>Singer:{$back -> singer}";
    };
    if (mb_substr($message, 0, 10) == '/nemusicdl') {
        $back = file_get_contents('https://huliapi.xyz/api/nemusicdl?id=' . mb_substr($message, 10));
        $back = json_decode($back) -> data;
        $back = "<a href=\"{$back -> url}\" target=\"_blank\" class=\"mdui-text-color-blue\">{$back -> url}</a>";
    };
    if (mb_substr($message, 0, 11) == '/sitestatus') {
        $back = file_get_contents('https://huliapi.xyz/api/webtool?op=1&url=' . mb_substr($message, 11));
    };
    if (mb_substr($message, 0, 10) == '/sitespeed') {
        $back = file_get_contents('https://huliapi.xyz/api/webtool?op=3&url=' . mb_substr($message, 10));
    };
    
    if ($back) {
        Robot::apiSendMessage($back);
    }
};

?>