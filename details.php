<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Metrics extends Module {

	public $version = '0.9.0';

	public function info()
	{
		$info = array(
			'name' => array(
				'en' => 'Metrics'
			),
			'description' => array(
				'en' => 'View traffic and more with this module'
			),
			'frontend' => false,
			'backend' => true,
			'skip_xss' => false,
			'menu' => 'data',
			'sections' => array(
				'metrics' => array(
					'name' => 'metrics:metrics:title',
					'uri' => 'admin/metrics',
					'class' => ''
				)
			),
			'roles' => array(
				''
			)
		);
		
		return $info;
	}

	public function install()
	{		
		return true;
	}

	public function uninstall()
	{
		$this->load->driver('Streams');

        $this->streams->utilities->remove_namespace('metrics');

        return true;
	}


	public function upgrade($old_version)
	{
		// Upgrade Logic
		
		// if($old_version == 'A')
		// {
		// 	// Upgrade from A to B
		// 	
		// 	$old_version = 'B';
		// }
		// 
		// if($old_version == 'B')
		// {
		// 	// Upgrade from B to C
		// 	
		// 	$old_version = 'current';
		// }
		
		return true;
	}
}
/* End of file details.php */
