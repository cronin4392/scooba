<section class="grid_4">
	<?php 
		$api_key = "jCEgtJmFPcZMnDbqUH2bw6JvaV4xiDDL2eEkNz4T8MxGRXt9ls";
		$blog_url = "scoobasteve.tumblr.com";
		$type = "photo";
		$tag = "my+art";
		$url = "http://api.tumblr.com/v2/blog/".$blog_url."/posts/".$type."?api_key=".$api_key."&tag=".$tag;
		
		$json = file_get_contents($url,0,null,null);
		$json_output = json_decode($json, true);
	?>
	<ul class="items masonry">
	<?php
		$i = 0;
		$row_size = 4;
		foreach ( $json_output['response']['posts'] as $post )
		{ $i++;
	?>
		<li>
			<img src="<?= $post['photos'][0]['alt_sizes'][0]['url']; ?>" alt="" />
		</li>
	<?php 
		}
	?>
	</ul>
</section>