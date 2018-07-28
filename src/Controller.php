<?php

namespace mvc;

use mvc\library\View;

/**
 * Class Controller
 * @package mvc
 */
abstract class Controller
{
    protected $layout;
    protected $view;

    /**
     * Controller constructor.
     */
	public function __construct()
    {
        $this->view = new View(array('template' => App::$config['template']));
    }
}