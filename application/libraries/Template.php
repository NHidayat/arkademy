<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template 
{
	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function load($template, $data=NULL)
	{
		$data['contents'] = $this->ci->load->view($template, $data, TRUE);		
		$data['navbar'] = $this->ci->load->view('struktur/navbar', $data, TRUE);		
		$this->ci->load->view('struktur/v_template', $data);

	}
}