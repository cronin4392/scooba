<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Play extends CI_Controller {

	public function index()
	{	
		$content = array('play');
		$data['content'] = $content;
		$this->load->view('includes/template', $data);
	}
	
	
}