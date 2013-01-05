<?php

class Index extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load_model('home');
		$this->model->pippo();

		$this->view->msg = 'Welcome...';
		$this->view->render('index/index');
	}
}