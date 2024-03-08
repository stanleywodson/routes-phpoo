<?php

namespace App\core;

class Router
{
	public static function run()
	{
		try {
			$routerRegistered = new RoutersFilter;
			$router = $routerRegistered->get();

			$controller = new Controller;
			$controller->call($router);
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
