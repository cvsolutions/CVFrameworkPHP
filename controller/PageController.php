<?php
class Page extends CV_Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	private function Pippo($id)
	{
		echo $id;
	}
	
	public function Index()
	{
		$page = $this->Load_Model('Page');
		$data = $page->Test_Array();
		print_r($data);
		
		$test = $this->Load_Model('Test');
		$data = $test->Ciao_Mondo();
		// print_r($data);
		
		echo 'Home Page';
	}
	
	public function About()
	{
		// echo $this->Uri_Segments();
		// $this->Pippo($this->Uri_Segments(1));
		print_r($this->Uri_Segments());
		echo 'About Page';
	}
}