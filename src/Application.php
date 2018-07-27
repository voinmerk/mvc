<?php

namespace mvc;

/**
 * Application class
 */
class Application
{
	public static $classMap = [];

	public static function autoload($className)
	{
		if(isset(static::$classMap[$className])) {
			$classFile = static::$classMap[$className];
		} else {
			return;
		}

		include $classFile;

		if(!class_exists($classFile, false) && !interface_exists($classFile, false) && !trait_exists($className, false)) {
			throw new \Exception("Unable to find '$className' in file: $classFile. Namespace messing?");
		}
	}
}