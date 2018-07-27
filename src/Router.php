<?php

namespace mvc;

/**
  * Router class
  */
 class Router
 {
 	protected $routes = [];
 	protected $params = [];

 	public function __construct()
 	{
 		$routes = App::$config['routes'];

 		foreach($routes as $key => $value) {
 			$route = explode('@', $value);

 			$val = [
 				'controller' => $route[0],
 				'action' => $route[1]
 			];

 			$this->add($key, $val);
 		}
 	}

 	public function add($route, $params = [])
 	{
 		$route = '#^' . $route . '#';

 		$this->routes[$route] => $params;
 	}

 	public function match()
 	{

 	}

 	public function run()
 	{

 	}
}