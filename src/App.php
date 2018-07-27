<?php

/**
 * App class
 */
class App extends \mvc\Application
{
    /**
     * App constructor.
     * @param $config
     */
	public function __construct($config)
	{
		static::$config = $config;

		static::$classMap = static::$config['classes'];
		static::$router = new \mvc\Router(static::$config['routes']);
	}
}

spl_autoload_register(array('App', 'autoload'), true, true);