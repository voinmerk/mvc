<?php

namespace mvc;

use mvc\library\Request;

/**
 * Class Router
 * @package mvc
 */
 class Router
 {
 	protected $routes = array();
 	protected $params = array();

 	private $request;

 	public $controller;

     /**
      * Router constructor.
      */
 	public function __construct()
 	{
 		$routes = require DIR_ROOT . '/config/routes.php';

 		$this->request = new Request();

 		foreach($routes as $key => $value) {
 			$route = explode('@', $value);

 			$val = array(
 				'controller' => $route[0],
 				'action' => $route[1]
            );

 			$this->add($key, $val);
 		}
 	}

     /**
      * @param $route
      * @param array $params
      */
 	public function add($route, $params = [])
 	{
 		$route = '#^' . $route . '$#';

 		$this->routes[$route] = $params;
 	}

     /**
      * @return bool
      */
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

     /**
      * @throws \Exception
      */
 	public function run()
 	{
 		if($this->match()) {
 			$controller = 'app\\controllers\\' . ucfirst($this->params['controller']);

 			if(class_exists($controller)) {
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