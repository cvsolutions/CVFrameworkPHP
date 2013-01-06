<?php

/**
 * PHP framework 0.1 (Requires php 5.3)
 * 
 * @author Concetto Vecchio
 * @link http://cvsolutions.it
 * @copyright 2013 CV Solutions (info@cvsolutions.it)
 * @license GNU General Public License 3 (http://www.gnu.org/licenses/)
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
include_once 'config.php';
include_once 'libs/core/CV_Solutions.php';
include_once 'libs/smarty/Smarty.class.php';

$app = new CV_Solutions();
$app->Bootstrap();