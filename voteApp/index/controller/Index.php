<?php

namespace app\index\controller;
use app\index\model\Player;

/**
*参赛选手控制器 
*/
class Index extends \think\Controller
{
	
	/**
	 * getMsg 获取选手信息
	 * @date        2017-11-23
	 * @anotherdate 2017-11-23T00:18:57+0800
	 * @return      json                   json格式的选手信息
	 */
	public function getMsg()
	{
		$player = new Player;
		return $player->getMsg();
	}

	/**
	 * vote 用户投票
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T23:48:15+0800
	 * @return      type                   description
	 */
	function vote()
	{
		$player_id = $_GET['id'];
		$open_id = $_GET['open_id'];
		Player::vote_update($player_id, $open_id);
	}
}

?>