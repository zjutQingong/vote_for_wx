<?php

namespace app\common\validate;

use \think\Validate;


class Player extends Validate
{
	protected $rule =  [
		'account'     => 'require',
		'password'    => 'require',
		'player_id'   => 'require',
		'player_name' => 'require',
		'pic'         => 'require',
		'message'     => 'require',
		'declaration' => 'require',
	];

	protected $message =  [
		'account.require'     => '缺少参数[account]或参数错误!',
		'password.require'    => '缺少参数[password]或参数错误!',
		'player_id.require'   => '缺少参数[player_id]或参数错误!',
		'player_name.require' => '缺少参数[player_name]或参数错误!',
		'pic.require'         => '缺少参数[pic]或参数错误!',
		'message.require'     => '缺少参数[message]或参数错误!',
		'declaration.require' => '缺少参数[declaration]或参数错误!',
	];

	protected $scene = [
		'logining' => ['account', 'password'],
		'add'      => ['player_name', 'pic', 'message', 'declaration'],
		'cut'      => ['player_id'],
		'change'   => ['player_id', 'player_name', 'pic', 'message', 'declaration'],
	];
}

?>