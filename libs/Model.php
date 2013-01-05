<?php

/**
* Model
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Model
{
    /**
     * $db
     *
     * @var mixed
     *
     * @access public
     */
	public $db;

    /**
     * __construct
     * 
     * @access public
     *
     * @return mixed Value.
     */
	function __construct()
	{
		$this->db = new Database();
	}
}