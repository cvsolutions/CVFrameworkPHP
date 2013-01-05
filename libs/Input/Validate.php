<?php

/**
* Validate
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Validate
{
	public function required($field, $options = array())
	{
		if($field == "")
		{
			if(!empty($options))
			{
				return $options['label'];

			} else {
				return 'Il campo è obbligatorio e non può essere lasciato vuoto';
			}
		}
	}

	public function email($field)
	{
		if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $field))
		{
			return 'Indirizzo email non valido';
		}
	}

	public function minlength($field, $options)
	{
		if (strlen($field) < $options) {
			return "Your string can only be $options long";
		}
	}
	
	public function maxlength($field, $options)
	{
		if (strlen($field) > $options) {
			return "Your string can only be $options long";
		}
	}
	
	public function digit($field)
	{
		if (ctype_digit($field) == false) {
			return "Your string must be a digit";
		}
	}
	
	public function __call($name, $arguments) 
	{
		throw new Exception("$name does not exist inside of: " . __CLASS__);
	}
}