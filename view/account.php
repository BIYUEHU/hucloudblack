<?php
$title = '个人空间';
require(__DIR__ . '/header.php');

$opgroup = opgroupHatColor($DATA['opgroup']);
?>

<?php if (!empty($DATA)):
    if ($DATA['opgroup'] < 1 || $DATA['opgroup'] > 4): ?>
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-red-a700"
        style="width:90%">
        <h2><i class="mdui-icon material-icons mdui-text-color-green">mood_bad</i>账号已被管理员永久封禁</h2>
    </div>
    <? endif; ?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center mdui-table mdui-table-hoverable">
    <img style="max-width: 500px; max-height: 500px;" src="https://q.qlogo.cn/headimg_dl?dst_uin=<? echo $DATA['qq']; ?>&spec=100" />
    <table class="mdui-table mdui-table-hoverable">
        <thead>
            <tr>
                <th><small>基础信息</small></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>账号ID: <?php echo $DATA['id']; ?></strong></td>
            </tr>
            <tr>
                <td><strong>账号权限: <?php echo $opgroup; ?></strong></td>
            </tr>
            <tr>
                <td><strong>账号名字: </strong>
                    <?php echo $DATA['name']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <?php if ($DATA['opgroup'] >= 1 && $DATA['opgroup'] <= 4): ?>
    <button class="mdui-btn mdui-btn-block mdui-color-theme mdui-ripple" mdui-dialog="{target: '#accountReport'}">举报账号</button>
    <? endif; ?>
    <br>
</div>

<div class="mdui-dialog" id="accountReport">
    <div class="mdui-dialog-title">举报账号</div>
    <div class="mdui-dialog-content">
        <div class="mdui-textfield">
            <input class="mdui-textfield-input" type="text" id="hcb_report" maxlength="1000"
                placeholder="填写你的举报理由" autocomplete="off" />
        </div>
    </div>
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm onclick="accountReport()">发送</button>
    </div>
</div>


<? else: ?>
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-black"
        style="width:90%">
        <h2><i class="mdui-icon material-icons mdui-text-black">mood_bad</i>账号不存在</h2>
    </div>
<? endif ?>


<?php require(__DIR__ . '/footer.php'); ?>

</body>

</html>