<?php
$title = '登录';
require(__DIR__ . '/header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <form>
        <div class="mdui-text-center mdui-typo mdui-text-color-blue-600">
            <h2><strong><i class="mdui-icon material-icons">sentiment_neutral</i></strong>
                <br>登录 - Login
            </h2>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">contact_mail</i>
            <label class="mdui-textfield-label">邮箱</label>
            <input class="mdui-textfield-input" type="text" id="hcb_name" maxlength="30" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">lock</i>
            <label class="mdui-textfield-label">密码</label>
            <input class="mdui-textfield-input" type="password" id="hcb_password" maxlength="40" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">beenhere</i>
            <label class="mdui-textfield-label">验证码</label>
            <input class="mdui-textfield-input" type="text" id="hcb_verify" autocomplete="off" />
            <img id="captchaimgImg" style="cursor:pointer;position: absolute;top: 3px;right: 0px;" src="/captchaimg" onclick="javascript:this.src='/captchaimg'" align="absmiddle">
        </div>
        <div class="mdui-textfield">
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" type="submit"
                onclick="doLogin()">登录</button>
            <label><small>没有账号?<a href="/register" class="mdui-text-color-pink-a100">点击注册</a></small></label>
        </div>
    </form>
</div>

<?php require(__DIR__ . '/footer.php'); ?>

</body>

</html>