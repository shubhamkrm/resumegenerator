<?php

class Section
{
	protected $_type;
	protected $_data;
	protected $_title;

	public function __construct($title, $type)
	{
		$this->_data = array();
		$this->_title = $title;
		$this->_type = $type;
	}

	public function set($key, $value)
	{
		if ($value != "" && (!is_string($key) || ($key != 'type' && $key != 'title')))
			$this->_data[$key] = $value;
	}

	public function get_title()
	{
		return $this->_title;
	}

	public function get_type()
	{
		return $this->_type;
	}

	public function get($key)
	{
		return $this->_data[$key];
	}

	public function get_all_data()
	{
		return $this->_data;
	}
}
