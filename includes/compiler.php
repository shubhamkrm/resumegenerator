<?php

class Compiler
{
	protected $_source;
	protected $_output_folder;

	public function __construct($source, $folder)
	{
		$this->_source = $source;
		$this->_output_folder = $folder;
	}

	public function compile()
	{
		$out = $this->_output_folder;
		$outfilename = uniqid();
		file_put_contents($out.'/'.$outfilename.'.tex', $this->_source);
		shell_exec("xelatex -interaction nonstopmode -output-directory $out $out/$outfilename.tex");
		return $out.'/'.$outfilename.'.pdf';
	}
}
