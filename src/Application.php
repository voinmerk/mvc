<?php

namespace mvc;

/**
 * Application class
 */
class Application
{
	public static $router;
	
	public static $classMap = array();

	public static $config = array();

    /**
     * @param $className
     * @throws \Exception
     */
	public static function autoload($className)
	{
		if(isset(static::$classMap[$className])) {
			$classFile = static::$classMap[$className];
		} elseif (strpos($className, '\\') !== false) {
            $classFile = str_replace('\\', '/', $className) . '.php';

            if ($classFile === false || !is_file($classFile)) {
                return;
            }
		} else {
			echo $className;
			return;
		}

		require $classFile;

		if(!class_exists($classFile, false) && !interface_exists($classFile, false) && !trait_exists($className, false)) {
			throw new \Exception("Unable to find '$className' in file: $classFile. Namespace messing?");
		}
	}

	public function run()
	{
		echo 'Run Run!';
	}
}