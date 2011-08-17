<?php
/**
 * @package PhpTaskDaemon
 * @subpackage Task\Job\Data
 * @copyright Copyright (C) 2011 Dirk Engels Websolutions. All rights reserved.
 * @author Dirk Engels <d.engels@dirkengels.com>
 * @license https://github.com/DirkEngels/PhpTaskDaemon/blob/master/doc/LICENSE
 */

namespace PhpTaskDaemon\Task\Job\Data;

/**
 * 
 * The job abstract class provides setters and getters for the input and output
 * variables. The abstract class also implements a check method for the input
 * used by the managers. 
 */
abstract class AbstractClass {

    protected $_data = array();


    public function __construct($data = array()) {
        $this->set($data);
    }


    /**
     * Returns the data keys
     */
    public function getKeys() {
    	return array_keys($this->_data);
    }


    /**
     * 
     * Returns an array with input variables
     * @return array
     */
    public function get() {
        return $this->_data;
    }


    /**
     * 
     * (Re)Sets the input array 
     * @param array $data
     */
    public function set($data, $reset = false) {
        if ($reset) {
            if (is_array($data)) {
                $this->_data = $data;
                return true;
            }
        } else {
            $this->_data = array_merge($this->_data, $data);
            return true;
        }
        return false;
    }


    /**
     * 
     * (Re)Sets a single input key
     * @return mixed
     */
    public function getVar($var) {
        if (in_array($var, array_keys($this->_data))) {
            return $this->_data[$var];
        }
        return null;
    }


    /**
     * 
     * (Re)Sets a single input key
     * @param string $var
     * @param mixed $value
     * @return bool
     */
    public function setVar($var, $value, $force = false) {
        if ( in_array($var, $this->getKeys()) || $force) {
            $this->_data[$var] = $value;
            return true;
        }
        return false;
    }


    /**
     * 
     * Validate the input
     */
    public function validate() {
    	return true;
    }

}
