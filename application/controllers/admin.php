<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->is_logged_in();
	}
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{	
			redirect('login');
		}
	}
	
	function index() {
		$this->admin();
	}
	
	function admin()
	{	
		$content = array('admin/admin');
		$data['content'] = $content;
		$this->load->view('includes/template', $data);
	}
	
	function add_project() {
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('name', 'Project Name', 'trim|required');
		$this->form_validation->set_rules('img', 'Project Code', 'trim|required|callback_nospace_check|callback_project_exists');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tools', 'Tools', 'trim');
		$this->form_validation->set_rules('descr', 'Description', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim');
		$this->form_validation->set_rules('featured', 'Featured', '');
		
		
		if($this->form_validation->run() == FALSE)
		{
			/** $content = array('admin/add_project');
			$data['content'] = $content; */
			$this->load->view('admin/add_project');
		}
		
		else
		{			
			$this->load->model('admin_model');
			
			if($query = $this->admin_model->create_project())
			{
				$data['message'] = "Add Successful!";
				$this->load->view('admin/add_project', $data);
			}
			else
			{
				/** $content = array('admin/add_project');
				$data['content'] = $content; */
				$this->load->view('admin/add_project');
			}
		}
	}
	
	function edit_project($id) {
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('name', 'Project Name', 'trim|required');
		$this->form_validation->set_rules('img', 'Project Code', 'trim|required|callback_nospace_check');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('type', 'Type', 'trim|required');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|is_numeric');
		$this->form_validation->set_rules('tools', 'Tools', 'trim');
		$this->form_validation->set_rules('descr', 'Description', 'trim|required');
		$this->form_validation->set_rules('link', 'Link', 'trim');
		$this->form_validation->set_rules('featured', 'Featured', '');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('admin_model');
			/** $content = array('admin/add_project');*/
			$data['id'] = $id;
			print $this->admin_model->order_projects();
			$this->load->view('admin/edit_project', $data);
		}
		
		else
		{			
			$this->load->model('admin_model');
			
			if($query = $this->admin_model->edit_project($id))
			{
				$data['message'] = "Edit Successful!";
				$this->load->view('admin/add_project', $data);
			}
			else
			{
				/** $content = array('admin/add_project');
				$data['content'] = $content; */
				$data['id'] = $id;
				$this->load->view('admin/edit_project', $data);
			}
		}
	}
	
	function update_project($id, $attr, $val) {
		//$data['id'] = $id;
		//$data['attr'] = $attr;
		//$data['val'] = $val;
		$this->load->model('admin_model');
		$this->admin_model->update_project($id, $attr, $val);
	}
	
	function delete_project($id) {		
		$this->load->model('admin_model');
		
		if($query = $this->admin_model->delete_project($id))
		{
			$data['message'] = "Delete Successful!";
			$this->load->view('admin/add_project', $data);
		}
		else
		{
			$data['message'] = "Cannot Delete!";
			$this->load->view('admin/add_project', $data);
		}
		
		
	}
	
	function project_exists($str) {
		$this->load->model('admin_model');
		$data['exist'] = $this->admin_model->project_exists($str);
		
		
		//$this->load->model('admin_model');
		if(!$this->admin_model->project_exists($str)) {
			$this->form_validation->set_message('project_exists', 'Project with that code already exists.');
			return false;
		}
		else {
			return true;
		}
	}
	
	function nospace_check($str) {
		if ( preg_match( '/\W/', $str ) )
		{
		    // illegal characters exist
		    $this->form_validation->set_message('nospace_check', 'The %s field can not contain spaces.');
		    return false;
		}
		
		// or...
		if ( preg_match( '/^\w+$/', $str ) )
		{
		    // all characters are legal
		    return true;
		}  
	}
}