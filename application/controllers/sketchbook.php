<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketchbook extends CI_Controller {

	public function index()
	{	
		$content = array('sketchbook');
		$data['content'] = $content;
		$this->load->view('includes/template', $data);
	}
	
}