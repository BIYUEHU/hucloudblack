<?php
require(__DIR__ . '/header.php');
?>



<div id="tab1" class="mdui-m-l-3 mdui-m-r-3 mdui-m-t-1">

<?php
if (!empty($DATA)) {
    foreach ($DATA as $val) {
        echo renderRecordCard($val, 3);
    }
}
?>
</div>

<div class="mdui-text-center mdui-center" style="font-weight: 500;"><strong>仅显示最新十条</strong></div>

<?php require(__DIR__ . '/footer.php'); ?>

<?php if (!isset($_COOKIE['open']) && $WEB_INFO['open']): ?>
    <div class="mdui-dialog" id="open">
        <div class="mdui-dialog-title mdui-text-color-green-a400"><strong>📄公告</strong></div>
        <div class="mdui-dialog-content"><?php echo $WEB_INFO['open']; ?></div>
        <div class="mdui-dialog-actions">
            <a href="/?open=true"><button class="mdui-btn mdui-ripple">我已知晓</button></a>
        </div>
    </div>
<script>
const openDialog = new mdui.Dialog('#open');
openDialog.open();
</script>
<? endif; ?>

</div>

</body>

</html>