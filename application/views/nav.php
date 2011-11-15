<section class="grid_4">
	<nav class="grid_4 alpha omega">
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
		
		<div class="center">
			<a href="<?php echo site_url(); ?>/portfolio/">
			Portfolio
			</a>
		</div>
		
		<div class="left">
		<?php if(isset($next_project)) { ?>
			<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $next_project->img; ?>">
				&lt;- <?php echo $next_project->name;?>
			</a>
		<?php } else {?>
		&nbsp;
		<?php } ?>
		</div>
	</nav>
</section>