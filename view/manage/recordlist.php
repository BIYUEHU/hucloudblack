<?php
$title = '记录列表';
$subtitle = '管理';
require(__DIR__ . '../../header.php');
?>


<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-filed-container mdui-center">
    <div style="overflow: scroll;max-height: 700px;" class="mdui-list" id="chatWindow">
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th><small>id</small></th>
                    <th><small>UUID</small></th>
                    <th><small>用户平台</small></th>
                    <th><small>用户ID</small></th>
                    <th><small>记录描述</small></th>
                    <th><small>记录等级</small></th>
                    <th><small>手机号</small></th>
                    <th><small>图片</small></th>
                    <th><small>发布账号</small></th>
                    <th><small>操作账号</small></th>
                    <th><small>发布时间</small></th>
                    <th><small>操作</small></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($DATA as $val) :
                    $levelColor = levelColor($val['level']);

                    switch ($val['state']) {
                        case 'pass':
                            $trColor = '';
                            $op = "<button class=\"mdui-btn mdui-color-red mdui-ripple\" onclick=\"recordReject(this)\">拒绝</button>";
                            break;
                        case 'reject':
                            $trColor = 'mdui-color-red-200';
                            $op = "<button class=\"mdui-btn mdui-color-green mdui-ripple\" onclick=\"recordPass(this)\">通过</button>";
                            break;
                        default:
                            $trColor = 'mdui-color-yellow-200';
                            $op = "<button class=\"mdui-btn mdui-color-red mdui-ripple\" onclick=\"recordReject(this)\">驳回</button>
                            <button class=\"mdui-btn mdui-color-green mdui-ripple\" onclick=\"recordPass(this)\">通过</button>";
                    }

                    $imgsArray = explode(',', $val['imgs']);
                    foreach ($imgsArray as $value) {
                        $imgsHtml = $imgsHtml . "<a href=\"$value\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid\" width=\"100px\" src=\"{$value}\" /></a>";
                    }
                ?>

                <tr class="<? echo $trColor; ?>">
                    <td><? echo $val['id']; ?></td>
                    <td><? echo $val['uuid']; ?></td>
                    <td><? echo $val['plate']; ?></td>
                    <td><? echo $val['idkey']; ?></td>
                    <td><? echo $val['descr']; ?></td>
                    <td class="mdui-text-color-<? echo $levelColor; ?>">LV<? echo $val['level']; ?></td>
                    <td><? echo $val['phone']; ?></td>
                    <td><? echo $imgsHtml; ?></td>
                    <td><? echo $val['release_account']; ?></td>
                    <td><? echo $val['examine_account']; ?></td>
                    <td><? echo $val['reg_date']; ?></td>
                    <td><? echo $op; ?>
                        <button class="mdui-btn mdui-color-blue mdui-ripple" onclick="recordUpdate(this)">更新</button>
                        <button class="mdui-btn mdui-color-deep-orange mdui-ripple" onclick="recordDelete(this)">删除</button>
                    </td>
                </tr>
                <? unset($op, $imgsHtml);
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <br>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>