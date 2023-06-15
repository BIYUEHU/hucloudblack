<?php
$title = '站点设置';
$subtitle = '管理';
require(__DIR__ . '../../header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <form>
        <div class="mdui-card-header mdui-row">
            <img class="mdui-card-header-avatar" src="/favicon.ico" />
            <strong>
                <h1 class="mdui-card-header-title">更改设置</h1>
            </strong>
        </div>
        <p>基础信息</p>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点URL</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" setval="weburl" value="<?php echo $WEB_INFO['weburl']; ?>" autocomplete="off" />
        </div>
        <?php $url = (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        if ($WEB_INFO['weburl'] != $url): ?>
            <div class="mdui-chip">
                <span class="mdui-chip-icon mdui-color-red">
                    <i class="mdui-icon material-icons">priority_high</i>
                </span>
                与当前站点URL不一致
                <span class="mdui-chip-title mdui-text-color-red"><strong>
                    <? echo $url; ?>
                </strong></span>
            </div>
        <? endif; ?>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点标题</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" setval="webtitle"
                value="<? echo $WEB_INFO['webtitle']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点描述</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" setval="webdescr"
                value="<? echo $WEB_INFO['webdescr']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点关键词</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" setval="keywords"
                value="<? echo $WEB_INFO['keywords']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点图标</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" setval="favicon" value="<? echo $WEB_INFO['favicon']; ?>" />
            <img width="100px" src="<? echo $WEB_INFO['favicon']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站长</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" setval="author" autocomplete="off" value="<? echo $WEB_INFO['author']; ?>" />
        </div>
        <br>
        <p>网站配置</p>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面头部代码</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="9000" type="text" placeholder="放置于head块内的最后" id="hcb_sets" setval="codeHead" autocomplete="off" ><?php echo $WEB_INFO['codeHead']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面尾部代码</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="9000" type="text" placeholder="放置于body块内的最后" id="hcb_sets" setval="codeFoot" autocomplete="off" ><?php echo $WEB_INFO['codeFoot']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">弹窗公告</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="5000" type="text" placeholder="不写不弹出" id="hcb_sets" setval="open" autocomplete="off" ><?php echo $WEB_INFO['open']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">赞助信息</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="5000" type="text" placeholder="用于关于页面" id="hcb_sets" setval="sponsor" autocomplete="off" ><?php echo $WEB_INFO['sponsor']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">联系方式信息</label>
            <textarea class="mdui-textfield-input" required rows="3" maxlength="900" type="text" placeholder="用于关于页面" id="hcb_sets" setval="contact" autocomplete="off" ><?php echo $WEB_INFO['contact']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <button onclick="webset()" class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">确定</button>
        </div>
    </form>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>