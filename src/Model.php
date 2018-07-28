<?php

namespace mvc;

use mvc\library\DB;

/**
 * Class Model
 * @package mvc
 */
abstract class Model {
	protected $db;

    /**
     * Model constructor.
     * @throws \Exception
     */
	public function __construct()
	{
		$this->db = new DB(App::$config['db']);
	}
}