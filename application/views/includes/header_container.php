<div class="container container_4">
<header class="grid_4">
	<h1 class="">
		<!-- <canvas id="headerCanvas" width="946" height="200"> --> 		
			<a href="<?php echo base_url(); ?>">
				<img src="<?php echo base_url() . 'assets/images/canvas_logo.png';?>" width="946" alt="<?php print $settings['site_name']; ?>" />
			</a>
		<!-- </canvas> -->
	</h1>
	<h2>Stephen Cronin &nbsp; / &nbsp; Designer - Developer &nbsp; / &nbsp; New York, NY - Boston, MA</h2>
	<?php
		$names = array();
		$links = array();
		$selected = "";
					
		$url_len = strlen(site_url())+1;
		$url =  substr(current_url(),$url_len);
					
		$names[] = 'portfolio';
		$links[] = base_url() . '';
		$names[] = 'play';
		$links[] = base_url() . 'play';
		$names[] = 'about';
		$links[] = base_url() . 'about';
		$names[] = 'resume';
		$links[] = base_url() . 'assets/files/SCronin_Resume.pdf';
		$names[] = 'contact';
		$links[] = "mailto:".$settings['email'];
	?>
	<nav>
		<ul>
		<?php
			foreach($names as $name) {
				$page_len = strlen($name);
				$url_len = strlen($url);
				
				if(substr($url, $page_len-$url_len)==$name) 
					$selected = $name;
					
				else if($url=="")
					$selected = "portfolio";
				
			}
			
			$this->portfolio_model->create_nav_links($names,$links,$selected);
		?>
		<li class="clear"></li>
		</ul>
	</nav>
</header>