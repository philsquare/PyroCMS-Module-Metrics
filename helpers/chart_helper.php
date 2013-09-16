<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Chart.js helper for codeigniter
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 */



/**
 * Format Data
 * This function receives an array an converts it to
 * a comma separate string used by the JS
 *
 * @param array $data The array to convert
 * @param string $type Either "values" or "string"
 * @return string
 * @author Philsquare
 */
function format_data($data, $type)
{
	$glue = ($type = "string") ? '","' : ',';
	
	return '["' . implode($glue, $data) . '"]';
}

function scale($data)
{
	$options->steps = ceil(max($data) / 100) * 10;
	$options->width = round((((max($data) / 10) + 1) * 10) / $options->steps);
	
	return $options;
}