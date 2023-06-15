<?php
$title = '审核记录';
$subtitle = '用户';
require(__DIR__ . '../../header.php');
$unknowRecordNum = count($DATA);
?>


<div id="tab1" class="mdui-m-l-3 mdui-m-r-3 mdui-m-t-1">
    <br><li class="mdui-text-center">请先阅读<a href="/doc/#/join?id=%e5%ae%a1%e6%a0%b8%e8%ae%b0%e5%bd%95" class="mdui-text-color-green" target="_blank">《云黑使用准则-审核记录》</a></li><br>
    <?php if ($unknowRecordNum > 0): ?>
        
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-yellow"
        style="width:90%">  
        
        <h2><i class="mdui-icon material-icons mdui-text-color-purple">assignment</i>当前剩余数量: <? echo $unknowRecordNum - 1; ?></h2>
    </div>
    <? echo renderRecordCard($DATA[0], 1); ?>
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center">
        <br>
        <button class="mdui-btn mdui-color-red mdui-ripple" onclick="examineReject(<? echo $DATA[0]['id']; ?>)">驳回</button>
        <button class="mdui-btn mdui-color-green mdui-ripple" onclick="examinePass(<? echo $DATA[0]['id']; ?>)">通过</button>
        <br><br>
    </div>
    <? else: ?>
    <img class="mdui-center" style="max-width:800px;width:80%" src="/assets/img/weiyi/4.jpg">
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-theme"
        style="width:90%">  
        <h2><i class="mdui-icon material-icons mdui-text-color-purple">add_alert</i>呀,是勤劳的审核员！<br>现在韦武帝云黑的所有记录均已审核完毕，请稍后来看看</h2>
    </div>
    <? endif; ?>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>