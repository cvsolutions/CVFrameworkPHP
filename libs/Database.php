<?php

/**
* Database
*
* @uses     PDO
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Database extends PDO
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
        $sth = sprintf('mysql:host=%s;dbname=%s', DB_HOSTNAME, DB_NAME);
        parent::__construct($sth, DB_USERNAME, DB_PASSWORD);
    }
}