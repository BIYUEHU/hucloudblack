<?php
if (!empty($_GET['open'])) {
    setcookie('open', 'ok', time() + 60*60*24);
    location('/');
}

require(__DIR__ . '/function.php');

$title = $title ? ' - ' . $title : '';
$subtitle = $subtitle ? ' - ' . $subtitle : '';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $WEB_INFO['webdescr']; ?>">
    <meta name="keywords" content="<?php echo $WEB_INFO['keywords']; ?>,<?php echo $WEB_INFO['webtitle']; ?>">
    <meta name="author" content="<?php echo $WEB_INFO['author']; ?>">
    <meta name="founder" content="<?php echo $WEB_INFO['webtitle']; ?>">
    <title>
        <?php echo $WEB_INFO['webtitle'] . $title; ?>
    </title>
    <link rel="shortcut icon" href="<?php echo $WEB_INFO['favicon']; ?>">
    <link rel="stylesheet" href="/assets/css/index.css" />
    <link rel="stylesheet" href="https://unpkg.com/mdui@1.0.2/dist/css/mdui.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <?php echo $WEB_INFO['codeHead']; ?>
</head>

<body 
    class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-green mdui-theme-accent-blue mdui-theme-layout-auto mdui-loaded">
    <!-- 标题栏 -->
    <header class="appbar mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#drawer'}">
                <i class="mdui-icon material-icons">menu</i>
            </span>
            <a href="/" class="mdui-typo-headline">
                <?php echo $WEB_INFO['webtitle'] . $subtitle; ?>
            </a>
            <div class="mdui-toolbar-spacer"></div>
            <a href="<?php echo empty($VERIFY['name']) ? '/login' : '/manage/person'; ?>">
                <div class="mdui-chip mdui-btn">
                    <img class="mdui-chip-icon"
                        src="<?php echo empty($VERIFY['qq']) ? '/assets/img/logo.png' : 'https://q.qlogo.cn/headimg_dl?dst_uin=' . $VERIFY['qq'] . '&spec=100'; ?>" />
                    <span class="mdui-chip-title">
                        <?php echo $VERIFY['name'] ?? '未登录'; ?>
                    </span>
                </div>
            </a>
            <a href="/query/" class="mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons">search</i>
            </a>
            <a mdui-menu="{target: '#menu1'}" class=" mdui-btn mdui-btn-icon">
                <i class="mdui-icon material-icons">more_vert</i>
            </a>
            <ul class="mdui-menu" id="menu1">
                <li class="mdui-menu-item">
                    <a href="/about" class="mdui-ripple">关于</a>
                </li>
                <?php if (!empty($VERIFY['name'])): ?>
                <li class="mdui-menu-item">
                    <a href="/loginout" class="mdui-ripple">登出</a>
                </li>
                <? endif; ?>
            </ul>
        </div>
    </header>

    <!-- 左边栏 -->
    <div class="mdui-drawer" id="drawer">
        <!-- 顶上卡片 -->
        <div class="mdui-card">
            <div class="mdui-card-media">
                <img src="/assets/img/card.jpg" />
            </div>
        </div>
        <ul class="mdui-list" mdui-collapse="{accordion: true}">
            <a href="/">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange-600">home</i>
                    <div class="mdui-list-item-content">主页</div>
                </li>
            </a>
            <a href="/about">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-pink-a100">error</i>
                    <div class="mdui-list-item-content">关于</div>
                </li>
            </a><!-- 

            <a href="/doc">
                <li class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue-600">cloud_done</i>
                    <div class="mdui-list-item-content">文档</div>
                </li>
            </a> -->

            <?php if (!$VERIFY): ?>
                <a href="/login">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green-a400">person</i>
                        <div class="mdui-list-item-content">登录</div>
                    </li>
                </a>
                <? endif; ?>    

            <?php if ($VERIFY): ?>                
<!--                 <a href="/chat">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green-600">chat_bubble</i>
                        <div class="mdui-list-item-content">世界频道</div>
                    </li>
                </a> -->

                <li class="mdui-subheader">用户</li>
                <?php if ($VERIFY['opgroup'] >= 1 && $VERIFY['opgroup'] <= 4 && $VERIFY['opgroup'] != 2): ?>
                    <a href="/manage/release">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-purple-a700">file_upload</i>
                            <div class="mdui-list-item-content">发布记录</div>
                        </li>
                    </a>
                    <? endif; ?>
                <?php if ($VERIFY['opgroup'] >= 2 && $VERIFY['opgroup'] <= 4): ?>
                    <a href="/manage/examine">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-yellow-a700">create</i>
                            <div class="mdui-list-item-content">审核记录</div>
                        </li>
                    </a>
                    <? endif; ?>
                <a href="/manage/person">
                    <li class="mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue-a400">person</i>
                        <div class="mdui-list-item-content">用户信息</div>
                    </li>
                </a>

                <?php if ($VERIFY['opgroup'] >= 3 && $VERIFY['opgroup'] <= 4): ?>
                    <li class="mdui-subheader">管理</li>
                    <a href="/manage/s/">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange-600">av_timer</i>
                            <div class="mdui-list-item-content">罗盘中枢</div>
                        </li>
                    </a>
                    <a href="/manage/s/webset">
                        <li class="mdui-list-item mdui-ripple">
                            <i
                                class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange-600">perm_data_setting</i>
                            <div class="mdui-list-item-content">站点设置</div>
                        </li>
                    </a>
                    <a href="/manage/s/recordlist">
                        <li class="mdui-list-item mdui-ripple">
                            <i
                                class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange-600">event_note</i>
                            <div class="mdui-list-item-content">记录列表</div>
                        </li>
                    </a>
                    <a href="/manage/s/userlist">
                        <li class="mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange-600">people</i>
                            <div class="mdui-list-item-content">账号列表</div>
                        </li>
                    </a>
                    <a href="/manage/s/websafe">
                        <li class="mdui-list-item mdui-ripple">
                            <i
                                class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange-600">bug_report</i>
                            <div class="mdui-list-item-content">站点安全</div>
                        </li>
                    </a>
                    <? endif; ?>
                <? endif; ?>
        </ul>
    </div>

    <main>
        <div class="mdui-container-fluid">