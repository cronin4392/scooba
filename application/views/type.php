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
	<ul class="masonry">
	<?php
		$i = 0;
		$row_size = 4;
		foreach ( $json_output['response']['posts'] as $post )
		{ $i++;
	?>
		<li class="grid_1 ">
			<img src="<?= $post['photos'][0]['alt_sizes'][0]['url']; ?>" alt="" />
		</li>
	<?php 
		}
	?>
		<!-- <li class="grid_1 alpha">
			<img src="http://27.media.tumblr.com/tumblr_lndqs7nAt61qd06luo1_500.gif" width="226" height="292" />
		</li>
		<li class="grid_1">
			<img src="http://www.tumblr.com/photo/1280/14515360330/1/tumblr_ln7ofuxSCb1qd06lu" width="226" height="320" />
		</li>
		<li class="grid_1">
			<img src="http://27.media.tumblr.com/tumblr_lndqs7nAt61qd06luo1_500.gif" width="226" height="292" />
		</li>
		<li class="grid_1 omega">
			<img src="http://www.tumblr.com/photo/1280/14515360330/1/tumblr_ln7ofuxSCb1qd06lu" width="226" height="320" />
		</li>
		<li class="grid_1 alpha">
			<img src="http://27.media.tumblr.com/tumblr_lndqs7nAt61qd06luo1_500.gif" width="226" height="292" />
		</li>
		<li class="grid_1">
			<img src="http://www.tumblr.com/photo/1280/14515360330/1/tumblr_ln7ofuxSCb1qd06lu" width="226" height="320" />
		</li>
		<li class="grid_1">
			<img src="http://27.media.tumblr.com/tumblr_lndqs7nAt61qd06luo1_500.gif" width="226" height="292" />
		</li>
		<li class="grid_1 omega">
			<img src="http://www.tumblr.com/photo/1280/14515360330/1/tumblr_ln7ofuxSCb1qd06lu" width="226" height="320" />
		</li> -->
	</ul>
</section>