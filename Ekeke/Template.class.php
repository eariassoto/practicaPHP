<?php

namespace Solsoft\ekeke;

class Template
{
	private $variables = array();
	private $name = '';
	private $template_dir = '';

	function __construct($name = '', $template_dir = '')
	{
		$this->template_dir = $template_dir;
		if (!is_file(BASE_DIR . $this->template_dir . $name . '.php'))
		{
		   throw new exception('Template file \'' . BASE_DIR . $this->template_dir . $name . '.php\' does not exists.');
		}
		$this->name = $name;
	}

	function assign($name, $value)
	{
		$this->variables[$name] = $value;
	}

	function render()
	{
		ob_start();
		extract($this->variables);
		require($this->template_dir . $this->name . '.php');
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}

?>