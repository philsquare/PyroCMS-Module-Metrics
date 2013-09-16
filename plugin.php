<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Plugin sample for the metrics template module
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquarelabs.com
 * @package 	PyroCMS
 * @subpackage 	Template Module
 */
class Plugin_Metrics extends Plugin
{

	public $version = '1.0.0';
	public $name = array(
		'en' => 'Metrics'
	);
	public $description = array(
		'en' => 'Metrics description'
	);
	
	public function _self_doc()
	{
		$info = array(
			'method' => array(
				'description' => array(
					'en' => ''
				),
				'single' => true,
				'double' => false,
				'variables' => '',
				'attributes' => array(
					'id' => array(
						'type' => 'number',
						'flags' => '',
						'default' => '',
						'required' => true,
					),
				),
			)
		);
	
		return $info;
	}
	
	public function test()
	{
		
	}

}

/* End of file plugin.php */