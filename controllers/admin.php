<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Metrics
 *
 *
 * @author 		Phil Martinez - Philsquare Dev Team
 * @website		http://philsquare.com
 * @package 	PyroCMS
 */

class Admin extends Admin_Controller
{

	/**
	 * The current active section
	 *
	 * @var string
	 */
	protected $section = 'metrics';

    public function __construct()
    {
        parent::__construct();

		// Load lang
        $this->lang->load('metrics');

		$this->load->helper('chart');

		// Load assets
		Asset::css('module::admin.css');
		Asset::js('module::chart.min.js');
		
		// Templates use this lib
		$this->load->library('table');
		
		// Set CP GUI table attr
		$this->table->set_template(array('table_open'  => '<table class="table-list" border="0" cellspacing="0">'));
    }

	// List views
	public function index()
	{
		$month = '';
		
		if($_POST)
		{
			$data->from = $this->input->post('from');
			$data->to = $this->input->post('to');
		}
		else
		{
			// Default range
			$data->from = date('Y-m-d', strtotime('-1 month'));
			$data->to = date('Y-m-d');
		}

		try
		{
			$this->load->library('analytics', array(
				'username' => $this->settings->ga_email,
				'password' => $this->settings->ga_password
					));

			// Set by GA Profile ID if provided, else try and use the current domain
			$this->analytics->setProfileById('ga:'.$this->settings->ga_profile);
			
			// Set date range
			$this->analytics->setDateRange($data->from, $data->to);
			
			// Graph these
			$visits = $this->analytics->getVisitors();
			$views = $this->analytics->getPageviews();
			$vph = $this->analytics->getVisitsPerHour();
			
			// Straight to tables
			$data->browsers = $this->analytics->getBrowsers();
			$data->resolutions = $this->analytics->getScreenResolution();
			$data->referrers = $this->analytics->getReferrers();
			$data->search_words = $this->analytics->getSearchWords();
			
			
			if (count($visits))
			{
				// Visits and Views
				foreach ($visits as $date => $visit)
				{
					$year = substr($date, 0, 4);
					$day = substr($date, 6, 2);
				
					if($month != substr($date, 4, 2))
					{
						$month = substr($date, 4, 2);
				
						$labels[] = date('M j', mktime(1, null, null, $month, $day, $year));
					}
					else
					{
						$labels[] = date('j', mktime(1, null, null, $month, $day, $year));
					}
				
					$ga_visits[] = $visit;
					$ga_views[] = $views[$date];
				}
				
				$scale = scale(array_merge($ga_visits, $ga_views));
				$graph->steps = $scale->steps;
				$graph->width = $scale->width;
				
				$graph->labels = format_data($labels, 'string');
				$graph->visits = format_data($ga_visits, 'values');
				$graph->views = format_data($ga_views, 'values');
				
				$this->template->append_metadata($this->load->view('admin/metrics/partials/js/visits', $graph, true));
				
				$labels = array();
				
				// Visit per hour
				foreach ($vph as $hour => $visit)
				{
					$vph[] = $visit;
					$labels[] = date('g a', mktime($hour, null, null, null, null, null));
				}
				
				// Load the data for vph
				$scale = scale($vph);
				$graph->steps = $scale->steps;
				$graph->width = $scale->width;
				
				$graph->labels = format_data($labels, 'string');
				$graph->vph = format_data($vph, 'values');
				
				$this->template->append_metadata($this->load->view('admin/metrics/partials/js/vph', $graph, true));
			}

		}
		catch (Exception $e)
		{
			$data->failure = sprintf(lang('cp:google_analytics_no_connect'), anchor('admin/settings', lang('cp:nav_settings')));
		}
		
		// Set partials and boom!
		$this->template
			->set_partial('filters', 'admin/metrics/partials/filters')
			->set_partial('browsers', 'admin/metrics/partials/browsers')
			->set_partial('referrers', 'admin/metrics/partials/referrers')
			->set_partial('screen_resolutions', 'admin/metrics/partials/screen_resolutions')
			->set_partial('search_words', 'admin/metrics/partials/search_words')
			->build('admin/metrics/index', $data);
	}
}