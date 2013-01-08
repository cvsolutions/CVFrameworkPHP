<?php
class Test_Model extends CV_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Ciao_Mondo()
	{
		return array(1,2,3);
	}
}