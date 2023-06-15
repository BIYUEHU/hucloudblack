<?php

/* 主页 */
Route::get('/', 'IndexController@index');

/* 记录页 */
Route::get('/record/{val}', 'IndexController@record');

/* 查询页 */
Route::get('/query/{val}', 'IndexController@query');

/* 账号页 */
Route::get('/account/{val}', 'IndexController@account');

/* 关于页 */
Route::get('/about', 'IndexController@about');

/* 聊天页 */
Route::get('/chat', 'IndexController@chat');

/* 登录页 */
Route::get('/login', 'IndexController@login');

/* 注册页 */
Route::get('/register', 'IndexController@register');

/* 登出 */
Route::any('/loginout', 'IndexController@loginout');

/* 发布记录 */
Route::get('/manage/release', 'Manage/IndexController@release');

/* 审核记录 */
Route::get('/manage/examine', 'Manage/IndexController@examine');

/* 用户信息 */
Route::get('/manage/person', 'Manage/IndexController@person');

/* 罗盘中枢 */
Route::get('/manage/s/', 'Manage/IndexController@index');

/* 站点设置 */
Route::get('/manage/s/webset', 'Manage/IndexController@webset');

/* 记录两件套 */
Route::get('/manage/s/recordlist', 'Manage/IndexController@recordlist');

Route::get('/manage/s/recordedit', 'Manage/IndexController@recordedit');

/* 用户两件套 */
Route::get('/manage/s/userlist', 'Manage/IndexController@userlist');

Route::get('/manage/s/useredit', 'Manage/IndexController@useredit');

/* 站点安全 */
Route::get('/manage/s/websafe', 'Manage/IndexController@websafe');

/* 聊天 */
Route::post('/chat', 'HandelController@chat');

/* 登录 */
Route::post('/login', 'HandelController@login');

/* 注册 */
Route::post('/register', 'HandelController@register');

/* 发布记录 */
Route::post('/manage/release', 'Manage/HandelController@release');

/* 审核记录 */
Route::post('/manage/examine', 'Manage/HandelController@examine');

/* 站点设置 */
Route::post('/manage/s/webset', 'Manage/HandelController@webset', false);

/* 记录两件套 */
Route::post('/manage/s/recordlist', 'Manage/HandelController@recordlist');

Route::post('/manage/s/recordedit', 'Manage/HandelController@recordedit', false);

/* 用户两件套 */
Route::post('/manage/s/userlist', 'Manage/HandelController@userlist');

Route::post('/manage/s/useredit', 'Manage/HandelController@useredit');

/* 接口 */
Route::any('/api/v3/', 'Api/IndexController@index_v3');

/* 验证码图片 */
Route::any('/captchaimg', 'IndexController@captchaimg');

Route::any('/activation/{val}', 'IndexController@activation');

/* 渲染404错误页面 */
Route::error(404, 'IndexController@error404');
