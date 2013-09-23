<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Metrics
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */

class Admin_ips extends Admin_Controller
{

	/**
	 * The current active section
	 *
	 * @var string
	 */
	protected $section = 'ips';

    public function __construct()
    {
        parent::__construct();

		// Load lang
        $this->lang->load('metrics');

		// Load assets
		Asset::css('module::admin.css');
		Asset::js('module::chart.min.js');
		
		// Templates use this lib
		$this->load->library('table');
		
		// Set CP GUI table attr
		$this->table->set_template(array('table_open'  => '<table class="table-list" border="0" cellspacing="0">'));
    }

	// List views
	public function index($offset = 0)
	{
		$extra = array(
			'title' => 'IPs',
			
			'columns' => array('created', 'ip', 'uri')
		);
		
		$this->streams->cp->entries_table('ips', 'metrics', Settings::get('records_per_page'), 'admin/metrics/ips', true, $extra);
	}
}