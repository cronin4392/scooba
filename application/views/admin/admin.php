<?php
	$projects = $this->portfolio_model->get_all_projects();
?>

<section class="grid_4 admin_page">
<ul class="grid_3 alpha organize items">
	<?php
	$i = 0;
	foreach($projects as $row) :
	$i++; ?>
		<li class="grid_1 <?php if($i%3==1) { echo 'alpha'; } if($i%3==0) { echo 'omega'; } ?>" data-type="all_<?php echo strtolower($row->type); ?>" data-year="all_<?php echo strtolower($row->year); ?>" data-category="all_<?php echo strtolower($row->category); ?>" data-id="id-<?php echo $row->id; ?>">
			<a href="<?php echo site_url("/portfolio/item/".$row->img); ?>">
				<div id="item_<?php echo $row->id; ?>" class="image">
					<?php if(@getimagesize(base_url() . 'assets/images/portfolio/preview/' . $row->img . '.jpg')) { ?>
					<img src="<?php echo base_url() . 'assets/images/portfolio/preview/' . $row->img . '.jpg'; ?>" alt="<?php echo $row->name; ?>" />
					<?php } else { ?>
						No Image
					<?php } ?>
				</div>
			</a>
				<div class="caption">
					<div class="title">
						<a href="<?php echo site_url("/portfolio/item/".$row->img); ?>"><?php echo $row->name; ?></a>
					</div>
					<div class="tag">
						<span><?php echo $row->type; ?></span> / <span data-type="year"><?php echo $row->year; ?></span>
					</div>
					
					<input type="checkbox" name="featured" value="featured" <?php if($row->featured==1) { ?>checked="yes"<?php } ?> /> Featured 
				</div>
			
		</li>
	<?php endforeach; ?>
</ul>
<ul class="copy grid_1 omega admin_panel">
	<li>
		<?php $this->load->view('admin/add_project'); ?>
	</li>
</ul>
</section>