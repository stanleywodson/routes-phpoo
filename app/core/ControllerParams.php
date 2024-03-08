<?php

namespace App\core;

use App\routes\Routes;
use App\support\RequestType;
use App\support\Uri;

class ControllerParams
{
	public function get(string $router)
	{
		$uri = Uri::get();
		$routes = Routes::get();
		$RequiestMethod = RequestType::get();

		$router = array_search($router, $routes[$RequiestMethod]);

		$explodeUri = explode('/', $uri);
		$explodeRouter = explode('/', $router);

		$params = [];
		foreach ($explodeRouter as $index => $routerSegment) {
			if ($routerSegment !== $explodeUri[$index]) {
				$params[$index] = $explodeUri[$index];
			}
		}

		return array_values($params);
	}
}
