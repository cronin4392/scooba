<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{	
		$content = array('about');
		$data['content'] = $content;
		$this->load->view('includes/template', $data);
	}
}