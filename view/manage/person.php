<?php
$title = '用户信息';
$subtitle = '用户';
require(__DIR__ . '../../header.php');

$opgroup = opgroupHatColor($VERIFY['opgroup']);

?>

<?php if (($VERIFY['opgroup'] < 1 || $VERIFY['opgroup'] > 4) && $VERIFY['opgroup'] != -2): ?>
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-red-a700"
        style="width:90%">
        <h2><i class="mdui-icon material-icons mdui-text-color-green">mood_bad</i>显然，你的账号已被管理员永久封禁</h2>
    </div>
<? endif; ?>

<?php if ($VERIFY['opgroup'] == -2): ?>
    <div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-2 mdui-container mdui-center mdui-text-center mdui-text-color-grey"
        style="width:90%">
        <h2><i class="mdui-icon material-icons mdui-text-color-green">mood_bad</i>当前账号未激活</h2>
    </div>
<? endif; ?>



<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <table class="mdui-table mdui-table-hoverable">
        <thead>
            <tr>
                <th><small>基础信息</small></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>账号ID: <?php echo $VERIFY['id']; ?></strong></td>
            </tr>
            <tr>
                <td><strong>账号权限: <?php echo $opgroup; ?></strong></td>
            </tr>
            <tr>
                <td><strong>账号名字: </strong>
                    <?php echo $VERIFY['name']; ?>
                </td>
            </tr>
            <tr>
                <td><strong>绑定邮箱: </strong><?php echo substr(explode('@', $VERIFY['email'])[0], 0, 3) . "*****@" . explode('@', $VERIFY['email'])[1]; ?></td>
            </tr>
            <tr>
                <td><strong>绑定手机号: </strong>+86 <?php echo substr($VERIFY['phone'], 0, 3) . "*****" . substr($VERIFY['phone'], -3); ?></td>
            </tr>
            <tr>
                <td><strong>绑定QQ: </strong>
                    <?php echo $VERIFY['qq']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <a href="/loginout"><button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple">退出登录</button></a>
    <br>
</div>

<?php if ($VERIFY['opgroup'] >= 1 && $VERIFY['opgroup'] <= 4 && $VERIFY['opgroup'] != 2): ?>
<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-1 mdui-container mdui-center" style="width:90%">
    <h4>发布历史</h4>
    <div style="overflow: scroll;max-height: 700px;" class="mdui-list" id="chatWindow">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th><small>UUID</small></th>
                    <th><small>用户平台</small></th>
                    <th><small>用户ID</small></th>
                    <th><small>记录描述</small></th>
                    <th><small>记录等级</small></th>
                    <th><small>手机号</small></th>
                    <th><small>图片</small></th>
                    <th><small>发布时间</small></th>
                    <th><small>审核员</small></th>
                    <th><small>状态</small></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($DATA[0] as $val) :
                        $levelColor = levelColor($val['level']);

                        switch ($val['state']) {
                            case 'pass':
                                $stateText = '已通过';
                                $trColor = '';
                                break;
                            case 'reject':
                                $stateText = '未通过';
                                $trColor = 'mdui-color-red-200';
                                break;
                            default:
                                $stateText = '待审核';
                                $trColor = 'mdui-color-yellow-200';
                        }

                        $imgsArray = explode(',', $val['imgs']);
                        foreach ($imgsArray as $value) {
                            $imgsHtml = $imgsHtml . "<a href=\"$value\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid\" width=\"100px\" src=\"{$value}\" /></a>";
                        }
                ?>
                <tr class="<? echo $trColor; ?>">
                    <td><? echo $val['uuid']; ?></td>
                    <td><? echo $val['plate']; ?></td>
                    <td><? echo $val['idkey']; ?></td>
                    <td><? echo $val['descr']; ?></td>
                    <td class="mdui-text-color-<? echo $levelColor; ?>">LV<? echo $val['level']; ?></td>
                    <td><? echo $val['phone']; ?></td>
                    <td><? echo $imgsHtml; ?></td>
                    <td><? echo $val['reg_date']; ?></td>
                    <td><? echo $val['examine_account']; ?></td>
                    <td><? echo $stateText; ?></td>
                </tr>
                <? unset($imgsHtml);
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <br>
</div>
<? endif; ?>


<?php if ($VERIFY['opgroup'] >= 2 && $VERIFY['opgroup'] <= 4): ?>
<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-1 mdui-container mdui-center" style="width:90%">
    <h4>审核历史</h4>
    <div style="overflow: scroll;max-height: 700px;" class="mdui-list" id="chatWindow">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th><small>UUID</small></th>
                    <th><small>用户平台</small></th>
                    <th><small>用户ID</small></th>
                    <th><small>发布时间</small></th>
                    <th><small>结果</small></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($DATA[1] as $val) :
                        $levelColor = levelColor($val['level']);

                        switch ($val['state']) {
                            case 'pass':
                                $stateText = '通过';
                                $trColor = '';
                                break;
                            case 'reject':
                                $stateText = '拒绝';
                                $trColor = 'mdui-color-red-200';
                                break;
                        }

                ?>
                <tr class="<? echo $trColor; ?>">
                    <td><? echo $val['uuid']; ?></td>
                    <td><? echo $val['plate']; ?></td>
                    <td><? echo $val['idkey']; ?></td>
                    <td><? echo $val['reg_date']; ?></td>
                    <td><? echo $stateText; ?></td>
                </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
</div>
<? endif; ?>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>