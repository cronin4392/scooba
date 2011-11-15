<?php 
	//Load settings
	$data["settings"] = $this->portfolio_model->get_settings();
?>

<?php
$this->load->view('includes/header', $data);
?>

<?php
$this->load->view('includes/header_container', $data);
?>

<?php
	foreach($content as $view) {
		$this->load->view($view);
	}
?>

<?php
$this->load->view('includes/footer');
?>