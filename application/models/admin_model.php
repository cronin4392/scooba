<?php

class Admin_model extends CI_Model {
	
	function create_project() {
		$new_project_insert_data = array(
			'name' => $this->input->post('name'),
			'img' => $this->input->post('img'),
			'category' => $this->input->post('category'),			
			'type' => $this->input->post('type'),
			'year' => $this->input->post('year'),
			'tools' => $this->input->post('tools'),
			'descr' => $this->input->post('descr'),			
			'link' => $this->input->post('link'),
			'position' => $this->next_position(),
			'featured' => $this->input->post('featured')
		);
		
		$insert = $this->db->insert('projects', $new_project_insert_data);
		return $insert;
	}
		
	function delete_project($id) {
		if($this->delete_project_images($id)) {
			$this->db->where('id', $id);
			if($this->db->delete('projects')) {
				$this->order_projects();
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	
	function delete_project_images($id) {
		$this->db->where('p_id', $id);
		
		if($this->db->delete('project_images')) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function edit_project($id) {
		$project_insert_data = array(
			'name' => $this->input->post('name'),
			'img' => $this->input->post('img'),
			'category' => $this->input->post('category'),			
			'type' => $this->input->post('type'),
			'year' => $this->input->post('year'),
			'tools' => $this->input->post('tools'),
			'descr' => $this->input->post('descr'),			
			'link' => $this->input->post('link'),
			'featured' => $this->input->post('featured')
		);
		$this->db->where('id', $id);
		$insert = $this->db->update('projects', $project_insert_data);
		return $insert;
	}
	
	function update_project($id, $attr, $val) {
		$this->db->set($attr,$val);
		
		$this->db->where('id', $id);
		$this->db->update('projects');
	}
	
	function order_projects() {
		$projects = $this->portfolio_model->get_all_projects('asc');
		$position = 1;
		
		foreach($projects as $project) {
			$this->update_project($project->id, "position", $position);
			$position++;
		}
	}
	
	function project_exists($str) {
		$q = $this->db->get_where('projects', array('img' => $str));
		
		if($q->num_rows() > 0) {
			return false;
		}
		else {
			return true;
		}
		
		/**if($query->num_rows == 0)
		{
			return true;
		}
		else {
			return false;
		}*/
	}
	
	function next_position() {
		$all = $this->portfolio_model->get_all_projects();
		$numb = 0;
		foreach($all as $one) {
			if($one->position>$numb)
				$numb = $one->position;
		}
		
		return $numb+1;
	}
	
	function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			return true;
		}
		
	}
	
	function create_member()
	{
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('membership', $new_member_insert_data);
		return $insert;
	}
}