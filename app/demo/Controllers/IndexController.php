<?php

class IndexController extends Controller
{
    public function index()
    {
        $datas = self::$db -> fetchAll(PageIndexModel);
        self::setViewCustomData($datas);
        self::loadView('index.php');
    }


    public function record()
    {
        $data = self::$db->fetch(PageRecordModel, [self::$val]);
        self::setViewCustomData($data);
        self::loadView('record.php');
    }


    public function query()
    {
        $data = !empty(self::$val) ? self::$db->fetchAll(PageQueryModel, ['%' . self::$val . '%']) : null;
        self::setViewCustomData([$data, self::$val]);
        self::loadView('query.php');
    }


    public function account()
    {
        $data = self::$db->fetch(PageAccountModel, [self::$val]);
        self::setViewCustomData($data);
        self::loadView('account.php');
    }


    public function about()
    {
        self::loadView('about.php');
    }


    public function error404()
    {
        self::loadView('404.php');
    }



    public function login()
    {
        !self::$data['VERIFY'] || location('/manage/person');
        self::loadView('login.php');
    }

    public function loginout()
    {
        unset($_SESSION['hcb_login']);
        location('/');
    }

    public function register()
    {
        !self::$data['VERIFY'] || location('/manage/person');
        self::loadView('register.php');
    }

    public function chat()
    {
        $data = self::$db->fetchall(PageChatModel);
        self::setViewCustomData($data);
        self::loadView('chat.php');
    }

    public function doc()
    {
        $data = self::$db->fetchall(PageChatModel);
        self::setViewCustomData($data);
        self::loadView('doc.php');
    }

    public function activation() {

        $rows = self::$db->fetchAll(PageActivationCheck, [self::$val]);
        if (count($rows) > 0 && !self::$data['VERIFY']) {        
            self::$db->exec(PageActivationExec, [self::$val]);
            self::loadView('activation.php');
        } else {
            location('/');
        }
    }

    public function captchaimg()
    {            
        captchaimgSpawn(4, 100, 30);
    }

    public function init() {
        $sql = "CREATE TABLE hcb_record (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            uuid VARCHAR(256) NOT NULL PRIMARY KEY,
            plate VARCHAR(10) NOT NULL DEFAULT 'qq',
            idkey VARCHAR(40) NOT NULL,
            descr TEXT NOT NULL,
            level INT(1) NOT NULL DEFAULT 1,
            phone VARCHAR(20),
            imgs TEXT,
            release_account VARCHAR(20) NOT NULL,
            examine_account VARCHAR(20),
            state VARCHAR(10) NOT NULL DEFAULT 'unknown',
            isdelete VARCHAR(10) NOT NULL DEFAULT 'no',
            reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";

        // echo self::$db->exec($sql);

        $sql = "CREATE TABLE hcb_account (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20) NOT NULL PRIMARY KEY,
            password VARCHAR(40) NOT NULL,
            email VARCHAR(30) NOT NULL PRIMARY KEY,
            phone VARCHAR(20) NOT NULL,
            qq VARCHAR(20) NOT NULL,
            idcard VARCHAR(20) NOT NULL,
            named VARCHAR(10) NOT NULL,
            opgroup INT(1) NOT NULL DEFAULT 1,
            ip VARCHAR(40) NOT NULL,
            isdelete VARCHAR(10) NOT NULL DEFAULT 'no',
            reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";

        // echo self::$db->exec($sql);

        $sql = "CREATE TABLE hcb_chat (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20) NOT NULL,
            qq VARCHAR(20) NOT NULL,
            opgroup INT(1) NOT NULL DEFAULT 1,
            chat TEXT,
            isdelete VARCHAR(10) NOT NULL DEFAULT 'no',
            reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";

        // echo self::$db->exec($sql);

        $sql = "CREATE TABLE hcb_sets (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            set_key VARCHAR(256) NOT NULL,
            set_val TEXT,
            set_type VARCHAR(256)
        )";

        // echo self::$db->exec($sql);
        // $sqls = "INSERT INTO hcb_sets(set_key, set_val, set_type) VALUES(?, ?, ?)";
        // self::$db->exec($sqls, ['weburl', '']);

/*         $rows = self::$db->fetchAll("SELECT * FROM hcb_record2");
        foreach ($rows as $val) {
            if ($val['isdelete'] == "no") {
                $state = 'pass';
            } else {
                $state = 'unknown';
            }
            echo self::$db->exec("INSERT INTO hcb_record(uuid, plate, idkey, descr, level, phone, imgs, release_account, examine_account, state, isdelete, reg_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                $val['uuid'], $val['plate'], $val['idkey'], $val['descr'], intval($val['level']), $val['phone'], $val['imgs'], 'weiyi', 'weiyi', $val['state'], $val['isdelete'], $val['reg_date'],
            ]);
            unset($state);
        } */

//生成主页下排列信息内容
//构造基础函数先
/* function ReadFileList($dir, $sort = SORT_DESC)
{
    $info = opendir($dir);
    $result = [];
    while (($file = readdir($info)) !== false) {
        if ($file != "." and $file != "..") {
            Array_push($result, $file);
        }
    }
    closedir($info);
    return $result;
}

function ArrayReverse($array)
{
    $arrayNum = count($array);
    $newArray = [];
    for ($i = $arrayNum; $i > 0; $i--) {
        Array_push($newArray, $array[$i - 1]);
    }
    return $newArray;
}
function uuidGet() {
    $chars = md5(uniqid(mt_rand(), true));  
    $uuid = substr ( $chars, 0, 8 ) . '-'
            . substr ( $chars, 8, 4 ) . '-' 
            . substr ( $chars, 12, 4 ) . '-'
            . substr ( $chars, 16, 4 ) . '-'
            . substr ( $chars, 20, 12 );  
    return $uuid;
}
$dataPath = "../data";
$dataList = ArrayReverse(ReadFileList($dataPath));

        foreach($dataList as $val) {
            include_once(HCB_DATA_PATH . "/" . $val . "/info.php");
            $uuid = uuidGet();
            if (gettype($imgs) == 'array') {
                $imgs2 = ''; */
                // foreach($imgs as $value) {
                    // $imgs2 = $imgs2 . $value;
                // }
                // $imgs = $imgs2;
            // }

            // $ctime = date('Y-m-d H:i:s', $ctime);
            // $sql = "INSERT INTO hcb_record (uuid, idkey, descr, imgs, reg_date)
            // -- VALUES ('{$uuid}', '{$qq}', '{$descr}', '{$imgs}', '{$ctime}')";
            // echo self::$db->exec($sql);
        // }
    }

}