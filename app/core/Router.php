<?php

namespace App\core;

class Router
{
	public static function run()
	{
		$routerRegistered = new RoutersFilter;
		$router = $routerRegistered->get();

		dd($router);
	}
}