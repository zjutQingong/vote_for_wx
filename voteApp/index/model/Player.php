<?php

namespace app\index\model;

use \think\Model;
use app\index\model\Voter;

/**
* 参赛选手模型
*/
class Player extends Model
{
	/**
	 * vote_update 票数更新
	 * @date        2017-11-22
	 * @anotherdate 2017-11-22T20:21:22+0800
	 * @param       int                   $player_id 选手标识
	 * @param       string                  $open_id   description
	 * @return      type                             description
	 */
	public function vote_update($player_id, $open_id)
	{	
		$voter = new voter;
		$result = $voter->get($open_id);
		// 判断访问者是否已投票。如果已投票，返回0
		if ($result) {
			return 0;
		}else{
			$vote_num = $this->getAttr('voter_number');
			$this->where('player_id', $player_id)->update(['voter_number'=> $vote_num + 1]);
			$voter->open_id = $open_id;
			$voter->save();
			return 1;
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
		$msg = $this->all();
		$msg = json_encode($msg);
		return $msg;
	}

}

?>