<?php
$title = '用户列表';
$subtitle = '管理';
require(__DIR__ . '../../header.php');
?>


<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-filed-container mdui-center">
    <div style="overflow: scroll;max-height: 700px;" class="mdui-list" id="chatWindow">
        <button class="mdui-btn mdui-color-theme mdui-ripple" mdui-dialog="{target: '#userAdd'}">添加账号</button>
        <br><br>
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th><small>ID</small></th>
                    <th><small>名字</small></th>
                    <th><small>邮箱</small></th>
                    <th><small>电话</small></th>
                    <th><small>QQ</small></th>
                    <th><small>IP</small></th>
                    <th><small>头像</small></th>
                    <th><small>权限</small></th>
                    <th><small>注册时间</small></th>
                    <? if ($VERIFY['opgroup'] == 4): ?>
                    <th><small>操作</small></th>
                    <? endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($DATA as $val):
                    $imgsHtml = "<a href=\"$value\" target=\"_blank\"><img class=\"mdui-img-rounded mdui-img-fluid\" width=\"100px\" src=\"https://q.qlogo.cn/headimg_dl?dst_uin={$val['qq']}&spec=100\" /></a>";
                    ?>

                    <tr">
                        <td><? echo $val['id']; ?></td>
                        <td><? echo $val['name']; ?></td>
                        <td><? echo $val['email']; ?></td>
                        <td><? echo $val['phone']; ?></td>
                        <td><? echo $val['qq']; ?></td>
                        <td><? echo $val['ip']; ?></td>
                        <td><? echo $imgsHtml; ?></td>
                        <td><? echo opgroupHatColor($val['opgroup']); ?></td>
                        <td><? echo $val['reg_date']; ?></td>
                        
                        <? if ($VERIFY['opgroup'] == 4): ?>
                        <td>
                            <? if ($val['opgroup'] != 4): ?>
                            <button class="mdui-btn mdui-color-blue mdui-ripple" onclick="userUpdate(this)">更新</button>
                            <button class="mdui-btn mdui-color-deep-orange mdui-ripple"
                                onclick="userDelete(this)">删除</button>
                            <? endif; ?>
                        </td>
                        <? endif; ?>
                    </tr>
                    <? unset($imgsHtml);
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <br>
</div>

<div class="mdui-dialog" id="userAdd">
    <div class="mdui-dialog-content">
        <div class="mdui-dialog-title">添加账号</div>
        <div>
            <br>
            <label class="mdui-textfield-label">账号权限</label>
            <select class="mdui-select" id="hcb_opgroup" mdui-select>
                <option value="1">普通-仅发布</option>
                <option value="2">审核</option>
                <option value="3">管理</option>
                <option value="-1">封禁</option>
            </select>
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">account_circle</i>
            <label class="mdui-textfield-label">名字</label>
            <input class="mdui-textfield-input" type="text" id="hcb_name" required maxlength="20" autocomplete="off" />
        </div>
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">lock</i>
            <label class="mdui-textfield-label">密码</label>
            <input class="mdui-textfield-input" type="password" id="hcb_password" required maxlength="40" autocomplete="off" />
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
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">add_location</i>
            <label class="mdui-textfield-label">ip</label>
            <input class="mdui-textfield-input" type="text" id="hcb_ip" required maxlength="30" autocomplete="off" />
        </div>        
    <div class="mdui-dialog-actions">
        <button class="mdui-btn mdui-ripple" mdui-dialog-close>取消</button>
        <button class="mdui-btn mdui-ripple" mdui-dialog-confirm onclick="userAdd()">确定</button>
    </div>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

<script>
</script>

</body>

</html>