<?php

/**
 * PHP framework 0.1 (Requires php 5.3)
 * @note	Currently only works with Horizontal Slicing
 *
 * @author		Concetto Vecchio
 * @link		http://cvsolutions.it
 * @copyright 	2013 CV Solutions (info@cvsolutions.it)
 * @license		GNU General Public License 3 (http://www.gnu.org/licenses/)
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details:
 * http://www.gnu.org/licenses/
 *
 */

/** Define path to application directory */
define('__ROOT__', realpath(dirname(__FILE__)));

/** Configuration file */
require __ROOT__ . '/config/config.php';

/** [__autoload Autoloading Classes] */
function __autoload($class)
{
	$filename = __ROOT__ . '/libs/' . $class . '.php';
	if(file_exists($filename))
	{
		require $filename;
		return true;
	}
	throw new Exception('Class not found');
}

try {

	/** @var Bootstrap [Bootstrap PHP Code] */
	$CV_app = new Bootstrap();
	
} catch (Exception $e) {

	include_once __ROOT__ . '/controller/error.php';
	$Error = new Error();
	$Error->message = $e->getMessage();
	$Error->index();
	exit();
}
