<?php
$title = '记录查询';
require(__DIR__ . '/header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-2 mdui-m-t-5 mdui-container">
    <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">
            请输入查询内容
        </label>
        <input class="mdui-textfield-input" value="<?php echo $DATA[1]; ?>" maxlength="40" type="text" id="hcb_query" />
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label">
        <button class="mdui-btn mdui-btn-raised mdui-btn-dense mdui-color-theme-accent mdui-ripple" onclick="location.href = `/query/${$('#hcb_query').val()}`;">
            搜索
        </button>
    </div>
</div>

<?php
if (!empty($DATA[0])) {
    foreach ($DATA[0] as $val) {
        echo renderRecordCard($val, 2);
    }
}

if (!empty($DATA[1]) && count($DATA[0]) < 1):
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-blue"
    style="width:90%">
    <h2><i class="mdui-icon material-icons mdui-text-color-yellow">mood_bad</i>什么也没有找到</h2>
</div>

<? endif; ?>


<?php require(__DIR__ . '/footer.php'); ?>
<script>
    function query() {
        
    }
</script>

</body>

</html>