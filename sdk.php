<?php
/*
 * @Author: Biyuehu biyuehuya@gmail.com
 * @Blog: http://imlolicon.tk
 * @Date: 2023-01-20 17:45:10
 */

class Robot extends Controller
{

    public static function apiSendMessage($message)
    {
        if (substr($message, 0, 8) == 'images::') {
            $message = substr($message, 8);
            preg_match_all('/\/(.*).(png|svg|jpg|jpeg|gif|ico)/', $message, $result);
            if (count($result[0]) > 0) {
                $arr = explode(',', $message);
                $message = '';
                foreach ($arr as $val) {
                    $message = $message . '<a href="' . $val . '"><img src="' . $val . '" style="max-width:600px;max-height:600px;"/></a>';
                }
            }
        }
        $res = self::$db->exec("INSERT INTO hcb_chat(name, qq, opgroup, chat) VALUES(?, ?, ?, ?)", [HCB_PLUGIN_ROBOTNAME, HCB_PLUGIN_ROBOTID, 3, $message]);
        if ($res > 0) {
            return true;
        } else {
            return false;
        }
    }

}
?>