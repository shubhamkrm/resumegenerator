<?php
require_once 'includes/section.php';
require_once 'includes/template.php';
require_once 'includes/compiler.php';

class Processor
{

	public function process_input()
	{
		$resume_data = $this->get_array();
		$template = new Template('plasmatti');
		$resume_src = $template->render($resume_data);

		echo("Begin compile");
		$compiler = new Compiler($resume_src, 'output');
		$out_file = $compiler->compile();
		echo("Compiled");

		$this->send_compiled_resume($out_file);
	}

	private function get_array()
	{
		$resume = array();
		$fields = $this->get_fields();

		foreach($fields as $k => $field)
		{
			$field_section = $this->create_field_section($field);
			array_push($resume, $field_section);
		}
		return $resume;
	}

	private function get_fields()
	{
		array_filter($_POST);
		return array_keys($_POST);
	}

	private function create_field_section($field_name)
	{
		$field = $_POST[$field_name];
		array_filter($field);
		$section = new Section($field['title'], $field['type']);
		foreach ($field as $k => $v)
		{
			$section->set($k, $v);
		}
		return $section;
	}

	private function send_compiled_resume($filename)
	{
		if (file_exists($filename))
		{
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			header('Content-Type: ' . finfo_file($finfo, $filename));
			finfo_close($finfo);

			header('Content-Disposition: attachment; filename='.basename($filename));

			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');

			header('Content-Length: '.filesize($filename));

			ob_clean();
			flush();
			readfile($filename);
			exit;
		} 
		else
	   	{
			http_response_code(404);
			die();
		}
	}
}

$processor = new Processor();
$processor->process_input();
