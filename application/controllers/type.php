<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type extends CI_Controller {

	public function index()
	{	
		$content = array('type');
		$data['content'] = $content;
		$this->load->view('includes/template', $data);
	}
	
	
}