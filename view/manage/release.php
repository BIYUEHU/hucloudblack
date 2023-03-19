<?php
$title = '发布记录';
$subtitle = '用户';
require(__DIR__ . '../../header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <!-- <form> -->
        <div class="mdui-card-header mdui-row">
            <img class="mdui-card-header-avatar" src="/favicon.ico" />
            <strong>
                <h1 class="mdui-card-header-title">发布新的记录</h1>
            </strong>
            <div class="mdui-card-header-subtitle">请正确填写所有信息</div>
        </div>
        <br><li>请先阅读<a href="/doc/#/join?id=%e5%8f%91%e5%b8%83%e8%ae%b0%e5%bd%95" class="mdui-text-color-green" target="_blank">《云黑使用准则-发布记录》</a></li>
        <div>
            <br>
            <label class="mdui-textfield-label">用户平台</label>
            <select class="mdui-select" id="hcb_plate" mdui-select>
                <option value="qq">QQ-混沌酒馆</option>
                <option value="bilibili">哔哩哔哩-儿童圣厕</option>
                <option value="tieba">百度贴吧-男厕所</option>
                <!-- <option value="weibo">微博-女厕所</option> -->
                <!-- <option value="zhihu">知乎-风景区厕所</option> -->
                <option value="tiktok">抖音-牛魔鸡场</option>
                <option value="kuaishou">快手-黑化鸡窝</option>
<!--                 <option value="douban">豆瓣-化粪池</option>
                <option value="redbook">小红书-垃圾堆</option>
                <option value="" disabled>推特-麦片哥</option>
                <option value="" disabled>电报-切尔诺贝利</option> -->
            </select>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">account_circle</i>
            <label class="mdui-textfield-label">用户ID</label>
            <input class="mdui-textfield-input" maxlength="40" type="text" id="hcb_idkey" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">记录描述</label>
            <textarea class="mdui-textfield-input" rows="5" maxlength="1000" type="text" id="hcb_descr" autocomplete="off" ></textarea>
        </div>
        <div class="mdui-textfield">
            <label class="mdui-textfield-label">记录等级</label>
            <label class="mdui-slider mdui-slider-discrete">
                <input type="range" id="hcb_level" step="1" min="1" max="3" />
            </label>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">camera_front</i>
            <label class="mdui-textfield-label">手机号</label>
            <input class="mdui-textfield-input" maxlength="20" type="text" id="hcb_phone" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">image</i>
            <label class="mdui-textfield-label">相关图片</label>
            <input class="mdui-textfield-input" type="text" maxlength="1000" id="hcb_imgs" placeholder="使用英文逗号,分隔多张图片直链" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#accountReport'}">
                发布
            </button>
        </div>
    <!-- </form> -->
</div>

<div class="mdui-dialog" id="accountReport">
    <div class="mdui-dialog-title">确定要发布吗?</div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm onclick="recordRelease()">确定</button>
    </div>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>