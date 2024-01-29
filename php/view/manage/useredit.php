<?php
$title = '用户编辑';
$subtitle = '管理';
require(__DIR__ . '../../header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <form>
        <div class="mdui-card-header mdui-row">
            <img class="mdui-card-header-avatar" src="/favicon.ico" />
            <strong>
                <h1 class="mdui-card-header-title">编辑用户</h1>
            </strong>
        </div>
        <br>    
        <div>
            <br>
            <label class="mdui-textfield-label">账号权限</label>
            <select class="mdui-select" id="hcb_opgroup" mdui-select>
                <option value="1" <?php echo $DATA['opgroup'] == 1 ? 'selected' : null; ?>>普通-仅发布</option>
                <option value="2" <?php echo $DATA['opgroup'] == 2 ? 'selected' : null; ?>>审核</option>
                <option value="3" <?php echo $DATA['opgroup'] == 3 ? 'selected' : null; ?>>管理</option>
                <option value="-1" <?php echo $DATA['opgroup'] < 1 || $DATA['opgroup'] > 4 ? 'selected' : null; ?>>封禁</option>
            </select>
        </div>    
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">account_circle</i>
            <label class="mdui-textfield-label">名字</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['name']; ?>" type="text" id="hcb_name" required maxlength="20" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">contact_mail</i>
            <label class="mdui-textfield-label">邮箱</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['email']; ?>" type="text" id="hcb_email" required maxlength="30" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">camera_front</i>
            <label class="mdui-textfield-label">手机号</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['phone']; ?>" maxlength="20" type="text" id="hcb_phone" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">branding_watermark</i>
            <label class="mdui-textfield-label">QQ</label>
            <input class="mdui-textfield-input" value="<?php echo $DATA['qq']; ?>" type="text" id="hcb_qq" required maxlength="20" autocomplete="off" />
        </div>    
        <div class="mdui-textfield">
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" onclick="userEdit()">
                确定
            </button>
        </div>
    </form>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>