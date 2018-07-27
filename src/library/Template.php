<?php

namespace mvc\library;

/**
 * Class Template
 * @package mvc\library
 */
class Template
{
	private $adaptor;

    /**
     * Template constructor.
     * @param $adaptor
     * @throws \Exception
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