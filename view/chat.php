<?php
$title = '世界频道';
require(__DIR__ . '/header.php');
?>

<div class="mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <div class="mdui-text-center mdui-typo mdui-text-color-yellow-600">
        <h2><strong><i class="mdui-icon material-icons">chat</i></strong>
            <br>世界频道 - World
        </h2>
    </div>
    <div style="overflow: scroll;max-height: 700px;" class="mdui-list" id="chatWindow">
        <?php
        $times = 0;
        foreach ($DATA as $val):
            $times++;
            if ($times > 100) {
                break;
            }
            if ($val['name'] == $VERIFY['name'] && !empty($VERIFY['name'])):
                ?>

                <div class="mdui-card mdui-hoverable mdui-textfield mdui-text-right mdui-right">
                    <label class="mdui-textfield-label" style="font-size:160%">
                        <small><? echo explode(' ', $val['reg_date'])[0]; ?></small>
                    </label>
                    <span class="mdui-textfield-label" style="font-size:140%;color:black"><? echo $val['chat']; ?></span>
                    <span class="mdui-textfield-label mdui-text-color-light-green-a400" style="font-size:120%">
                        <strong>
                            <? echo explode(' ', $val['reg_date'])[1]; ?> <i class="mdui-icon material-icons mdui-text-color-light-green-a400">done_all</i>
                        </strong>
                    </span>
                </div>

                <? else: ?>

                <div class="mdui-card mdui-hoverable mdui-textfield">
                    <a class="mdui-icon mdui-bth" href="/account/<? echo $val['qq']; ?>" target="_blank">
                        <img class="mdui-chip-icon mdui-icon mdui-bth" src="https://q.qlogo.cn/headimg_dl?dst_uin=<? echo $val['qq']; ?>&spec=100" />
                    </a>
                    <label class="mdui-textfield-label" style="font-size:160%"><? echo $val['name'];?><small>
                            <? echo explode(' ', $val['reg_date'])[0]; ?>
                        </small></label>
                    <span class="mdui-textfield-label" style="font-size:140%;color:black"><? echo $val['chat']; ?></span>
                    <span class="mdui-textfield-label" style="font-size:120%">
                        <strong><? echo explode(' ', $val['reg_date'])[1]; ?></strong>
                    </span>
                </div>

                <? endif; endforeach; ?>
        <br>
    </div>
    <?php if ($VERIFY['opgroup'] >= 1 && $VERIFY['opgroup'] <= 4): ?>
    <div class="mdui-text-right">
        <div class="mdui-divider mdui-center"></div>
        <input class="mdui-textfield-input" width="200px" type="text" id="hcb_message" autocomplete="off" />
        <button placeholder="在这里输入消息内容" class="mdui-fab mdui-color-theme-accent mdui-ripple" onclick="chatSendMessage()">
            <i class="mdui-icon material-icons">send</i>
        </button>
        <button class="mdui-fab mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#chatSendImages'}">
            <i class="mdui-icon material-icons">images</i>
        </button>
    </div>
    <? endif; ?>
    <br>
</div>


<div class="mdui-dialog" id="chatSendImages">
    <div class="mdui-dialog-title">发送图片</div>
    <div class="mdui-dialog-content">
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">images</i>
            <input class="mdui-textfield-input" type="text" id="hcb_images" maxlength="1000"
                placeholder="图片直链(使用英文逗号隔开链接可一次性发送多张)" autocomplete="off" />
        </div>
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm onclick="chatSendImages()">发送</button>
    </div>
</div>

<?php require(__DIR__ . '/footer.php'); ?>

<script>
    $('#chatWindow').animate({
        scrollTop: '1000000000000px'
    }, 1);
</script>

</body>

</html>