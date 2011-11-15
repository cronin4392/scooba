<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {

	public function index()
	{	
		$content = array('projects');
		$data['content'] = $content;
		$this->load->view('includes/template', $data);
	}
	
	/**
	 * $img_code = Project Code, $img = Specified image	
	 */
	public function item($img_code, $img="")
	{
		$data['img_code'] = $img_code;	
		// If no image defined / view full project
		if($img=="") {
			$content = array('project');
			$data['content'] = $content;
			$this->load->view('includes/template', $data);
		}
		// else if image is defined, show single image
		else {
			$data["img_numb"] = $img;
			
			$content = array('image');
			$data['content'] = $content;
			$this->load->view('includes/template', $data);
		}
		
	}
}