<?php

/**
* View
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class View
{
    /**
     * __construct
     * 
     * @access public
     *
     * @return mixed Value.
     */
    function __construct(){}

    /**
     * render
     * 
     * @param mixed $name path Template.
     * @param mixed $show render page.
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function render($name, $show = true)
    {
        if($show === true)
        {
            $template = __ROOT__ . '/views/' . $name . '.php';
            if(file_exists($template))
            {
                require $template;
                return true;
            }
        }
        $error = sprintf('Unable to load the requested file: %s', $template);
        throw new Exception($error);    
    }
}