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
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点URL</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets"  value="<?php echo $WEB_INFO['weburl']; ?>" autocomplete="off" />
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
            <input class="mdui-textfield-input" type="text" id="hcb_sets" test="aa"
                value="<? echo $WEB_INFO['webtitle']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点描述</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" 
                value="<? echo $WEB_INFO['webdescr']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点关键词</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets" 
                value="<? echo $WEB_INFO['keywords']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站点图标</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets2"  value="<? echo $WEB_INFO['favicon']; ?>" />
            <img width="100px" src="<? echo $WEB_INFO['favicon']; ?>" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">站长</label>
            <input class="mdui-textfield-input" type="text" id="hcb_sets"  autocomplete="off" value="<? echo $WEB_INFO['author']; ?>" />
        </div>
        <br>
        <p>设置</p>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面头部代码</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="9000" type="text" placeholder="放置于head块内的最后"  autocomplete="off" ><?php echo $WEB_INFO['codeHead']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">自定义页面尾部代码</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="9000" type="text" placeholder="放置于body块内的最后"  autocomplete="off" ><?php echo $WEB_INFO['codeFoot']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <button onclick="webset()" class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple">确定</button>
        </div>
    </form>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>