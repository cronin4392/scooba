<?php
	$project = $this->portfolio_model->get_project_by_img($img_code);
	$id = $project->id;
	$position = $project->position;
	$images = $this->portfolio_model->get_project_images($id);
	
	$data["next_project"] = $this->portfolio_model->get_next_project($position);
	$data["prev_project"] = $this->portfolio_model->get_prev_project($position);
	$this->load->view('includes/project_nav', $data);
?>
<section class="grid_4">
<ul class="grid_3 items alpha">
	<?php foreach($images as $image) : ?>
	<li>
	<?php if($project->link!="") { ?>
		<a href="<?php echo $project->link; ?>">
	<?php } else { ?>
		<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $project->img;?>/<?php echo $image->position; ?>">
	<?php } ?>
		<div class="image">
			<img src="<?php echo base_url();?>assets/images/portfolio/<?php echo $project->img; ?>/<?php echo $image->name; ?>" alt="<?php echo $project->name;?>, <?php echo $image->caption; ?>" />
		</div>
		<?php if($image->caption != "") { ?>
		<div class="caption">
		<div class="title">
			<?php echo $image->caption; ?>
		</div>
		</div>
		<?php } ?>	
	</a>
	</li>
	<?php endforeach; ?>
</ul>
<div class="grid_1 omega">
	<ul class="copy">
		<li>
			<h1><?php echo $project->name;?></h1>
			<p><?php echo $project->type;?> / <?php echo $project->year;?></p>
		</li>
		<li>
			<h2>Description:</h2>
			<p><?php echo $project->descr;?></p>
		</li>
		<?php if($project->link!="") { ?>
		<li>
			<div class="button">
				<a href="<?php echo $project->link; ?>">
					Visit Project Site<span class="icon">&nbsp;&nbsp;K</span>
				</a>
			</div>
		</li>
		<?php } ?>
		<li>
			<h2>Tools:</h2>
			<p><?php echo $project->tools;?></p>
		</li>
		
	</ul>
</div>
</section>
<?php
	$this->load->view('includes/project_nav', $data);
?>