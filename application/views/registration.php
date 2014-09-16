<h1>Register an account</h1>

<p>Use this form to register an account</p>

<?php
	// Form settings
	$usernameSettings 			= ['name'=>'username', 'id'=>'username', 'value'=>set_value('username')];
	$passwordSettings 			= ['name'=>'password', 'id'=>'password'];
	$confirmPasswordSettings 	= ['name'=>'password2', 'id'=>'password2'];
	$emailSettings 				= ['name'=>'email', 'id'=>'email', 'value'=>set_value('email')];

	// The form
	echo form_open('registration');
?>
<div>
	<?php echo form_label('Username: ', 'username'); ?>
	<?php echo form_input($usernameSettings); ?>
</div>
<div>
	<?php echo form_label('Password: ', 'password'); ?>
	<?php echo form_password($passwordSettings); ?>
</div>
<div>
	<?php echo form_label('Confirm Password: ', 'password2'); ?>
	<?php echo form_password($confirmPasswordSettings); ?>
</div>
<div>
	<?php echo form_label('Email: ', 'email'); ?>
	<?php echo form_input($emailSettings); ?>
</div>
<div>
	<?php echo form_submit('register', 'Register Account'); ?>
</div>
<?php
	// Close the form
	echo form_close();
	// All error messages are placed here
	echo validation_errors();
?>