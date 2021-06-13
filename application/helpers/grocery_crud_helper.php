<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------
/**
 * analytics_serie function.
 * 
 * @access public 
 * @param   object $crud_render Object CRUD
 * @param   boolean $process_css Indicate if process css files or js files 
 * @return array
 */
if ( ! function_exists('array_files_output'))
{
	function array_files_output($crud_render, $process_css = false)
	{
		$arr = array();

		$object = $process_css ? $crud_render->css_files : $crud_render->js_files;

		foreach($object as $file) {
			$arr[] = array("file" => $file);
		}

		return $arr;
	}
}