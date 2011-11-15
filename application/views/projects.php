<?php
	//Get all tags
	$tags = $this->portfolio_model->get_all_tags();
	
	//Load portfolio projects
	$projects = $this->portfolio_model->get_featured_projects(0);
?>
<section class="grid_4">
<ul class="grid_4 alpha omega items small">
	<?php
	$i = 0;
	$row_size = 4;
	foreach($projects as $row) :
	$i++; ?>
		<li class="grid_1 <?php if($i%$row_size==1) { echo 'alpha'; } if($i%$row_size==0) { echo 'omega'; } ?>" data-type="all_<?php echo strtolower($row->type); ?>" data-year="all_<?php echo strtolower($row->year); ?>" data-category="all_<?php echo strtolower($row->category); ?>" data-id="id-<?php echo $row->id; ?>">
			<a href="<?php echo site_url("/portfolio/item/".$row->img); ?>">
				<div class="image">
					<img src="<?php echo base_url() . 'assets/images/portfolio/preview/' . $row->img . '.jpg'; ?>" alt="<?php echo $row->name; ?>" />
				</div>
				<div class="caption">
					<div class="title">
						<?php echo $row->name; ?>
					</div>
					<div class="tag">
						<span><?php echo $row->type; ?></span> / <span data-type="year"><?php echo $row->year; ?></span>
					</div>
				</div>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<!-- <ul class="copy grid_1 omega">
	<li>
		<h1>Portfolio</h1>
		<p>
			Here you will find selected works that I have created over the years.<br />
			Enjoy.
		</p>
	</li>
	<li>
		<nav class="filter">
			<h2>Category:</h2>
			<div data-type="category" class="button_set">
					<input type="radio" id="all_cat" name="category" value="All" checked="checked" /><label for="all_cat">All</label>
				<?php foreach($tags['categories'] as $tag) : ?>
					<input type="radio" id="<?php echo $tag ?>_cat" name="category" value="<?php echo $tag ?>" /><label for="<?php echo $tag ?>_cat"><?php echo $tag; ?></label>
				<?php endforeach; ?>
			</div>
			<h2>Type:</h2>
			<div data-type="type" class="button_set">
					<input type="radio" id="all_type" name="type" value="All" checked="checked" /><label for="all_type">All</label>
				<?php foreach($tags['types'] as $tag) : ?>
					<input type="radio" id="<?php echo $tag ?>_type" name="type" value="<?php echo $tag ?>" /><label for="<?php echo $tag ?>_type"><?php echo $tag; ?></label>
				<?php endforeach; ?>
			</div>
		</nav>
	</li>
	
</ul> -->
</section>