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
	private function simpleRouter()
	{
		if(array_key_exists($this->uri, $this->routerRegistered[$this->method])){
			return $this->routerRegistered[$this->method][$this->uri];
		}

		return null;
	}

	public function dynamicRouter()
	{
		foreach($this->routerRegistered[$this->method] as $index => $route){
			$regex = str_replace('/', '\/', ltrim($index, '/'));
			if ($index !== '/' && preg_match("/^$regex$/", trim($this->uri, '/'))) {
				$routerRegisteredFound = $route;
				break;
			} else {
				$routerRegisteredFound = null;
			}
		}
		return $routerRegisteredFound;
	}

	public function get()
	{
		$router = $this->simpleRouter();
		if($router){
			return $router;
		}

		$router = $this->dynamicRouter();
		if($router){
			return $router;
		}

		return 'NotFoundController@index';
	}
}