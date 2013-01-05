<?php

/**
* Input
*
* @uses     
*
* @category PHP Framework
* @package  MVC CV Solutions
* @author   Vecchio Concetto <info@cvsolutions.it>
* @license  GNU General Public License 3 (http://www.gnu.org/licenses/)
* @link     http://cvsolutions.it
*/
class Input
{
    /**
     * $_currentItem
     *
     * @var mixed
     *
     * @access private
     */
    private $_currentItem = null;

    /**
     * $_postData
     *
     * @var array
     *
     * @access private
     */
    private $_postData = array();

    /**
     * $_val
     *
     * @var array
     *
     * @access private
     */

    /**
     * $_val
     *
     * @var array
     *
     * @access private
     */
    private $_val = array();

    /**
     * $_error
     *
     * @var array
     *
     * @access private
     */
    private $_error = array();

    function __construct()
    {
    	include_once 'Input/Validate.php';
    	$this->_val = new Validate();
    }

    /**
     * post
     * 
     * @param mixed $field The HTML fieldname to post.
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function post($field)
    {
    	$this->_postData[$field] = $_POST[$field];
    	$this->_currentItem = $field;    
    	return $this;
    }

    /**
     * fetch
     * 
     * @param mixed $fieldName Return the posted data.
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function fetch($fieldName = false)
    {
    	if ($fieldName) 
    	{
    		if (isset($this->_postData[$fieldName]))
    		{
    			return $this->_postData[$fieldName];

    		} else {
    			return false;
    		}
    	} else {
    		return $this->_postData;
    	}
    }

    /**
     * validate
     * 
     * @param mixed $typeOfValidator A method from the Input/Validate class.
     * @param mixed $options         A property to validate against.
     *
     * @access public
     *
     * @return mixed Value.
     */
    public function validate($typeOfValidator, $options = null)
    {
    	if ($options == null)
    	{
    		$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);

    	} else {
    		$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $options);
    	}

    	if ($error)
    	{
    		$this->_error[$this->_currentItem] = $error;
    	}
    	return $this;
    }

    /**
     * submit
     * 
     * @access public
     *
     * @return mixed Value.
     */
    public function submit()
    {
        if (empty($this->_error)) 
        {
            return true;
        }
    }

    /**
     * errors
     * 
     * @access public
     *
     * @return mixed Value.
     */
    public function errors()
    {
        if(empty($_POST)) return false;

        $string = sprintf('<ul>');
        foreach ($this->_error as $key => $value) {
            $string .= sprintf('<li>%s</li>', $value);
        }
        $string .= sprintf('</ul>');
        return $string;
    }

    
}