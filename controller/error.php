<?php

class Error extends Controller
{
	public $message;
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->error = $this->message;
		$this->view->render('error/error');
	}
}