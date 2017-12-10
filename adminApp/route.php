<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::get([
	'login'  => 'index/Login/login',
	'admin'  => 'index/Admin/admin',
	'logout' => 'index/Admin/logout',
	'getMsg' => 'index/Admin/getMsg',
]);
Route::post([
	'logining' => 'index/Login/logining',
	'add'      =>'index/Admin/add',
	'cut'      => 'index/Admin/cut',
	'change'   => 'index/Admin/change',
	'upload'   => 'index/Admin/upload',
]);
