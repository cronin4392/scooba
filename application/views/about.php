<section class="grid_4">
<div class="grid_4 alpha omega about">
	<div class="left">
		<h1><img src="<?php echo base_url() . 'assets/images/develop.png';?>" alt="Develop" /></h1>
		<ul class="progress">
			<?php
			
			$labels = array();
			$labels[] = array("HTML",100);
			$labels[] = array("CSS",100);
			$labels[] = array("PHP",80);
			$labels[] = array("JQuery",80);
			$labels[] = array("Actionscript",80);
			
			?>
			<?php
				foreach($labels as $label) {
			?>
			<li>
				<div class="label">
					<h2><?php echo $label[0]; ?></h2>
				</div>
				<div class="bar bar_<?php echo $label[1]; ?>">
				</div>
			</li>
			<?php
				} //end foreach
			?>
		</ul>
	</div>
	<div class="center">
		<div class="image border">
			<img src="<?php echo base_url() . 'assets/images/stephencronin.jpg';?>" alt="Me, Stephen Cronin" width="259" />
		</div>
		<header class="overlay">
			<h1><img src="<?php echo base_url() . 'assets/images/personal_logo_small.png';?>" alt="Stephen Cronin" width="300" /></h1>
			<h2>Designer / Developer</h2>
			<h3>New York, NY</h3>
		</header>
	</div>
	<div class="right">
		<h1><img src="<?php echo base_url() . 'assets/images/design.png';?>" alt="Design" /></h1>
		<ul class="progress">
			<?php
			
			$labels = array();
			$labels[] = array("Color",60);
			$labels[] = array("Type",80);
			$labels[] = array("Layout",60);
			$labels[] = array("Theory",80);
			$labels[] = array("Software",100);
			$labels[] = array("Sketching",80);
			
			?>
			<?php
				foreach($labels as $label) {
			?>
			<li>
				<div class="label">
					<h2><?php echo $label[0]; ?></h2>
				</div>
				<div class="bar bar_<?php echo $label[1]; ?>">
				</div>
			</li>
			<?php
				} //end foreach
			?>
		</ul>
	</div>
</div>
<div class="grid_4 alpha omega">
	<div class="grid_3 alpha">
		<ul class="copy">
		<li>
		<span class="accordian">
			<h2>Biography</h2>
			<p>My name is Stephen Cronin and I am a 19 year old from Boston, MA currently living in NYC trying to get myself out there in the web world. I have completed my freshman year at Parsons The New School for Design in the Design and Technology program.</p>
			<p>In 2006, when I was 14, I was given my first personal computer. I quickly became immersed in the platform and soon began exploring programming and designing on the computer. After picking up the basics in Photoshop and Illustrator I moved onto Flash and Actionscript to create interactive designs.</p>
			<p>During this time my friend and I became interested in creating our own T-shirt brand and, although the brand never went far, I learned the basics of silkscreening and designing for clothing. I wanted to learn more about print design and heard from a family friend about a non-profit located in Boston, called Artists for Humanity, that had numerous art studios, including silkscreening.</p>
			<p class="quote">"Founded in 1991, Artists For Humanity’s mission is to bridge economic, racial and social divisions by providing underserved youth with the keys to self-sufficiency through paid employment in the arts."</p>
			<p>I spent the next four years working in the Graphic Design studio at Artists for Humanity. In the Graphic Design studio I worked alongside a team consisting of students and mentors created professional designs for clients. During the summer of 2011 I was promoted to a mentor in the Graphic Design studio. As a mentor I received the responsibility of reviewing the student's work and teaching them design principles and the Adobe Creative Suite.
			</p>
			<a href="#" class="expand">Expand</a>
		</span>
		</li>
		<li>
			<h2>Music</h2>
			<?php
				$size = 5;
			?>
			<div class="slideshow">
			<ul class="container" >
				<?php 
				    
					$artists_week = simplexml_load_file('http://ws.audioscrobbler.com/2.0/user/cronin4392/topartists.xml?period=3month');
					
					/* For each <character> node, we echo a separate <name>. */
					foreach ($artists_week->artist as $artist) {
						$rank = $artist->attributes()->rank;
						foreach ($artist->image as $a_image) {
							$size = $a_image->attributes()->size;
							if($size=="large") 
								$image = $a_image;	
						}
						if($rank<=5) {
							echo '<li><div class="image"><a href="'.$artist->url.'"><img src="'.$image.'" /></a></div>
							<p><b><a href="'.$artist->url.'">'.$artist->name.'</a></b>
							<br>'.$artist->playcount.' Plays
							</p></li>';
						}
					}
				?>
			</ul>
			</div>
		</li>
		</ul>
	</div>
	<div class="grid_1 omega">
		<ul class="copy">
			<li>
				<h2>Friends:</h2>
				<p>
				<?php
					$names = array();
					$links = array();
					
					$names[] = 'Alien Kung Fu';
					$links[] = "http://www.alienkungfu.com";
					$names[] = 'Artists for Humanity';
					$links[] = "http://www.afhboston.com";
					$names[] = 'M. Nguyen';
					$links[] = "http://mnguyenphotography.carbonmade.com/";
					$names[] = 'Student 17';
					$links[] = "http://www.student17creations.com/";
					
					$this->portfolio_model->create_links($names,$links);
				?>
				</p>
			</li>
			<li>
				<h2>Likes:</h2>
				<p>
				<?php
					$names = array();
					
					$names[] = 'BMX';
					$names[] = 'Underground Hip-Hop';
					$names[] = 'G-Star';
					$names[] = 'Ralph Lauren';
					$names[] = 'Cosi';
					$names[] = 'Mi Madre';
					$names[] = 'Cheeba';
					
					$this->portfolio_model->create_links($names);
				?>
				</p>
			</li>
			<li>
				<h2>Links:</h2>
				<p>
				<?php
					$names = array();
					$links = array();
					
					$names[] = 'Tumblr';
					$links[] = "http://www.scoobasteve.tumblr.com";
					$names[] = 'Delicious';
					$links[] = "http://www.delicious.com/cronin4392";
					$names[] = 'Last.fm';
					$links[] = "http://www.last.fm/cronin4392";
					
					$this->portfolio_model->create_links($names,$links);
				?>
				</p>
			</li>
		</ul>
	</div>
</div>
</section>