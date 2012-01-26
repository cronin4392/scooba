<section class="grid_4">
	<?php 
		$api_key = "jCEgtJmFPcZMnDbqUH2bw6JvaV4xiDDL2eEkNz4T8MxGRXt9ls";
		$blog_url = "scoobasteve.tumblr.com";
		$type = "photo";
		$tag = "my+art";
		$url = "http://api.tumblr.com/v2/blog/".$blog_url."/posts/".$type."?api_key=".$api_key."&tag=".$tag;
		
		$json_1 = file_get_contents($url,0,null,null);
		$json_output_1 = json_decode($json_1, true);
		
		$api_key = "jCEgtJmFPcZMnDbqUH2bw6JvaV4xiDDL2eEkNz4T8MxGRXt9ls";
		$blog_url = "scoobasteve-org.tumblr.com";
		$type = "photo";
		$url = "http://api.tumblr.com/v2/blog/".$blog_url."/posts/".$type."?api_key=".$api_key;
		
		$json_2 = file_get_contents($url,0,null,null);
		$json_output_2 = json_decode($json_2, true);
		
		$output = array_merge($json_output_1['response']['posts'], $json_output_2['response']['posts']);
		/** echo "<pre>";
		print_r($output);
		echo "</pre>";
		exit; **/
		shuffle($output);
	?>
	<ul class="masonry items">
	<?php
		$i = 0;
		$row_size = 4;
		foreach ( $output as $post )
		{ $i++;
	?>
		<li class="grid_1 ">
			<a target="_BLANK" href="<?= $post['post_url']; ?>">
				<div class="image">
					<img src="<?= $post['photos'][0]['alt_sizes'][0]['url']; ?>" alt="" />
				</div>
				<?php if($post['caption']!="") { ?>
				<!-- <div class="caption">
					<?= $post['caption']; ?>
				</div> -->
				<?php } ?>
			</a>
		</li>
	<?php 
		}
	?>
	</ul>
</section>