<?php
	$project = $this->portfolio_model->get_project_by_img($img_code);
	$id = $project->id;
	$position = $project->position;
	$images = $this->portfolio_model->get_project_images($id);
	
	$data["project"] = $project;
	$this->load->view('includes/image_nav', $data);
?>

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