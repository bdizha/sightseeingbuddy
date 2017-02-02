<?php
namespace Craft;

class BustVariable
{
	public function er($file)
	{
		$time = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
		return $file . '?' . $time;
	}

	public function filetime($file)
	{
		$time = filemtime($file);
		return $time;
	}

	public function filexists($file)
	{
		return file_exists($file);
	}
}