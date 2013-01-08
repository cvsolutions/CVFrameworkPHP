<?php

/**
 * CV_Hash
 *
 * @author Concetto Vecchio
 * @copyright 2013
 * @version 1.0
 * @package PHP Framework
 * @license GNU General Public License 3 (http://www.gnu.org/licenses/)
 * @link http://cvsolutions.it
 *
 */
class CV_Hash
{
	/**
	 * Create
	 * @param unknown $algorithm The algorithm (md5, sha1, etc)
	 * @param unknown $item The data to encode
	 * @param unknown $salt The salt (This should be the same throughout the system probably)
	 * @return string
	 */
	public static function Create($algorithm, $item, $salt)
	{
		$context = hash_init($algorithm, HASH_HMAC, $salt);
		hash_update($context, $item);
		return hash_final($context);
	}

}