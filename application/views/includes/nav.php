<section class="grid_4">
	<nav class="grid_4 alpha omega">
		
		<div class="right">
		
		&nbsp;
		<?php if(isset($prev_project)) { ?>
			<div class="button prev">
				<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $prev_project->img; ?>">
					<?php echo $prev_project->name;?>&nbsp;&nbsp;<span class="icon">)</span>
				</a>
			</div>
		<?php } else {?>
		&nbsp;
		<?php } ?>
		<?php if(isset($next_project)) { ?>
			<div class="button next">
			<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $next_project->img; ?>">
				<span class="icon">(</span>&nbsp;&nbsp;<?php echo $next_project->name;?>
			</a>
			</div>
		<?php } else {?>
		&nbsp;
		<?php } ?>
		</div>
		
		<div class="left">
		<div class="button">
			<a href="<?php echo site_url(); ?>/portfolio/">
			<span class="icon">:</span>&nbsp;&nbsp;Portfolio
			</a>
		</div>
		</div>
		
	</nav>
</section>