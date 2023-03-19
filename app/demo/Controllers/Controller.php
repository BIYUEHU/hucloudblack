<?php

class Controller
{
    public static $db;
    // 公共数据
    public static $data;
    // 地址参数
    protected static $val;
    // 统一状态码列表
    protected const errorCode = array(
        500 => "success",
        501 => "fail:parameter cannot be empty",
        502 => "fail:parameter error",
        503 => "fail:not found",
        507 => "fail:illegal string",
        508 => 'fail:database reject',
        509 => 'fail:bad request'
    );


    public function __construct()
    {
        // 实例化数据库
        self::$db = new Common();

        // 获取设置信息
        $web_info = self::getSetData('webinfo');

        // 设置公共数据
        self::$data = array(
            "WEB_INFO" => $web_info,
            "VERIFY" => self::verifyLogin()
        );

        // 地址参数
        self::$val = Route::$rulePar;

        // 防XSS攻击 对请求值进行正则判断
        if (Route::$antixss) {
            foreach ($_POST as $val) {
                preg_match_all('/<(.*?)\/?>/', $val, $pregData);
                empty($pregData[0]) || self::printResult(507);
            }
        }
    }


    /**
     * 设置视图自定义数据
     * @param any $data
     */
    public static function setViewCustomData($data)
    {
        self::$data['DATA'] = $data;
    }


    /**
     * 打印JSON数据结果
     * @param number $code 状态码,默认500
     * @param any $data
     * @param boolean $exit 是否终止运行,默认true
     */
    public static function printResult($code = 500, $data = null, $exit = true)
    {
        if (empty($data)) {
            $result = array(
                "code" => $code,
                "message" => self::errorCode[$code] ?? 0
            );
        } else {
            $result = array(
                "code" => $code,
                "message" => self::errorCode[$code] ?? 0,
                "data" => $data
            );
        }
        printJson($result);
        !$exit || exit();
    }


    /**
     * 获取数据库内的设置项数据
     * @param string $set_type 设置类型值
     * @return array 返回键值对数组
     */
    public static function getSetData($set_type) {
        $rows = self::$db->fetchAll(ControllerSetModel, [$set_type]);
        $result = array();
        foreach ($rows as $val) {
            $result[$val['set_key']] = $val['set_val'];
        }
        return $result;
    }


    /**
     * SESSION验证登录(管理员)
     * @return boolean 是否登录
     */
    public static function verifyLogin()
    {
        if (!empty($_SESSION['hcb_login']['name']) && !empty($_SESSION['hcb_login']['password'])) {
            $data = self::$db->fetch(HandelLoginModel, [$_SESSION['hcb_login']['name'], $_SESSION['hcb_login']['password']]);
            if (!empty($data)) {
                return $data;
            } else {
                unset($_SESSION['hcb_login']);
                return false;
            }
        } else {
            return false;
        }
    }


    /**
     * 载入视图(简化大量重复传参用的)
     */
    public function loadView($file) {
        loadView($file, self::$data);
    }


    /**
     * 发送Robot消息
     * @param string $data
     */
    public function robotSendMessage($data) {
        /* Robot执行区 */
        require_once(HCB_APP_PATH . '/plugins/robot/main.php');
        mainRun_ChatRobot($data);
    }
}