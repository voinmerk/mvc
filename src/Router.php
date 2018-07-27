<?php

namespace mvc;

use mvc\library\Request;

/**
  * Router class
  */
 class Router
 {
 	protected $routes = [];
 	protected $params = [];

 	private $request;

 	public function __construct()
 	{
 		$routes = App::$config['routes'];

 		$this->request = new Request();

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
 		$url = trim($this->request['REQUEST_URI'], '/');

 		foreach ($this->routes as $route => $params) {
 			if(preg_match($route, $url, $matches)) {
 				$this->params = $params;

 				return true;
 			}
 		}

 		return false;
 	}

 	public function run()
 	{
 		if($this->match()) {
 			echo 'Match TRUE!';
 		}
 	}
}