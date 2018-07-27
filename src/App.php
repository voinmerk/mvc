<?php

/**
 * App class
 */
class App extends \mvc\Application
{
	public function __construct($config)
	{
		static::$config = $config;

		static::$classMap = static::$config['classes'];
		static::$router = new \mvc\Router(static::$config['routes']);
	}
}

spl_autoload_register(['App', 'autoload'], true, true);