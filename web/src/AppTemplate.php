<?php


/* Custom Template Class
*
* Diese Klasse dient dazu HTML Templates zu laden und darzustellen bzw
*
* In einer HTML Seite Werte zu ersetzen
*
*/

class Template
{
    protected $_file;
    protected $_data = array();

    public function __construct($file = null)
    {
        $this->_file = $file;
    }

    public function set($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

    public function render()
    {
        extract($this->_data);
        ob_start();
        include($this->_file);
        return ob_get_clean();
    }
}

?>