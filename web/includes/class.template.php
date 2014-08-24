<?php

class Template
{
	private $body = null;
	private $params = null;
	private $permParams = null;
	
	public function Template()
	{
		$this->body = '';
		$this->params = array();
		$this->permParams = array
		(
			'{link}' => Core::getConfig()->getWebsiteValue('link')
		);
	}
	
	public function addFile($templateName)
	{
		ob_start();
		include('templates/' . $templateName . '.tpl');
		$this->body .= ob_get_contents();
		ob_clean();
	}
	
	public function addCSS($cssLink)
	{
		$this->body .= '<link href="' . $cssLink . '" rel="stylesheet" type="text/css"/>';
	}
	
	public function addJS($jsLink)
	{
		$this->body .= '<script type="text/javascript" src="' . $jsLink . '"></script>';
	}
	
	public function writeData($data)
	{
		$this->body .= $data;
	}
	
	public function addParam($key, $value)
	{
		$this->params[$key] = $value;
	}
	
	public function output()
	{
		$output = $this->body;
		
		foreach ($this->params as $key => $value)
		{
			$output = str_ireplace($key, $value, $output);
		}
		
		foreach ($this->permParams as $key => $value)
		{
			$output = str_ireplace($key, $value, $output);
		}
		
		echo $output;
		
		$this->clear();
	}
	
	private function clear()
	{
		$this->body = null;
		$this->params = null;
	}
}

?>