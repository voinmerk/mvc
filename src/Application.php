<?php

namespace mvc;

/**
 * Application class
 */
class Application
{
	public static $classMap = [];

	public static $config = [];

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

		include $classFile;

		if(!class_exists($classFile, false) && !interface_exists($classFile, false) && !trait_exists($className, false)) {
			throw new \Exception("Unable to find '$className' in file: $classFile. Namespace messing?");
		}
	}

	public function run()
	{
		echo 'Run Run!';
	}
}