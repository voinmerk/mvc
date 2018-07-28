<?php

namespace mvc\library;

/**
 * Class View
 * @package mvc\library
 */
class View
{
    private $template = array();

    private $engine;

    /**
     * View constructor.
     * @param $config
     * @throws \Exception
     */
	public function __construct($config)
	{
		$this->template = $config['template'];

        $this->template['params']['views'] = DIR_ROOT . '/themes/' . App::$config['theme'] . '/views/';

		$engineClass = 'mvc\\library\\template\\' . $this->template['engine'];

		if(class_exists($engineClass)) {
		    $this->engine = new $engineClass($this->template['params']);
        } else {
		    throw new \Exception("Class '$engineClass' not found!");
        }
	}

    /**
     * @param $view
     * @param array $args
     * @throws \Exception
     */
	public function render($view, $data = array())
    {
        extract($data, EXTR_SKIP);

        $viewFile = $this->template['params']['views'] . $view;
        
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            throw new \Exception("View file '$viewFile' not found!");
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function getLayout($data = array())
    {
        // Тут необходимо подгрузить Layout
        // Далее залить в него через рендер, подключаемую страницу
        // После выдать пользователю на экран
        
        return $data;
    }
}