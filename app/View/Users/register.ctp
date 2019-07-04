<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<?php echo $this->Html->css('style'); ?>
</head>
<body>
	<div id="login">
		<h2>Register</h2>
		<?php echo $this->Form->create('User', array('oninput' => 'data[User][password2].setCustomValidity(data[User][password2].value != data[User][password].value ? "Passwords do not match." : "")')); ?>
		<div class="form-group">
			<label for="inputEmail">Name <span>*</span></label>
			<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<label for="inputEmail">Email <span>*</span></label>
			<?php echo $this->Form->input('email', array('label' => false, 'div' => false, 'type' => 'email', 'class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<label for="inputEmail">Password <span>*</span></label>
			<?php echo $this->Form->input('password', array('label' => false,'div' => false, 'type' => 'password', 'class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<label for="inputPassword">Confirm Password <span>*</span></label>
			<?php echo $this->Form->input('password2', array('label' => false, 'div' => false, 'type' => 'password', 'class' => 'form-control')); ?>
		</div>
		<div class="text-center">
			<?php echo $this->Form->end('Register'); ?>
		</div>
	</div>
</body>
</html>
