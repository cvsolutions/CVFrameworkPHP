<?php

/**
 * CV_Controller
 * 
 * @author Concetto Vecchio
 * @copyright 2013
 * @version 1.0
 * @package PHP Framework
 * @license GNU General Public License 3 (http://www.gnu.org/licenses/)
 * @link http://cvsolutions.it
 * 
 */
class CV_Controller
{
	public $view;
	public $model;

	public function __construct()
	{
		$this->view = new Smarty();
		$this->view->template_dir = realpath(dirname(__FILE__) . '/../../view/');
		$this->view->compile_dir = realpath(dirname(__FILE__) . '/../../cache/');
	}

	/**
	 * Load_Model
	 * @param string $name Model file
	 * @throws Exception
	 * @return boolean
	 */
	public function Load_Model($name)
	{
		$path = realpath(dirname(__FILE__) . '/../../model');
		$class = sprintf('%sModel.php', $name);
		$fileName = $path . '/' . $class;

		if(is_readable($fileName))
		{
			include_once $fileName;
			$this->model = new $name();
			return true;
		}

		$error = sprintf('Unable to locate the model you have specified: %s.php', $fileName);
		throw new Exception($error);
	}
	
	/**
	 * params
	 * @param string $ke Segments
	 * @throws Exception
	 * @return unknown
	 */
	public function params($key = null)
	{
		$uri = $_SERVER['REQUEST_URI'];
		$params = explode('/', $uri);
		$request = array_filter($params);

		unset($request[1], $request[2]);
		$cnt = 1;
		
		foreach ($request as $value)
		{
			$data[$cnt] = $value;
			$cnt++;
		}
		
		if($key > count($data))
		{
			throw new Exception('URI Segments not Found');
		}
		
		// print_r($data);
		return $key > 0 ? $data[$key] : $data;
	}
}