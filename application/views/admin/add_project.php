<h1>Add Project</h1>
<?php
	if(isset($message)) {
		echo '<p>'.$message.'</p>';
	}
?>
<?php
$attributes = array('class' => 'form', 'id' => 'add_project_form');
echo form_open('admin/add_project', $attributes);

//Project Name
$data = array(
	'name'        => 'name',
	'id'          => 'name',
	'value'       => set_value('name')
);
echo '<fieldset>';
echo form_label('Project Name', 'name');
echo form_input($data);
echo '</fieldset>';

//Project Image Code
$data = array(
	'name'        => 'img',
	'id'          => 'img',
	'value'       => set_value('img')
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
echo form_dropdown('category', $options, set_value('category'));
echo '</fieldset>';

//Project Type
$options = array(
	'Design'  => 'Design',
	'Web'    => 'Web'
);
echo '<fieldset>';
echo form_label('Type', 'type');
echo form_dropdown('type', $options, set_value('type'));
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
echo form_dropdown('year', $options, set_value('year'));
echo '</fieldset>';

//Project Tools
$data = array(
	'name'        => 'tools',
	'id'          => 'tools',
	'value'       => set_value('tools')
);
echo '<fieldset>';
echo form_label('Tools', 'tools');
echo form_input($data);
echo '</fieldset>';

//Project Description
$data = array(
	'name'        => 'descr',
	'id'          => 'descr',
	'value'       => set_value('descr'),
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
	'value'       => set_value('link')
);
echo '<fieldset>';
echo form_label('Link', 'link');
echo form_input($data);
echo '</fieldset>';

//Is project Live?
$data = array(
	'name'        => 'featured',
    'id'          => 'featured',
    'value'       => 'Featured',
    'checked'     => set_value('featured')
);
echo '<fieldset>';
echo form_label('Featured', 'featured');
echo form_checkbox($data);
echo '</fieldset>';

//Submit button
$data = array(
    'name' => 'submit',
    'id' => 'submit_button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'Add Project'
);

echo form_button($data);

//echo form_submit('submit', 'Add Project');
?>

<?php
	echo form_close();
	echo validation_errors('<p class="error">');
?>
