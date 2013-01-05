<?php

/**
* Session
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Session
{
    /**
     * init
     * 
     * @access public
     * @static
     *
     * @return mixed Value.
     */
    public static function init()
    {
    	if (session_id() == false)
    	{
    		session_start();
    	}
    }
    
    /**
     * set
     * 
     * @param mixed $key   Description.
     * @param mixed $value Description.
     *
     * @access public
     * @static
     *
     * @return mixed Value.
     */
    public static function set($key, $value)
    {
    	if (is_string($key))
    	{
    		$_SESSION[$key] = $value;
    	}
    }

    /**
     * get
     * 
     * @param mixed $key Description.
     *
     * @access public
     * @static
     *
     * @return mixed Value.
     */
    public static function get($key)
    {
    	if(isset($_SESSION[$key]))
    	{
    		return $_SESSION[$key];
    	}
    }

    /**
     * destroy
     * 
     * @access public
     * @static
     *
     * @return mixed Value.
     */
    public static function destroy()
    {
    	if (session_id() == true)
    	{
    		session_destroy();
    	}
    }
}