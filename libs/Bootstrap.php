<?php

/**
* Bootstrap
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Bootstrap
{
    /**
     * __construct
     * 
     * @access public
     *
     * @return mixed Value.
     */
    function __construct()
    {
    	$url = $this->segments();
		// print_r($url);

    	if(empty($url[0]))
    	{
    		require __ROOT__ . '/controller/index.php';
    		$controller = new Index();
    		$controller->index();
    		return false;
    	}

    	$filename = __ROOT__ . '/controller/' . $url[0] . '.php';

    	if(file_exists($filename))
    	{
    		require $filename;

    	} else {
    		throw new Exception('The page you requested was not found');
    	}

    	$controller = new $url[0];
    	$controller->load_model($url[0]);

    	if(isset($url[2]))
    	{
    		if(method_exists($controller, $url[1]))
    		{
    			$controller->{$url[1]}($url[2]);

    		} else {
    			throw new Exception('The page you requested was not found');
    		}

    	} else {

    		if(isset($url[1]))
    		{
    			if(method_exists($controller, $url[1]))
    			{
    				$controller->{($url[1])}();

    			} else {
    				throw new Exception('The page you requested was not found');
    			}

    		} else {
    			$controller->index();
    		}
    	}
    }

    /**
     * segments
     * 
     * @access public
     *
     * @return mixed Value.
     */
    public function segments()
    {
    	$url = isset($_GET['url']) ? $_GET['url'] : null;
    	$url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
    	return explode('/', $url);
    }
}