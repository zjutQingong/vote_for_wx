<?php

namespace app\index\model;

use \think\Model;

/**
* 后台管理员模型
*/
class AdminModel extends Model
{
	
	/**
	 * addUser 添加后台管理员
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:31:00+0800
	 * @param       string                   $name     用户名称
	 * @param       string                   $account  账号
	 * @param       string                   $password 密码
	 */
	public function addAdmin($name, $account, $password)
	{
		$this->user_name = $name;
		$this->account = $account;
		$this->password  = hash('md5', $password);
		$this->save();
	}

	/**
	 * login 验证登陆
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:47:15+0800
	 * @param       string                   $account  账号
	 * @param       string                   $password 密码
	 * @return      bool                             true or false
	 */
	public function login($account, $password)
	{
		$data['account'] = $account;
		$data['password'] = hash('md5', $password);
		
		$user = $this->filed($data)->find();
		if ($user) {
			unset($user['password']);
			session("ext_user", $user);
			return true;
		}else{
			return false;
		}
	}

	/**
	 * logout 退出登陆
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:48:57+0800
	 * @return      none                   none
	 */
	public function logout()
	{
		session('ext_user', NULL);
		return ;
	}
}

?>