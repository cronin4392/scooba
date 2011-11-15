<section class="grid_4" id="login_form">

	<h1>Login</h1>
    <?php 
	echo form_open('login/validate_credentials');
	echo form_input('username');
	echo form_password('password');
	echo form_submit('submit', 'Login');
	echo form_close();
	?>

</section><!-- end login_form-->