<?php

function renderRecordCard($val, $mode = 0)
{
    if (empty($val)) {
        return "<div class=\"mdui-card mdui-hoverable mdui-m-b-2 mdui-container\">
            <div class=\"mdui-card-header mdui-row\">
                <img class=\"mdui-card-header-avatar\" src=\"/assets/img/avatar.png\" />
                <div class=\"mdui-card-header-title \">
                <h3>记录不存在</h3>
            </div>
        </div>
            <div class=\"mdui-card-content\">无</div>
            <div class=\"mdui-card-header-subtitle\"></div>
        </div>
    </div>";
    }

    $plate = $val['plate'];
    $idkey = $val['idkey'];
    $level = $val['level'];
    $phone = !empty($val['phone']) ? " 手机:{$val['phone']}" : '';
    $imgs = $val['imgs'];

    switch ($plate) {
        case 'qq':
            $avatarUrl = 'https://q.qlogo.cn/headimg_dl?dst_uin=' . $idkey . '&spec=100';
            $plate = '<span class="mdui-text-color-blue-300">QQ-混沌酒馆</span>';
            break;
        case 'bilibili':
            $avatarUrl = 'https://www.bilibili.com/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">哔哩哔哩-儿童圣厕</span>';
            break;
        case 'tieba':
            $avatarUrl = 'https://tieba.baidu.com/favicon.ico';
            $plate = '<span class="mdui-text-color-blue">百度贴吧-男厕所</span>';
            break;
        case 'weibo':
            $avatarUrl = 'https://weibo.com/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">微博-女厕所</span>';
            break;
        case 'zhihu':
            $avatarUrl = 'https://static.zhihu.com/heifetz/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">知乎-风景区厕所</span>';
            break;
        case 'tiktok':
            $avatarUrl = 'https://lf1-cdn-tos.bytegoofy.com/goofy/ies/douyin_web/public/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">抖音-牛魔鸡场</span>';
            break;
        case 'kuaishou':
            $avatarUrl = 'https://www.kuaishou.com/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">快手-黑化鸡窝</span>';
            break;
        case 'douban':
            $avatarUrl = 'https://www.douban.com/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">豆瓣-化粪池</span>';
            break;
        case 'redbook':
            $avatarUrl = 'https://www.xiaohongshu.com/favicon.ico';
            $plate = '<span class="mdui-text-color-pink-300">小红书-垃圾堆</span>';
            break;
        default:
            $avatarUrl = '/assets/img/avatar.png';
    }

    $levelColor = levelColor($level);

    $imgsHtml = '';
    switch ($mode) {
        case 1:
            if (!empty($imgs)) {
                $imgsArray = explode(',', $imgs);
                foreach ($imgsArray as $value) {
                    $imgsHtml = $imgsHtml . "<a href=\"$value\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid\" width=\"45%\" src=\"{$value}\" /></a>";
                }
            }

            return "<div class=\"mdui-card mdui-hoverable mdui-m-b-2 mdui-container\">
                <div class=\"mdui-card-header mdui-row\">
                    <img class=\"mdui-card-header-avatar\" src=\"{$avatarUrl}\" />
                    <div class=\"mdui-card-header-title \">
                        <h3>{$idkey} <span class=\"mdui-color-{$levelColor}\">LV{$level}</span>
                            <small><br>{$phone} {$plate}
                            </small>
                        </h3>
                    </div>
                </div>
                <div class=\"mdui-card-content\">{$val['descr']}</div>
                {$imgsHtml}<br>
                <div class=\"mdui-card-header-subtitle\">Time:{$val['reg_date']}</div>
            </div>";
        case 2:            
            $val['descr'] = mb_substr($val['descr'], 0, 50) . ' <small>查看更多<small>';

            return "<div class=\"mdui-card mdui-hoverable mdui-m-b-2 mdui-container\"><a href=\"/record/{$val['uuid']}\">
            <div class=\"mdui-card-header mdui-row\">
                <img class=\"mdui-card-header-avatar\" src=\"{$avatarUrl}\" />
                <div class=\"mdui-card-header-title \">
                    <h3>{$idkey} <span class=\"mdui-color-{$levelColor}\">LV{$level}</span>
                        <small><br>{$phone} {$plate}
                        </small>
                    </h3>
                </div>
            </div>
            <div class=\"mdui-card-content\">{$val['descr']}</div></a><br>
            <div class=\"mdui-card-header-subtitle\">Time:{$val['reg_date']}</div>
        </div>";
        default:
            $val['descr'] = mb_substr($val['descr'], 0, 50) . ' <small>查看更多<small>';
            if (!empty($imgs)) {
                $imgsArray = explode(',', $imgs);
                if (count($imgsArray) >= 2) {
                    $imgsHtml = "<table width=\"100%\"><tr><td><a href=\"$imgsArray[0]\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid mdui-col-xs-6\" src=\"{$imgsArray[0]}\" /></a></td>
                <td><a href=\"$imgsArray[1]\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid mdui-col-xs-6\" src=\"{$imgsArray[1]}\" /></a></td></tr></table>";
                } else {
                    $imgsHtml = "<table width=\"70%\"><tr><td><a href=\"$imgsArray[0]\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid mdui-col-xs-6\" src=\"{$imgsArray[0]}\" /></a></td></tr></table>";
                }
                $imgsHtml = $imgsHtml . "</tr></table>";
            }

            return "<div class=\"mdui-card mdui-hoverable mdui-m-b-2 mdui-container\"><a href=\"/record/{$val['uuid']}\">
            <div class=\"mdui-card-header mdui-row\">
                <img class=\"mdui-card-header-avatar\" src=\"{$avatarUrl}\" />
                <div class=\"mdui-card-header-title \">
                    <h3>{$idkey} <span class=\"mdui-color-{$levelColor}\">LV{$level}</span>
                        <small><br>{$phone} {$plate}
                        </small>
                    </h3>
                </div>
            </div>
            <div class=\"mdui-card-content\">{$val['descr']}</div>
            {$imgsHtml}</a><br>
            <div class=\"mdui-card-header-subtitle\">Time:{$val['reg_date']}</div>
        </div>";
    }
}


function levelColor($level)
{
    switch ($level) {
        case 2:
            return "yellow-400";
        case 3:
            return "red-400";
        default:
            return "light-blue-400";
    }
}


function opgroupHatColor($opgroup)
{
    switch ($opgroup) {
        case '1' | 1:
            return "<span class=\"mdui-color-teal mdui-text-color-white\">普通</span>";
        case '2' | 2:
            return "<span class=\"mdui-color-yellow mdui-text-color-white\">审核</span>";
        case '3' | 3:
            return "<span class=\"mdui-color-deep-orange mdui-text-color-white\">管理</span>";
        case '4' | 4:
            return "<span class=\"mdui-color-blue mdui-text-color-white\">超管</span>";
        case '-2' | -2:
            return "<span class=\"mdui-color-green mdui-text-color-white\">未激活</span>";
        default:
            return "<span class=\"mdui-color-grey mdui-text-color-white\">封禁</span>";
    }
}