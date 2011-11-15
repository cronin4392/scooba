<?php
	$projects = $this->portfolio_model->get_all_projects();
?>
<section class="admin_panel">
<div class="container">
	<h1>Admin Panel</h1>
	
	<h2>Work</h2>
	<a class="add_project" href="<?php echo site_url(); ?>/admin/add_project">
		Add Project
	</a>
	<ul class="organize items">
		<?php foreach($projects as $row) : ?>
			<li data-id="<?php echo $row->id; ?>" data-type="project" data-position="<?php echo $row->position; ?>" class="sort">
				<a href="<?php echo site_url(); ?>/admin/delete_project/<?php echo $row->id; ?>" class="delete"><img src="<?php echo base_url() . 'assets/images/icons/deleteicon.gif'; ?>" alt="delete" /></a>
				<img src="<?php echo base_url() . 'assets/images/icons/moveicon.gif'; ?>" alt="delete" style="cursor: move;" />
				<a class="name" href="<?php echo site_url(); ?>/portfolio/item/<?php echo $row->img; ?>"><?php echo $row->name; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php echo anchor('login/logout', 'Logout'); ?>
</div>
</section>