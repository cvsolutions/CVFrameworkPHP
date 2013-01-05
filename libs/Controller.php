<?php

/**
* Controller
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Controller
{
    /**
     * $view
     *
     * @var mixed
     *
     * @access public
     */
    public $view;

    /**
     * $model
     *
     * @var mixed
     *
     * @access public
     */
    public $model;

    /**
     * __construct
     * 
     * @access public
     *
     * @return mixed Value.
     */
    function __construct()
    {
        $this->view = new View();
    }

    /**
     * load_model
     * 
     * @param mixed $name Description.
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function load_model($name)
    {
        $filename = __ROOT__ . '/model/' . $name . '_model.php';
        if(file_exists($filename))
        {
            require $filename;
            $modelName = $name . '_Model';
            $this->model = new $modelName();
            return true;
        }
        $error = sprintf('Unable to locate the model you have specified: %s', $filename);
        throw new Exception($error);
    }

    /**
     * params
     * 
     * @access public
     *
     * @return mixed Value.
     */
    public function params()
    {
        return explode('/', $_GET['url']);
    }


}