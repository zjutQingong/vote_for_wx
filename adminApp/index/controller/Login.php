<?php

namespace app\index\controller;

use app\index\model\AdminModel;
use \think\Controller;

/**
* 登陆界面
*/
class Login extends Controller
{
	
	/**
	 * login 渲染登陆界面
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:38:04+0800
	 * @return      function                   渲染界面
	 */
	public function login()
	{
		return $this->fetch();
	}

	/**
	 * logining 登陆验证
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:40:05+0800
	 * @return      type                   description
	 */
	public function logining()
	{
		$account = input('account');
		$password = input('password');

		$result = $this->validate(['account' => $account, 'password' => $password,], 'Player.logining');
		if (true !== $result) {
			$error_msg = array('status_code' => '0', 'error_msg' => $result);
			return json_encode($error_msg);
		}else{
			$admin = new AdminModel;
			$check = $admin->login($account, $password);
			if ($check) {
				header(strtolower("location:". config("web") . "admin"));
	        	exit();
			}else{
				$this->error("用户名或密码错误", config("web") . "login");
			}
		}
	}
}

?>