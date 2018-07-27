<?php

namespace mvc\library;

/**
 * Class View
 * @package mvc\library
 */
class View
{
    /**
     * View constructor.
     */
	function __construct()
	{
		
	}

    /**
     * @param $view
     * @param array $args
     * @throws \Exception
     */
	public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/App/Views/$view";
        
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }
}