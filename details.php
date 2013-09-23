<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Metrics extends Module {

	public $version = '0.9.2';

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
				),
				'ips' => array(
					'name' => 'metrics:ips:title',
					'uri' => 'admin/metrics/ips',
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
		$this->load->driver('streams');
		
		// Add Video Stream
		if(!$this->streams->streams->add_stream('IPs', 'ips', 'metrics', 'metrics_', 'List of IPs that have visited the website.')) return false;
		
		$fields = array(
			array(
				'name' => 'IP',
				'slug' => 'ip',
				'namespace' => 'metrics',
				'type' => 'text',
				'extra' => array('max_length' => 45),
				'assign' => 'ips',
				'title_column' => true,
				'required' => true,
				'unique' => true,
			),
			array(
				'name' => 'URI',
				'slug' => 'uri',
				'namespace' => 'metrics',
				'type' => 'text',
				'extra' => array('max_length' => 255),
				'assign' => 'ips',
				'title_column' => false,
				'required' => true,
				'unique' => false
			)
		);
		
		$this->streams->fields->add_fields($fields);
		
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
