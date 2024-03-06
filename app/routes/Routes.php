<?php

namespace App\routes;

class Routes
{
	public static function get()
	{
		return [
			'get' => [
				'/' => 'HomeController@index',
				'/user/[0-9]+' => 'UserController@show',
			],
			'post' => [],
		];
	}
}