<?php
$title = '注册';
require(__DIR__ . '/header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <form>
        <div class="mdui-text-center mdui-typo mdui-text-color-green-600">
            <h2><strong><i class="mdui-icon material-icons">sentiment_very_satisfied</i></strong>
                <br>注册 - Login
            </h2>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">account_circle</i>
            <label class="mdui-textfield-label">账号名字</label>
            <input class="mdui-textfield-input" type="text" id="hcb_name" required maxlength="20" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">lock</i>
            <label class="mdui-textfield-label">密码</label>
            <input class="mdui-textfield-input" type="password" id="hcb_password" required maxlength="40" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">lock</i>
            <label class="mdui-textfield-label">重新输入密码</label>
            <input class="mdui-textfield-input" type="password" id="hcb_password2" required maxlength="40" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">contact_mail</i>
            <label class="mdui-textfield-label">邮箱</label>
            <input class="mdui-textfield-input" type="text" id="hcb_email" required maxlength="30" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">camera_front</i>
            <label class="mdui-textfield-label">手机号</label>
            <input class="mdui-textfield-input" type="text" id="hcb_phone" required maxlength="20" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">branding_watermark</i>
            <label class="mdui-textfield-label">QQ</label>
            <input class="mdui-textfield-input" type="text" id="hcb_qq" required maxlength="20" autocomplete="off" />
        </div>
        <div class="mdui-text-center mdui-typo mdui-text-color-red-a400">
            请放心,敏感信息仅用于个人验证以及可靠性<br>韦一会对你的所有个人信息严加保密
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">beenhere</i>
            <label class="mdui-textfield-label">验证码</label>
            <input class="mdui-textfield-input" type="text" id="hcb_verify" autocomplete="off" />
            <img id="captchaimgImg" style="cursor:pointer;position: absolute;top: 3px;right: 0px;" src="/captchaimg" onclick="javascript:this.src='/captchaimg'" align="absmiddle">
        </div>
        <div class="mdui-textfield">
        <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" type="submit"
                onclick="doRegister()">注册</button>
            <label><small>已有账号?<a href="/login" class="mdui-text-color-pink-a100">点击登录</a></small></label>
        </div>
    </form>
</div>

<?php require(__DIR__ . '/footer.php'); ?>

</body>

</html>