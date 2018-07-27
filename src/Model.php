<?php

namespace mvc;

use mvc\library\DB;

abstract class Model {
	public $db;

	public function __construct($config)
	{
		$this->db = new DB($config);
	}
}