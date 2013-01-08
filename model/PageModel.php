<?php
class Page_Model extends CV_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Test_Array()
	{
		return $this->db->select('SELECT * FROM user');
	}
}