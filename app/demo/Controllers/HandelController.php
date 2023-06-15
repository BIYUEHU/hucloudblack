<?php

class HandelController extends Controller
{
    public function login()
    {
        // 验证是否登录
        !self::$data['VERIFY'] || self::printResult(509);
        // 根据记录的SESSION判断图片验证码是否正确
        $_SESSION['captchaimg_num'] == $_POST['verify'] || self::printResult(510);
        // 判断账号密码是否正确
        $data = self::$db->fetch(HandelLoginModel, [$_POST['name'], $_POST['password']]);
        !empty($data) || self::printResult(502);
        $_SESSION['hcb_login'] = array(
            "name" => $_POST['name'],
            "password" => $_POST['password'],
            "rand" => rand(0, 23333),
            "time" => time()
        );
        self::printResult();
    }

    public function register()
    {
        // 验证是否登录
        !self::$data['VERIFY'] || self::printResult(509);
        // 根据记录的SESSION判断图片验证码是否正确
        $_SESSION['captchaimg_num'] == $_POST['verify'] || self::printResult(510);
        // 判断账号密码是否正确
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $qq = $_POST['qq'];

        !empty($name) && !empty($password) && !empty($email) && !empty($phone) && !empty($qq) || self::printResult(501);

        preg_match_all('/(.*?)@(.*)/', $email, $match);
        preg_match_all('/1[34578](.*){9}$/', $phone, $match2);
        preg_match_all('/(.*){5,10}$/', $qq, $match3);
        !empty($match[1]) && !empty($match2[1]) && !empty($match3[1]) || self::printResult(502);
        // 3324656453
        // 17373522664

        $rows = self::$db->fetchAll(HandelManageUserlistCheckModel, [$name, $password]);
        count($rows) < 1 || self::printResult(508);
        
        $ip = getUserIp();
        $uuid = getUuid();
        $rowCount = self::$db->exec(HandelManageUserlistAddModel, [$uuid, $name, $password, $email, $phone, $qq, -2, $ip]);

        require_once(HCB_APP_PATH . '/plugins/email/main.php');
        sendMail($email, self::$data['WEB_INFO']['webtitle'] . ' 账号验证~', '<h2>您已通过邮箱' . $email . '注册了本站账号</h2><br><li>如若非本人注册请忽略此邮件</li><br><li>如若是本人注册请点击下方链接激活账号</li><br><a href="' . self::$data['WEB_INFO']['weburl'] . '/activation/' . $uuid . '">' . self::$data['WEB_INFO']['weburl'] . '/activation/' . $uuid . '</a><br>');
        $rowCount < 1 ? self::printResult(502) : self::printResult();
    }

    public function chat()
    {
        self::$data['VERIFY']['opgroup'] >= 1 && self::$data['VERIFY']['opgroup'] <= 4 || self::printResult(509);

        $value = trim($_POST['value']);
        $type = $_POST['type'];
        !empty($value) || self::printResult(501);

        switch ($type) {
            case 'images':
                preg_match_all('/\/(.*).(png|svg|jpg|jpeg|gif|ico)/', $value, $result);
                count($result[0]) > 0 || self::printResult(502);

                $arr = explode(',', $value);
                $value = '';
                foreach ($arr as $val) {
                    $value = $value . '<a href="' . $val . '"><img src="' . $val . '" style="max-width:600px;max-height:600px;"/></a>';
                }
                break;
        }

        $rowCount = self::$db->exec(HandelChatModel, [self::$data['VERIFY']['name'], self::$data['VERIFY']['qq'], intval(self::$data['VERIFY']['opgroup']), $value]);
        $rowCount > 0 || self::printResult(502);

        /* Robot执行区 */
        self::robotSendMessage($value);
        self::printResult();
    }
}