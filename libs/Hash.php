<?php

/**
* Hash
*
* @uses     PDO
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Hash
{
    /**
     * create
     * 
     * @param mixed $algorithm The algorithm (md5, sha1, whirlpool, etc).
     * @param mixed $field   The data to encode.
     * @param mixed $salt      The salt (This should be the same throughout the system probably).
     *
     * @access public
     * @static
     *
     * @return mixed Value.
     */
	public static function create($algorithm, $field, $salt)
	{
		$context = hash_init($algorithm, HASH_HMAC, $salt);
		hash_update($context, $field);
		return hash_final($context);
	}
}