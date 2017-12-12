<?php

namespace app\index\model;

use \think\Model;

/**
* 参赛选手模型
*/
class Player extends Model
{

	/**
	 * add 添加选手信息
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T21:00:48+0800
	 * @param       array                   $arr post数据
	 * @return      int                   修改的信息数目
	 */
	public function add($arr)
	{
		$this->player_name = $arr['player_name'];
		$this->pic = $arr['pic'];
		$this->message = $arr['message'];
		$this->declaration = $arr['declaration'];
		$this->save();
		$msg = array("status_code" => 1, "msg" => "添加成功");
		print_r(json_encode($msg));
	}

	/**
	 * cut 删除选手信息
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T21:20:48+0800
	 * @param       array                   $arr post数据
	 * @return      type                   description
	 */
	public function cut($arr)
	{
		if ($this::get($arr['player_id'])) {
			$this::destroy($arr['player_id']);
			$msg = array("status_code" => 1, "msg" => "删除成功");	
		}else{
			$msg = array("status_code" => -2, "msg" => "要删除的数据不存在");
		}
		print_r(json_encode($msg));
	}

	/**
	 * change 修改选手信息
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T00:17:32+0800
	 * @param       array                   $arr post数据
	 * @return      type                          description
	 */
	public function change($arr)
	{
		if ($this::get($arr['player_id'])) {
			$this->update($arr);
			$msg = array("status_code" => 1, "msg" => "修改成功");	
		}else{
			$msg = array("status_code" => -2, "msg" => "要修改的数据不存在");
		}
		print_r(json_encode($msg));
	}

	/**
	 * getMsg 获取选手信息
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T00:18:57+0800
	 * @return      json                   json格式的选手信息
	 */
	public function getMsg()
	{
		$msg = $this->all();
		$msg = json_encode($msg);
		print_r(json_encode($msg));
	}

}

?>