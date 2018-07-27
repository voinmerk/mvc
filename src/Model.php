<?php

namespace mvc;

use mvc\library\DB;

/**
 * Class Model
 * @package mvc
 */
abstract class Model {
	public $db;

    /**
     * Model constructor.
     * @param $config
     * @throws \Exception
     */
	public function __construct($config)
	{
		$this->db = new DB($config);
	}
}