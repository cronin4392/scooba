<?php
	$project = $this->portfolio_model->get_project_by_img($img_code);
	$id = $project->id;
	$position = $project->position;
	$images = $this->portfolio_model->get_project_images($id);
	
?>
<section class="grid_4">
<nav class="grid_4 alpha omega">
	<div class="left">
	<?php if(isset($next_project)) { ?>
		<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $next_project->img; ?>">
			&lt;- <?php echo $next_project->name;?>
		</a>
	<?php } else {?>
	&nbsp;
	<?php } ?>
	</div>
	
	<div class="center">
		<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $project->img;?>">
		<?php echo $project->name;?>
		</a>
	</div>
	
	<div class="right">
	&nbsp;
	<?php if(isset($prev_project)) { ?>
		<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $prev_project->img; ?>">
			<?php echo $prev_project->name;?> -&gt;
		</a>
	<?php } else {?>
	&nbsp;
	<?php } ?>
	</div>
</nav>
</section>
<section class="grid_4">
<ul class="grid_4 items alpha omega">
	<?php foreach($images as $image) : ?>
	<?php if($image->position == $img_numb) { ?>
	<li>
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
	</li>
	<?php } ?>
	<?php endforeach; ?>
</ul>
</section>