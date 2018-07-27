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

 	public $controller;

 	public function __construct()
 	{
 		$routes = require DIR_ROOT . '/config/routes.php';

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
 		$route = '#^' . $route . '$#';

 		$this->routes[$route] = $params;
 	}

 	public function match()
 	{
 		$url = $this->request->server['REQUEST_URI'];

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
 			$controller = 'app\\controllers\\' . ucfirst($this->params['controller']);

 			if(class_exists($this->controller)) {
 				$action = 'action' . ucfirst($this->params['action']);

 				if(method_exists($controller, $action)) {
 					$this->controller = new $controller();

 					$this->controller->$action();
 				} else {
 					throw new \Exception("Method '$action' in class '$controller' not found");
 				}
 			} else {
 				throw new \Exception("Class '$controller' not found");
 			}
 		}
 	}
}