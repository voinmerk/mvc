<?php

namespace mvc\library;

/**
 * Template class
 */
class Template
{
	private $adaptor;

	/**
	 * Constructor
	 *
	 * @param	string	$adaptor
	 *
 	*/
	public function __construct($adaptor) {
		$class = 'mvc\\library\\template\\' . $adaptor;

		if (class_exists($class)) {
			$this->adaptor = new $class();
		} else {
			throw new \Exception('Error: Could not load template adaptor ' . $adaptor . '!');
		}
	}

	// Далее описываются функции (запросы) для генерации страниц
	// ...
}