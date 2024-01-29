<?php

class HandelController extends Controller
{
    public function release()
    {
        self::$data['VERIFY']['opgroup'] >= 1 && self::$data['VERIFY']['opgroup'] <= 4 && self::$data['VERIFY']['opgroup'] != 2 || self::printResult(509);

        $plate = $_POST['plate'];
        $idkey = $_POST['idkey'];
        $descr = $_POST['descr'];
        $level = intval($_POST['level']);
        !empty($plate) && !empty($idkey) && !empty($descr) && !empty($level) || self::printResult(501);

        $rows = self::$db->fetchAll(HandelManageReleaseCheckModel, [$plate, $idkey]);
        count($rows) < 1 || self::printResult(508);

        $imgs = $_POST['imgs'];
        if (!empty($imgs)) {
            preg_match_all('/\/(.*).(png|svg|jpg|jpeg|gif|ico)/', $imgs, $temp);
            count($temp[0]) > 0 || self::printResult(502);
        }
        $rowCount = self::$db->exec(HandelManageReleaseExecModel, 
        [getUuid(), $plate, $idkey, $descr, $level, $_POST['phone'], $imgs, self::$data['VERIFY']['name']]);
        $rowCount < 1 ? self::printResult(502) : self::printResult();
    }


    public function examine()
    {
        self::$data['VERIFY']['opgroup'] >= 2 && self::$data['VERIFY']['opgroup'] <= 4 || self::printResult(509);

        $id = $_POST['id'];
        $value = $_POST['value'];
        !empty($id) && !empty($value) || self::printResult(501);

        switch($value) {
            case 'pass':
                $sql = HandelManageRecordlistPassModel;
                break;
            default:
                $sql = HandelManageRecordlistRejectModel;
        }

        $row = self::$db->fetch(HandelManageRecordlistQueryModel, [$id]);
        $rowCount = self::$db->exec($sql, [self::$data['VERIFY']['name'], $id]);

        if (!empty($row)) {
            $uuid = $row['uuid'];
            $message = $value == 'pass' ? "有新的记录通过审核: {$uuid}" : "新的记录未能通过审核: {$uuid}";
            self::robotSendMessage($message);
        }
        $rowCount < 1 ? self::printResult(502) : self::printResult();
    }


    public function webset()
    {
        self::$data['VERIFY']['opgroup'] >= 3 && self::$data['VERIFY']['opgroup'] <= 4 || self::printResult(509);

        $rowCount = 0;
        foreach($_POST as $key => $val) {
            $rowCount = $rowCount + self::$db->exec(HandelManageWebsetModel, [$val, $key]);
        }
        // $rowCount < 1 ? self::printResult(502) : self::printResult();
        self::printResult();
    }


    public function recordlist()
    {
        self::$data['VERIFY']['opgroup'] >= 3 && self::$data['VERIFY']['opgroup'] <= 4 || self::printResult(509);

        $id = $_POST['id'];
        $value = $_POST['value'];
        !empty($id) && !empty($value) || self::printResult(501);

        switch($value) {
            case 'delete':
                $sql = HandelManageRecordlistDeleteModel;
                break;
            case 'pass':
                $sql = HandelManageRecordlistPassModel;
                break;
            default:
                $sql = HandelManageRecordlistRejectModel;
        }

        $row = self::$db->fetch(HandelManageRecordlistQueryModel, [$id]);
        $rowCount = self::$db->exec($sql, [self::$data['VERIFY']['name'], $id]);

        if (!empty($row)) {
            $uuid = $row['uuid'];
            $message = $value == 'pass' ? "有新的记录通过审核: {$uuid}" : "新的记录未能通过审核: {$uuid}";
            self::robotSendMessage($message);
        }
        $rowCount < 1 ? self::printResult(502) : self::printResult();
    }


    public function recordedit()
    {
        self::$data['VERIFY']['opgroup'] >= 3 && self::$data['VERIFY']['opgroup'] <= 4 || self::printResult(509);

        $id = $_POST['id'];
        $plate = $_POST['plate'];
        $idkey = $_POST['idkey'];
        $descr = $_POST['descr'];
        $level = intval($_POST['level']);
        !empty($id) && !empty($plate) && !empty($idkey) && !empty($descr) && !empty($level) || self::printResult(501);

        $imgs = $_POST['imgs'];
        if (!empty($imgs)) {
            preg_match_all('/\/(.*).(png|svg|jpg|jpeg|gif|ico)/', $imgs, $temp);
            count($temp[0]) > 0 || self::printResult(502);
        }
        $rowCount = self::$db->exec(HandelManageRecordeditModel,
        [getUuid(), $plate, $idkey, $descr, $level, $_POST['phone'], $imgs, self::$data['VERIFY']['name'], $id]);
        $rowCount === null ? self::printResult(502) : self::printResult();
    }

    public function userlist()
    {
        self::$data['VERIFY']['opgroup'] == 4 || self::printResult(509);    
        $value = $_POST['value'];

        switch($value) {
            case 'delete':
                $id = $_POST['id'];
                !empty($id) || self::printResult(501);
                $rowCount = self::$db->exec(HandelManageUserlistDeleteModel, [$id]);
                break;
            case 'add':
                $name = $_POST['name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $qq = intval($_POST['qq']);
                $opgroup = intval($_POST['opgroup']);
                $ip = $_POST['ip'];
                !empty($name) && !empty($password) && !empty($email) && !empty($phone) && !empty($qq) && !empty($opgroup) && !empty($ip) || self::printResult(501);

                preg_match_all('/(.*?)@(.*)/', $email, $match);
                !empty($match[1]) && count($phone) == 11 || self::printResult(502);

                $rows = self::$db->fetchAll(HandelManageUserlistCheckModel, [$name, $email]);
                count($rows) < 1 || self::printResult(508);

                $rowCount = self::$db->exec(HandelManageUserlistAddModel, [getUuid(), $name, $password, $email, $phone, $qq, $opgroup, $ip]);
                break;
        }

        $rowCount < 1 ? self::printResult(502) : self::printResult();
    }


    public function useredit()
    {
        self::$data['VERIFY']['opgroup'] == 4 || self::printResult(509);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $qq = intval($_POST['qq']);
        $opgroup = intval($_POST['opgroup']);
        !empty($id) && !empty($name) && !empty($email) && !empty($phone) && !empty($qq) && !empty($opgroup) || self::printResult(501);

        $rowCount = self::$db->exec(HandelManageUsereditModel,
        [$name, $email, $phone, $qq, $opgroup, $id]);
        $rowCount === null ? self::printResult(502) : self::printResult();
    }

}