<?php

/**
 * include core library
 */
include_once 'CV_Controller.php';
include_once 'CV_Database.php';
include_once 'CV_Model.php';
include_once 'CV_Hash.php';

/**
 * CV_Solutions
 *
 * @author Concetto Vecchio
 * @copyright 2013
 * @version 1.0
 * @package PHP Framework
 * @license GNU General Public License 3 (http://www.gnu.org/licenses/)
 * @link http://cvsolutions.it
 *
 */
class CV_Solutions
{
    /**
     * @return array
     */
    private function Request()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $params = explode('/', $uri);
        return array_filter($params);
    }

    /**
     * @param array $request obj
     * @return bool
     * @throws Exception
     */
    private function Load_Controller(array $request)
    {
        $path = realpath(dirname(__FILE__) . '/../../controller');

        if (isset($request[1])) {
            $class = sprintf('%sController.php', $request[1]);
            $fileName = $path . '/' . $class;

            if (is_readable($fileName)) {
                // Common Controller
                include_once $fileName;
                $obj = new $request[1]();
                $method = isset($request[2]) ? $request[2] : 'Index';
                $obj->$method($arg = false);
                return true;
            }

        } else {

            // Default Controller
            include_once $path . '/IndexController.php';
            $Controller = new Index();
            $Controller->Index();
            return true;
        }

        throw new Exception('The page you requested was not found');
    }

    /**
     * @return bool
     */
    public function Bootstrap()
    {
        try {

            $uri = $this->Request();
            // print_r($uri);
            $this->Load_Controller($uri);
            return true;

        } catch (Exception $e) {
            // Error Request
            exit($e->getMessage());
        }
    }
}