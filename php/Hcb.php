<?php
/*
 * @Author: Biyuehu biyuehuya@gmail.com
 * @Blog: http://imlolicon.tk
 * @Date: 2022-12-19 22:59:51
 */

namespace HuliMain;

final class Hcb
{
    public function run()
    {
        $this->_set_const();
        $this->_import_file();
        $this->_use_config();
        $this->_set_const_usr();
        $this->_init();
    }


    private function _set_const()
    {
        $path = str_replace('\\', '/', __FILE__);
        define('HCB_ROOT_PATH', dirname($path));

        /* Core */
        define('HCB_APP_PATH', HCB_ROOT_PATH . '/app');
        define('HCB_CORE_PATH', HCB_APP_PATH . '/core');
        define('HCB_DEMO_PATH', HCB_APP_PATH . '/demo');

        /* App */
        define('HCB_DEMO_CONTROLLER_PATH', HCB_DEMO_PATH . '/Controllers');
        define('HCB_DEMO_MODEL_PATH', HCB_DEMO_PATH . '/Models');
        define('HCB_DEMO_VIEW_PATH', HCB_ROOT_PATH . '/view');

        /* Root */
        define('HCB_CONFIG_PATH', HCB_ROOT_PATH . '/config');
        define('HCB_DATA_PATH', HCB_ROOT_PATH . '/data');
        define('HCB_PUBLIC_PATH', HCB_ROOT_PATH . '/public');
    }


    private function _import_file()
    {
        /* Core */
        /* 路由核心 */
        require(HCB_CORE_PATH . '/route.php');
        /* 数据库核心 */
        require(HCB_CORE_PATH . '/common.php');
        /* 核心公共函数 */
        require(HCB_CORE_PATH . '/func/function.php');

        /* App */
        /* 主控制器 */
        require(HCB_DEMO_CONTROLLER_PATH . '/Controller.php');
        /* 模型 */
        require(HCB_DEMO_MODEL_PATH . '/Models.php');
        /* 控制器核心函数 */
        require(HCB_DEMO_CONTROLLER_PATH . '/Method.php');
        /* 应用常量 */
        // require(HCB_APP_PATH . '/const.ini.php');
    }


    private function _set_const_usr()
    {
        /* Version */
        define('HCB_INFO_VERSION', 'V1.0');
    }


    private function _use_config()
    {
        $config = loadConfig('config.php');
        /* Debug */
        define('HCB_SET_DEBUG', $config['debug'] === true ? 'ON' : 'OFF');
        define('HCB_SET_DEBUG_MODE', $config['debug_mode']);
    }


    private function _init()
    {
        HCB_SET_DEBUG == 'ON' || error_reporting(0);
        ini_set('session.cookie_httponly', 1); // 设置防止xss攻击
        session_start(); // 开启session
        date_default_timezone_set('Asia/Shanghai'); // 设置时区

        require(HCB_APP_PATH . '/app.php');
    }
}

?>