<?php

function statement()
{
    consolelog("`
    .----------------.  .----------------.  .----------------.    .----------------.  .----------------. 
    | .--------------. || .--------------. || .--------------. |  | .--------------. || .--------------. |
    | | _____  _____ | || |  _________   | || |     _____    | |  | |  ____  ____  | || |     _____    | |
    | ||_   _||_   _|| || | |_   ___  |  | || |    |_   _|   | |  | | |_  _||_  _| | || |    |_   _|   | |
    | |  | | /\ | |  | || |   | |_  \_|  | || |      | |     | |  | |   \ \  / /   | || |      | |     | |
    | |  | |/  \| |  | || |   |  _|  _   | || |      | |     | |  | |    \ \/ /    | || |      | |     | |
    | |  |   /\   |  | || |  _| |___/ |  | || |     _| |_    | |  | |    _|  |_    | || |     _| |_    | |
    | |  |__/  \__|  | || | |_________|  | || |    |_____|   | |  | |   |______|   | || |    |_____|   | |
    | |              | || |              | || |              | |  | |              | || |              | |
    | '--------------' || '--------------' || '--------------' |  | '--------------' || '--------------' |
    '----------------'  '----------------'  '----------------'    '----------------'  '----------------' 
    `");

    consolelog('`%c韦！一切神圣的存在！合共国小王子！打倒一切反动势力誓死效忠韦！`, `color:red; background:black; font-size:20px;`');
    consolelog('`%c世界是肮脏的！韦是清澈的！见证是高贵的！`, `color:red; background:black; font-size:20px;`');
    consolelog('`%c欲征服世界，必先建立韦武卍帝国！`, `color:red; background:black; font-size:20px;`');
    consolelog('`%c向韦元首、韦同志、韦总统、韦主席致以最高的敬意卍！`, `color:red; background:black; font-size:20px;`');
    consolelog('`%c卍-> 韦是希望！韦是未来！韦是宇宙！ <-卍`, `color:red; background:black; font-size:20px;`');
}

function captchaimgSpawn($num, $width, $height)
{
    session_start();

    $Code = '';
    for ($i = 0; $i < $num; $i++) {
        $Code .= mt_rand(0, 9);
    }

    // 将生成的验证码写入session
    $_SESSION['captchaimg_num'] = $Code;

    // 设置头部
    header("Content-type: image/png");

    // 创建图像（宽度,高度）
    $img = imagecreate($width, $height);

    //创建颜色 （创建的图像，R，G，B）
    $GrayColor = imagecolorallocate($img, 230, 230, 230);
    $BlackColor = imagecolorallocate($img, 0, 0, 0);
    $BrColor = imagecolorallocate($img, 52, 52, 52);

    //填充背景（创建的图像，图像的坐标x，图像的坐标y，颜色值）
    imagefill($img, 0, 0, $GrayColor);

    //设置边框
    imagerectangle($img, 0, 0, $width - 1, $height - 1, $BrColor);

    //随机绘制两条虚线 五个黑色，五个淡灰色
    $style = array($BlackColor, $BlackColor, $BlackColor, $BlackColor, $BlackColor, $GrayColor, $GrayColor, $GrayColor, $GrayColor, $GrayColor);
    imagesetstyle($img, $style);
    imageline($img, 0, mt_rand(0, $height), $width, mt_rand(0, $height), IMG_COLOR_STYLED);
    imageline($img, 0, mt_rand(0, $height), $width, mt_rand(0, $height), IMG_COLOR_STYLED);

    //随机生成干扰的点
    for ($i = 0; $i < 200; $i++) {
        $PointColor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imagesetpixel($img, mt_rand(0, $width), mt_rand(0, $height), $PointColor);
    }

    //将验证码随机显示
    for ($i = 0; $i < $num; $i++) {
        $x = ($i * $width / $num) + mt_rand(5, 12);
        $y = mt_rand(5, 10);
        imagestring($img, 7, $x, $y, substr($Code, $i, 1), $BlackColor);
    }

    //输出图像
    imagepng($img);
    //结束图像
    imagedestroy($img);
}
