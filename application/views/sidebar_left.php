<div class="grid_1">
	<nav>
	<h2><a href="#">About</a></h2>
	<div>
		<p>
			<?php echo $settings['about']; ?>
		</p>
	</div>
	
	<h2>Work</h2>
	<ul>
		<?php foreach($projects as $row) : ?>
			<li><a href="#"><?php echo $row->name; ?></a></li>
		<?php endforeach; ?>
	</ul>
	
	</nav>
</div>