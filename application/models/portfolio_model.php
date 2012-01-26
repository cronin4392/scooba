<?php

class Portfolio_model extends CI_Model {
	
	function get_all_projects($dir="desc") {
		$q = $this->db->order_by("position",$dir)->get('projects');
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data;
		}
	}
	
	function get_featured_projects($amount) {
		if($amount == 0) {
			$q = $this->db->order_by("position","desc")->get_where('projects', array('featured' => '1'));
		}
		else {
			$q = $this->db->order_by("position","desc")->get_where('projects', array('featured' => '1'), $amount);
		}
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data;
		}
	}
	
	function get_project_by_id($id) {
		$q = $this->db->get_where('projects', array('id' => $id));
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data[0];
		}
	}
	
	function get_project_by_img($img) {
		$q = $this->db->get_where('projects', array('img' => $img));
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data[0];
		}
	}
	
	function get_project_by_position($position) {
		$q = $this->db->get_where('projects', array('position' => $position));
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data[0];
		}
	}
	
	function get_all_tags() {
		$projects = $this->get_featured_projects(0);
		
		$categories = array();
		$types = array();
		$years = array();
		
		foreach($projects as $project) :
			if(!in_array($project->category, $categories))
				$categories[] = $project->category;
			if(!in_array($project->type, $types))
				$types[] = $project->type;
			if(!in_array($project->year, $years))
				$years[] = $project->year;
		endforeach;
		
		$tags['categories'] = $categories;
		$tags['types'] = $types;
		$tags['years'] = $years;
		
		return $tags;
	}
	
	function get_project_images($id) {
		$q = $this->db->order_by("position","asc")->get_where('project_images', array('p_id' => $id));
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
		return $data;
		}
	}
	
	function get_next_project($position) {
		$position++;
		$q = $this->get_project_by_position($position);
		
		$count = count($this->get_all_projects())-1;
		if($q!="") {
			if($q->featured==1)
				return $q;
			else if($position<=$count)
				return $this->get_next_project($position);
		}
	}
	
	function get_prev_project($position) {
		$position--;
		$q = $this->get_project_by_position($position);
		if($q!="") {
			if($q->featured==1)
				return $q;
			else if($position>=0) 
				return $this->get_prev_project($position);
		}
	}
	
	function get_settings() {
		$q = $this->db->get('settings');
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[$row->setting] = $row->value;
			}
		return $data;
		}
	}
	
	function create_nav_links($names, $links="", $selected="", $targets="", $wrapper="") {
		$amount = count($names);
		$echo = "";
		
		for($i=0;$i<$amount;$i++):
			if(isset($links[$i])) {
				if($names[$i]==$selected)
					$echo .= '<li class="selected button"><a href="'.$links[$i].'">';
				else
					$echo .= '<li class="button"><a href="'.$links[$i].'">';
			}
			$echo .= $names[$i];
			if(isset($links[$i])) {
				$echo .= '</a></li>';
			}
		endfor;
		
		print $echo;
	}
	
	function create_links($names, $links="", $targets="", $wrapper="") {
		$amount = count($names);
		$echo = "";
		
		for($i=0;$i<$amount;$i++):
			if(isset($links[$i])) {
				$echo .= '<a href="'.$links[$i].'"';
				if(strpos($links[$i], 'http')!==false)
					$echo .= 'target="_BLANK"';
				$echo .= '>';
			}
			$echo .= $names[$i];
			if(isset($links[$i])) {
				$echo .= '</a>';
			}
			if($i!=$amount-1)
				$echo .= ', ';
		endfor;
		
		print $echo;
	}
}