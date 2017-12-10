<?php

namespace app\index\controller;

use app\index\model\Player;
use \think\Controller;
use app\index\model\AdminModel;

/**
* 后台管理
*/
class Admin extends Controller
{

	/**
	 * 构造函数
	 */
	function __construct()
	{
/*		if (!session('?ext_user')) {
			header(strtolower("location: login"));
			exit();
		}*/
		parent::__construct();
		$this->player = new Player();
		$this->data = $_POST;
	}
	
	/**
	 * admin 渲染后台管理界面
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:15:58+0800
	 * @return      function                   渲染界面
	 */
	public function admin()
	{
		return $this->fetch();
	}

	/**
	 * changepsw 渲染修改密码界面
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:16:19+0800
	 * @return      function                   渲染界面
	 */
	public function changepsw()
	{
	    return $this->fetch();
	}

	/**
	 * logout 退出登陆
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:49:16+0800
	 * @return      none                   NULL
	 */
	public function logout()
	{
		$admin = new AdminModel;
		$admin->logout();
		$this->redirect(config('web') . 'login');

		return NULL;
	}

	/**
	 * addAdmin 添加后台管理员
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T19:36:10+0800
	 */
/*	public function addAdmin()
	{
		$admin = new AdminModel;
		$user_name = $this->data['name'];
		$account = $this->data['account'];
		$password  = $this->data['password'];
		$admin->addAdmin($user_name, $account, $password);
	}*/
	
	/**
	 * add 添加选手信息
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T21:00:48+0800
	 * @return      type                   description
	 */
	public function add()
	{
		$result = $this->validate($this->data, 'Player.add');
		if (true !== $result) {
			$error_msg = array('status_code' => '0', 'error_msg' => $result);
			return json_encode($error_msg);
		}else{
			$this->player->add($this->data);
		}
	}

	/**
	 * cut 删除选手信息
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T21:20:48+0800
	 * @return      type                   description
	 */
	public function cut()
	{
		$result = $this->validate($this->data, 'Player.cut');
		if (true !== $result) {
			$error_msg = array('status_code' => '0', 'error_msg' => $result);
			return json_encode($error_msg);
		}else{
			$this->player->delete($this->data);
		}
	}

	/**
	 * change 修改选手信息
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T21:26:10+0800
	 * @return      type                   description
	 */
	public function change()
	{
		$result = $this->validate($this->data, 'Player.change');
		if (true !== $result) {
			$error_msg = array('status_code' => '0', 'error_msg' => $result);
			return json_encode($error_msg);
		}else{
			$this->player->change($this->data);
		}
	}

	/**
	 * getMsg 获取选手信息
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T00:18:57+0800
	 * @return      json                   json格式的选手信息
	 */
	public function getMsg()
	{
		return $this->player->getMsg();
	}

	/**
	 * [upload 图片上传]
	 * @date        2017-12-04
	 * @anotherdate 2017-12-04T23:50:55+0800
	 */
	public function upload()
	{
		$file = request()->file('file');
		if ($file) {
			$info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move('images/');
			if ($info) {
	            // 成功上传后 获取图片路径
	           	$data = array('url' => '/admin/images/'.$info->getSaveName());
	            print_r(json_encode($data));
	            return;
			}else{
	            // 上传失败获取错误信息
	            $result = $file->getError();
				$error_msg = array('status_code' => '0', 'error_msg' => $result);
				return json_encode($error_msg);
			}
		}else{
			$error_msg = array('status_code' => '0', 'error_msg' => '参数错误!');
			return json_encode($error_msg);
		}
	}
}

?>
