<?php
	$project = $this->portfolio_model->get_project_by_id($id);
	$position = $project->position;
	$images = $this->portfolio_model->get_project_images($id);
	
?>

<h1>Edit Project</h1>
<?php

$attributes = array('class' => 'form', 'id' => 'edit_project_form');
echo form_open('admin/edit_project/'.$project->id, $attributes);

//ID - Hidden
echo form_hidden('id', $project->id);

//Submit button
$data = array(
    'name' => 'delete',
    'data-id' => "id-$project->id",
    'class' => 'delete_button',
    'value' => 'true',
    'type' => 'button',
    'content' => 'Delete Project'
);

echo form_button($data);

//Project Name
$data = array(
	'name'        => 'name',
	'id'          => 'name',
	'value'       => $project->name
);
echo '<fieldset>';
echo form_label('Project Name', 'name');
echo form_input($data);
echo '</fieldset>';

//Project Image Code
$data = array(
	'name'        => 'img',
	'id'          => 'img',
	'value'       => $project->img
);
echo '<fieldset>';
echo form_label('Project Code', 'img');
echo form_input($data);
echo '</fieldset>';

//Project Category
$options = array(
	'Client'  => 'Client',
	'Personal'    => 'Personal'
);
echo '<fieldset>';
echo form_label('Category', 'category');
echo form_dropdown('category', $options, $project->category);
echo '</fieldset>';

//Project Type
$options = array(
	'Design'  => 'Design',
	'Web'    => 'Web'
);
echo '<fieldset>';
echo form_label('Type', 'type');
echo form_dropdown('type', $options, $project->type);
echo '</fieldset>';

//Project Year
$options = array(
	'2007'  => '2007',
	'2008'    => '2008',
	'2009'   => '2009',
	'2010' => '2010',
	'2011' => '2011'
);
echo '<fieldset>';
echo form_label('Year', 'year');
echo form_dropdown('year', $options, $project->year);
echo '</fieldset>';

//Project Tools
$data = array(
	'name'        => 'tools',
	'id'          => 'tools',
	'value'       => ''
);
echo '<fieldset>';
echo form_label('Tools', 'tools', $project->tools);
echo form_input($data);
echo '</fieldset>';

//Project Description
$data = array(
	'name'        => 'descr',
	'id'          => 'descr',
	'value'       => $project->descr,
	'cols'		=> '24',
	'rows'		=> '10'
);
echo '<fieldset>';
echo form_label('Description', 'descr');
echo form_textarea($data);
echo '</fieldset>';

//Project Link
$data = array(
	'name'        => 'link',
	'id'          => 'link',
	'value'       => $project->link
);
echo '<fieldset>';
echo form_label('Link', 'link');
echo form_input($data);
echo '</fieldset>';

//Submit button
$data = array(
    'name' => 'submit',
    'id' => 'submit_button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Update Project'
);

echo form_button($data);

?>

<?php
	echo validation_errors('<p class="error">');
	echo form_close();
?>



<?php
if(count($images)>0) {
foreach($images as $image) :
?>
<li>
<a href="<?php echo site_url(); ?>/portfolio/item/<?php echo $project->img;?>/<?php echo $image->position; ?>">
	<div class="image">
		<img src="<?php echo base_url();?>assets/images/portfolio/<?php echo $project->img; ?>/<?php echo $image->name; ?>" alt="<?php echo $project->name;?>, <?php echo $image->caption; ?>" />
	</div>
	<?php if($image->caption != "") { ?>
	<div class="title">
		<?php echo $image->caption; ?>
	</div>
	<?php } ?>	
</a>
</li>
<?php
endforeach;
}
?>