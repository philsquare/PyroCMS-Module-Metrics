<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * UDL Courses Module Events
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */
class Events_Metrics {
    
    protected $ci;
    
    public function __construct()
    {
        $this->ci =& get_instance();
        
        Events::register('public_controller', array($this, 'track'));
    }
    
    public function track()
    {
		// IPs
		$ip = $this->ci->input->ip_address();
		$uri = $this->ci->uri->uri_string();
		
		$this->ci->streams->entries->insert_entry(array('ip' => $ip, 'uri' => $uri), 'ips', 'metrics');
    }
}
/* End of file events.php */