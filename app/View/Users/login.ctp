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
		<h2>Login</h1>
		<?php echo $this->Flash->render('auth'); ?>
		<?php echo $this->Form->create('User'); ?>
		<div class="form-group">
				<label for="inputEmail">Email</label>
				<?php echo $this->Form->input('email', array('label' => false, 'div' => false, 'type' => 'email', 'class' => 'form-control')); ?>
			</div>
			<div class="form-group">
				<label for="inputPassword">Password</label>
				<?php echo $this->Form->input('password', array('label' => false,'div' => false, 'type' => 'password', 'class' => 'form-control')); ?>
			</div>
			<div class="login-group">
				<?php echo $this->Form->end('Login'); ?>
				<?php echo $this->Html->link(
				    'Register',
				    'register',
				    array('class' => 'btn btn-primary', 'target' => '_self')
				); ?>
			</div>
		</form>
	</div>
</body>
</html>