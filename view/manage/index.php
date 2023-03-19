<?php
$title = '罗盘中驱';
$subtitle = '管理';
require(__DIR__ . '../../header.php');
?>

<div class="mdui-card mdui-hoverable mdui-m-b-5 mdui-m-t-5 mdui-container mdui-center">
    <div class="mdui-text-color-yellow-a700">
        <strong><i class="mdui-icon material-icons">event_available</i>使用须知</strong>
    </div>
    <div>
        <p>欢迎使用<?php echo $WEB_INFO["webtitle"]; ?>  由WeiYi制作 <a href="" class="mdui-text-color-blue" target="_blank">个人→</a></p>
        <p>请勿使用本系统从事任何非法活动</p>
        <p>作者概不负责</p>
    </div>
    <br>
    <table class="mdui-table mdui-table-hoverable">
        <tbody>
            <tr>
                <td><strong>系统</strong></td>
                <td>
                    <?php
                    $os = explode(" ", php_uname());
                    echo $os[0] . "(" . ('/' == DIRECTORY_SEPARATOR ? $os[2] : $os[1]) . ")";
                    ?>
                </td>
            </tr>
            <tr>
                <td><strong>PHP版本</strong></td>
                <td>
                    <?php echo PHP_VERSION ?>
                </td>
            </tr>
            <tr>
                <td><strong>读写权限</strong></td>
                <td>
                    <?php echo (is_readable('index.php') ? '<span style="color: green;">可读</span>' : '<span style="color: red;">不可读</span>') . ' ' . (is_writable('index.php') ? '<span style="color: green;">可写</span>' : '<span style="color: red;">不可写</span>') ?>
                </td>
            </tr>
            <tr>
                <td><strong>解释引擎</strong></td>
                <td>
                    <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
                </td>
            </tr>
            <tr>
                <td><strong>Core版本</strong></td>
                <td>
                    <?php echo HCB_INFO_VERSION; ?>
                </td>
            </tr>
        </tbody>
    </table>    
    <br>
    <li><strong>接口数据</strong></li>
    <table class="mdui-table mdui-table-hoverable">
        <tbody>
            <tr>
                <td>总计调用</td>
                <td>
                    <?php echo $DATA['call']['total']; ?>
                </td>
            </tr>
            <tr>
                <td>今日调用</td>
                <td>
                    <?php echo $DATA['call']['today']; ?>
                </td>
            </tr>
            <tr>
                <td>昨日调用</td>
                <td>
                    <?php echo $DATA['call']['yesterday']; ?>
                </td>
            </tr>
            <tr>
                <td>升降趋势</td>
                <td>
                    <?php echo "<span style=\"color:" . ($DATA['call']['today'] > $DATA['call']['yesterday'] ? "#33FF00\">↑" : "#FF0033\">↓") . floor($DATA['call']['today'] - $DATA['call']['yesterday']) . "%</span>"; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <li><strong>平台数据</strong></li>
    <table class="mdui-table mdui-table-hoverable">
        <tbody>
            <tr>
                <td>总计记录</td>
                <td>
                    <?php echo $DATA['record']['total']; ?>
                </td>
            </tr>
            <tr>
                <td>过审记录</td>
                <td>
                    <?php echo $DATA['record']['pass']; ?>
                </td>
            </tr>
            <tr>
                <td>其它记录</td>
                <td>
                    <?php echo $DATA['record']['total'] - $DATA['record']['pass']; ?>
                </td>
            </tr>
            <tr>
                <td>注册用户</td>
                <td>
                    <?php echo $DATA['account']; ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
</div>

<?php require(__DIR__ . '../../footer.php'); ?>

</body>

</html>