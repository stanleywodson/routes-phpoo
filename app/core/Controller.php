<?php

namespace App\core;

use Exception;

class Controller
{
	public function call(string $router)
	{
		if (!str_contains($router, '@')) {
			throw new Exception('A rota está registrada com o formato errado');
		}

		list($controller, $method) = explode('@', $router);

		$controllerNamespace = "App\\controllers\\{$controller}";
		if (!class_exists($controllerNamespace)) {
			throw new Exception('A classe controller não existe');
		}

		$controller = new $controllerNamespace;
		
		if (!method_exists($controller, $method)) {
			throw new Exception('O método não existe');
		}

		$params = new ControllerParams;
		$params = $params->get($router);
		return $controller->$method($params);
	}
}
