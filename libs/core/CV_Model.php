<?php

/**
 * CV_Model
 * 
 * @author Concetto Vecchio
 * @copyright 2013
 * @version 1.0
 * @package PHP Framework
 * @license GNU General Public License 3 (http://www.gnu.org/licenses/)
 * @link http://cvsolutions.it
 * 
 */
class CV_Model
{
	public $db;
	
	public function __construct()
	{
		$this->db = new CV_Database();	
	}
}