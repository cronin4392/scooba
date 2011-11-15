<?php
	$project = $this->portfolio_model->get_project_by_img($img_code);
	$id = $project->id;
	$position = $project->position;
	$images = $this->portfolio_model->get_project_images($id);
	
	$data["next_project"] = $this->portfolio_model->get_next_project($position);
	$data["prev_project"] = $this->portfolio_model->get_prev_project($position);
?>
<section class="admin_panel">
<div class="container">
	<h1>Admin Panel</h1>
	
	<ul class="">
		<li>
			<h2><?php echo $project->name;?></h2>
			<p><?php echo $project->type;?> / <?php echo $project->year;?></p>
		</li>
		<li>
			<h2>Description:</h2>
			<p><?php echo $project->descr;?></p>
		</li>
		<?php if($project->link!="") { ?>
		<li>
			<a class="button" href="<?php echo $project->link; ?>">
				Visit Project Site
			</a>
		</li>
		<?php } ?>
		<li>
			<h2>Tools:</h2>
			<p><?php echo $project->tools;?></p>
		</li>
		
	</ul>
	<ul class="project">
		<?php foreach($images as $image) : ?>
		<li>
		<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $project->img;?>/<?php echo $image->position; ?>">
			<div class="image">
				<img src="<?php echo base_url();?>assets/images/portfolio/<?php echo $project->img; ?>/<?php echo $image->name; ?>" alt="<?php echo $project->name;?>, <?php echo $image->caption; ?>" />
			</div>
			<?php if($image->caption != "") { ?>
			<div class="title">
				<?php echo $image->caption; ?>
			</div>
			<?php } ?>	
		</a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
</section>