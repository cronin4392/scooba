<section class="grid_4">
	<nav class="filter grid_4 alpha omega">
		<span data-type="all" class="button_set">
			View: <button type="button">All</button>
		</span>
		<span data-type="category" class="button_set">
			Category: 
				<input type="radio" id="all_cat" name="category" value="All" checked="checked" /><label for="all_cat">All</label>
			<?php foreach($tags['categories'] as $tag) : ?>
				<input type="radio" id="<?php echo $tag ?>_cat" name="category" value="<?php echo $tag ?>" /><label for="<?php echo $tag ?>_cat"><?php echo $tag; ?></label>
			<?php endforeach; ?>
		</span>
		<span data-type="type" class="button_set">
			Type: 
				<input type="radio" id="all_type" name="type" value="All" checked="checked" /><label for="all_type">All</label>
			<?php foreach($tags['types'] as $tag) : ?>
				<input type="radio" id="<?php echo $tag ?>_type" name="type" value="<?php echo $tag ?>" /><label for="<?php echo $tag ?>_type"><?php echo $tag; ?></label>
			<?php endforeach; ?>
		</span>
		<span data-type="year" class="button_set">
			Year: 
				<input type="radio" id="all_year" name="year" value="All" checked="checked" /><label for="all_year">All</label>
			<?php foreach($tags['years'] as $tag) : ?>
				<input type="radio" id="<?php echo $tag ?>_year" name="year" value="<?php echo $tag ?>" /><label for="<?php echo $tag ?>_year"><?php echo $tag; ?></label>
			<?php endforeach; ?>
		</span>
	</nav>
</section>