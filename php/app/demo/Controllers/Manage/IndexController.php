<?php
class IndexController extends Controller
{
    public function release()
    {
        self::$data['VERIFY'] || location('/login');
        self::$data['VERIFY']['opgroup'] >= 1 && self::$data['VERIFY']['opgroup'] <= 4 && self::$data['VERIFY']['opgroup'] != 2 || Route::error(403);
        self::loadView('manage/release.php');
    }

    public function examine()
    {
        self::$data['VERIFY'] || location('/login');
        self::$data['VERIFY']['opgroup'] >= 2 && self::$data['VERIFY']['opgroup'] <= 4 || Route::error(403);
        $data = self::$db->fetchAll(PageManageExamineModel);
        self::setViewCustomData($data);
        self::loadView('manage/examine.php');
    }


    public function person()
    {
        self::$data['VERIFY'] || location('/login');
        self::$data['VERIFY']['opgroup'] >= -2 && self::$data['VERIFY']['opgroup'] <= 4 || Route::error(403);   
        $datas1 = self::$db->fetchAll(PageManagePersonReleaseModel, [self::$data['VERIFY']['name']]);
        $datas2 = self::$db->fetchAll(PageManagePersonExamineModel, [self::$data['VERIFY']['name']]);
        self::setViewCustomData([$datas1, $datas2]);
        self::loadView('manage/person.php');
    }


    /* Admin */
    public function index()
    {
        $data = [
            'account' => intval(self::$db->fetch(HandelManageIndex3Model)['COUNT(*)']),
            'record' => [
                'total' => intval(self::$db->fetch(HandelManageIndexModel)['COUNT(*)']),
                'pass' => intval(self::$db->fetch(HandelManageIndex2Model)['COUNT(*)'])
            ],
            'call' => [
                'total' => json_decode(file_get_contents('https://api.imlolicon.tk/api/stat?op=query&name=index_hcb')) -> data,
                'today' => json_decode(file_get_contents('https://api.imlolicon.tk/api/stat?op=queryday&name=index_hcb')) -> data,
                'yesterday' => json_decode(file_get_contents('https://api.imlolicon.tk/api/stat?op=queryday&par2=1&name=index_hcb')) -> data
            ]
        ];
        self::setViewCustomData($data);
        self::verifyAdmin('index.php');
    }


    public function webset()
    {
        self::verifyAdmin('webset.php');
    }


    public function recordlist()
    {
        $datas = self::$db -> fetchAll(PageManageRecordlistModel);
        self::setViewCustomData($datas);
        self::verifyAdmin('recordlist.php');
    }

    public function recordedit()
    {
        $data = self::$db -> fetch(PageManageRecordeditModel, [$_GET['id']]);
        self::setViewCustomData($data);
        self::verifyAdmin('recordedit.php');
    }


    public function userlist()
    {
        $data = self::$db -> fetchAll(PageManageUserlistModel);
        self::setViewCustomData($data);
        self::verifyAdmin('userlist.php');
    }

    public function useredit()
    {
        $data = self::$db -> fetch(PageManageUsereditModel, [$_GET['id']]);
        self::setViewCustomData($data);
        self::verifyAdmin('useredit.php');
    }


    public function websafe()
    {
        self::verifyAdmin('websafe.php');
    }

    private function verifyAdmin($file) {
        self::$data['VERIFY'] || location('/login');
        self::$data['VERIFY']['opgroup'] >= 3 && self::$data['VERIFY']['opgroup'] <= 4 || Route::error(403);
        self::loadView('manage/' . $file);
    }

}