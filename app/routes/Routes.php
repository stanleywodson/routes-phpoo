<?php

namespace App\routes;

class Routes
{
	public static function get()
	{
		return [
			'get' => [
				//Home
				'/' => 'HomeController@index',

				//User
				'/user/[0-9]+' => 'UserController@show',
				'/user/edit/[0-9]+' => 'UserController@edit',
			],
			'post' => [
				'/user/update/[0-9]+' => 'UserController@update',
			],
		];
	}
}
