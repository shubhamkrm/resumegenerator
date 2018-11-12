<?php

require_once 'includes/section.php';

class Template
{
	protected $_name;
	protected $_config;
	protected $_template_path;
	protected $_resume = array();

	public function __construct($name = null)
	{
		$this->_name = $name;
		$this->_config = include 'config/'.$name;
		$this->_template_path = $this->_config['template_path'];
	}

	public function render($resume)
	{
		$body = "";
		foreach ($resume as $key => $section)
		{
			$body .= $this->render_section($section);
		}
		$output = new Section("Resume", 'final');
		$output->set('body', $body);
		return $this->render_section($output);
	}

	private function render_section(Section $section)
	{
		$template = $this->_template_path .
			$this->_config['template'][$section->get_type()];
		ob_start();
		include($template);
		return ob_get_clean();
	}
}
