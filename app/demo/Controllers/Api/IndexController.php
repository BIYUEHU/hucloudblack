<?php

class IndexController extends Controller
{
    public function index_v3()
    {
        file_get_contents('https://api.imlolicon.tk/api/stat?name=index_hcb&op=write');

        $idkey = $_REQUEST['value'];
        !empty($idkey) || self::printResult(501);

        $row = self::$db -> fetch(PageApiIndexModel, [$idkey]);
        $status = empty($row) ? false : true;

        $imgs = empty($row['imgs']) ? null : explode(',', $row['imgs']);

        $data = array(
            'status' => $status,
            'uuid' => $row['uuid'],
            'plate' => $row['plate'],
            'idkey' => $row['idkey'],
            'descr' => addslashes($row['descr']),
            'level' => intval($row['level']),
            'phone' => intval($row['phone']),
            'imgs' => $imgs,
            'date' => $row['reg_date']
        );
        self::printResult(500, $data, true);
    }
}