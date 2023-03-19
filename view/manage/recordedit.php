<?php
$title = '记录编辑';
$subtitle = '管理';
require(__DIR__ . '../../header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <form>
        <div class="mdui-card-header mdui-row">
            <img class="mdui-card-header-avatar" src="/favicon.ico" />
            <strong>
                <h1 class="mdui-card-header-title">编辑记录</h1>
            </strong>
        </div>
        <div>
        <br>
            <label class="mdui-textfield-label">用户平台</label>
            <select class="mdui-select" id="hcb_plate" mdui-select>
                <option value="qq" <?php echo $DATA['plate'] == 'qq' ? 'selected' : null; ?>>QQ-混沌酒馆</option>
                <option value="bilibili" <?php echo $DATA['plate'] == 'bilibili' ? 'selected' : null; ?>>哔哩哔哩-儿童圣厕</option>
                <option value="tieba" <?php echo $DATA['plate'] == 'tieba' ? 'selected' : null; ?>>百度贴吧-男厕所</option>
<!--                 <option value="weibo" <?php echo $DATA['plate'] == 'weibo' ? 'selected' : null; ?>>微博-女厕所</option>
                <option value="zhihu" <?php echo $DATA['plate'] == 'zhihu' ? 'selected' : null; ?>>知乎-风景区厕所</option>
                <option value="tiktok" <?php echo $DATA['plate'] == 'tiktok' ? 'selected' : null; ?>>抖音-牛魔鸡场</option>
                <option value="kuaishou" <?php echo $DATA['plate'] == 'kuaishou' ? 'selected' : null; ?>>快手-黑化鸡窝</option>
                <option value="douban" <?php echo $DATA['plate'] == 'douban' ? 'selected' : null; ?>>豆瓣-化粪池</option>
                <option value="redbook" <?php echo $DATA['plate'] == 'redbook' ? 'selected' : null; ?>>小红书-垃圾堆</option>
                <option value="" disabled>推特-麦片哥</option>
                <option value="" disabled>电报-切尔诺贝利</option> -->
            </select>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">account_circle</i>
            <label class="mdui-textfield-label">用户ID</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['idkey']; ?>" required maxlength="40" type="text" id="hcb_idkey" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">记录描述</label>
            <textarea class="mdui-textfield-input" required rows="5" maxlength="1000" type="text" id="hcb_descr" autocomplete="off" ><?php echo $DATA['descr']; ?></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">记录等级</label>
            <label class="mdui-slider mdui-slider-discrete">
                <input type="range" value="<?php echo $DATA['level']; ?>" id="hcb_level" step="1" min="1" max="3" />
            </label>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">camera_front</i>
            <label class="mdui-textfield-label">手机号</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['phone']; ?>" maxlength="20" type="text" id="hcb_phone" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">image</i>
            <label class="mdui-textfield-label">相关图片</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['imgs']; ?>" type="text" maxlength="1000" id="hcb_imgs" placeholder="使用英文逗号,分隔多张图片直链" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" onclick="recordEdit()">
                确定
            </button>
        </div>
    </form>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>