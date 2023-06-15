<?php

/* 获取设置 */
define('ControllerSetModel', "SELECT * FROM hcb_set WHERE set_type = ?");

/* 主页 */
define('PageIndexModel', "SELECT * FROM hcb_record WHERE isdelete = 'no' AND state = 'pass' ORDER BY id DESC");

/* 记录页 */
define('PageRecordModel', "SELECT * FROM hcb_record WHERE uuid = ? AND isdelete = 'no' AND state = 'pass'");

/* 查询页 */
define('PageQueryModel', "SELECT * FROM hcb_record WHERE idkey LIKE ? AND isdelete = 'no' AND state = 'pass' ORDER BY id DESC");

/* 账号页 */
define('PageAccountModel', "SELECT * FROM hcb_account WHERE qq = ? AND isdelete = 'no'");

/* 聊天页 */
define('PageChatModel', "SELECT * FROM hcb_chat WHERE isdelete = 'no'");

/* 用户信息 */
define('PageManageExamineModel', "SELECT * FROM hcb_record WHERE state = 'unknown' AND isdelete = 'no'");

define('PageManagePersonReleaseModel', "SELECT * FROM hcb_record WHERE release_account = ? AND isdelete = 'no' ORDER BY id DESC");

define('PageManagePersonExamineModel', "SELECT * FROM hcb_record WHERE examine_account = ? AND isdelete = 'no' ORDER BY id DESC");

/* 记录 */
define('PageManageRecordlistModel', "SELECT * FROM hcb_record WHERE isdelete = 'no' ORDER BY id DESC");

define('PageManageRecordeditModel', "SELECT * FROM hcb_record WHERE id = ? AND isdelete = 'no'");

/* 用户 */
define('PageManageUserlistModel', "SELECT * FROM hcb_account WHERE isdelete = 'no' ORDER BY id DESC");

define('PageManageUsereditModel', "SELECT * FROM hcb_account WHERE id = ? AND isdelete = 'no'");

/* 激活入口 */
define('PageActivationCheck', "SELECT * FROM hcb_account WHERE uuid = ? AND opgroup = '-2' AND isdelete = 'no'");

define('PageActivationExec', "UPDATE hcb_account SET opgroup = '1' WHERE uuid = ? AND isdelete = 'no'");


/* 接口 */
define('PageApiIndexModel', "SELECT * FROM hcb_record WHERE idkey = ? AND state = 'pass' AND isdelete = 'no'");

define('HandelLoginModel', "SELECT * FROM hcb_account WHERE email = ? AND password = ? AND isdelete = 'no'");

define('HandelChatModel', "INSERT INTO hcb_chat(name, qq, opgroup, chat) VALUES(?, ?, ?, ?)");

define('HandelManageIndexModel', "SELECT COUNT(*) FROM hcb_record WHERE isdelete = 'no'");

define('HandelManageIndex2Model', "SELECT COUNT(*) FROM hcb_record WHERE isdelete = 'no' AND state = 'pass'");

define('HandelManageIndex3Model', "SELECT COUNT(*) FROM hcb_account WHERE isdelete = 'no'");

define('HandelManageReleaseCheckModel', "SELECT * FROM hcb_record WHERE plate = ? AND idkey = ? AND isdelete = 'no' AND state = 'pass'");

define('HandelManageReleaseExecModel', "INSERT INTO hcb_record(uuid, plate, idkey, descr, level, phone, imgs, release_account) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

define('HandelManageExaminePassModel', "UPDATE hcb_record SET state = 'pass', examine_account = ? WHERE id = ? AND state = 'unknown' AND isdelete = 'no'");

define('HandelManageExamineRejectModel', "UPDATE hcb_record SET state = 'reject', examine_account = ? WHERE id = ? AND state = 'unknown' AND isdelete = 'no'");

define('HandelManageWebsetModel', "UPDATE hcb_set SET set_val = ? WHERE set_key = ?");

define('HandelManageRecordlistDeleteModel', "UPDATE hcb_record SET isdelete = 'yes', examine_account = ? WHERE id = ? AND isdelete = 'no'");

define('HandelManageRecordlistPassModel', "UPDATE hcb_record SET state = 'pass', examine_account = ? WHERE id = ? AND isdelete = 'no'");

define('HandelManageRecordlistRejectModel', "UPDATE hcb_record SET state = 'reject', examine_account = ? WHERE id = ? AND isdelete = 'no'");

define('HandelManageRecordlistQueryModel', "SELECT * FROM hcb_record WHERE id = ? AND state = 'unknown' AND isdelete = 'no'");

define('HandelManageRecordeditModel', "UPDATE hcb_record SET uuid = ?, plate = ?, idkey = ?, descr = ?, level = ?, phone = ?, imgs = ?, examine_account = ? WHERE id = ?");

define('HandelManageUserlistCheckModel', "SELECT * FROM hcb_account WHERE (name = ? OR email = ?)  AND isdelete = 'no'");

define('HandelManageUserlistDeleteModel', "DELETE FROM hcb_account WHERE id = ?");

define('HandelManageUserlistAddModel', "INSERT INTO hcb_account(uuid, name, password, email, phone, qq, opgroup, ip) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

define('HandelManageUsereditModel', "UPDATE hcb_account SET name = ?, email = ?, phone = ?, qq = ?, opgroup = ? WHERE id = ? AND isdelete = 'no'");

