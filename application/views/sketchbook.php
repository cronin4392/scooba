<?php
	//$items = simplexml_load_file('http://scoobasteve.tumblr.com/api/read?tagged=my%20art');
	
?>
<section class="grid_4">
<ul class="grid_3 alpha items small">
	<?php
	$i = 0;
	foreach($items->posts->post as $item) :
	$i++; ?>
		<li class="grid_1 <?php if($i%3==1) { echo 'alpha'; } if($i%3==0) { echo 'omega'; } ?>">
			<a href="<?php echo $item->attributes()->url; ?>">
				<div class="image">
					<img src="<?php echo $item->photo-url; ?>" alt="" />
				</div>
				<div class="title">
					Hola
				</div>
				
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<ul class="copy grid_1 omega">
	<li>
		<h1>Sketchbook</h1>
		<p>
			Here you will find selected works that I have created over the years.<br />
			Enjoy.
		</p>
	</li>
	<li>
		
	</li>
	
</ul>
</section>