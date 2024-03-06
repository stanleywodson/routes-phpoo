<?php

namespace App\core;

use App\routes\Routes;
use App\support\RequestType;
use App\support\Uri;

class RoutersFilter
{
	private string $uri;
	private string $method;
	private array $routerRegistered;

	public function __construct()
	{
		$this->uri = Uri::get();
		$this->method = RequestType::get();
		$this->routerRegistered = Routes::get();
	}
	private function simpleRouter(): string
	{
		if(array_key_exists($this->uri, $this->routerRegistered[$this->method])){
			return $this->routerRegistered[$this->method][$this->uri];
		}

		return 'NotFoundController@index';
	}

	public function dynamicRouter($url)
	{
		$url = explode('/', $url);
		$controller = $url[0];
		$action = $url[1];
		$params = $url[2];
		$controller = 'App\controllers\\' . $controller . 'Controller';
		$controller = new $controller;
		$controller->$action($params);
	}

	public function get()
	{
		return $this->simpleRouter();
	}
}