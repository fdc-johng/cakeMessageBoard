<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<?php echo $this->Html->css('style'); ?>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>

	<div class="tab-pane" id="about">
		<h2>About</h2>
		<div class="profile-image">
			<div class="text-center">
				<object data="<?php echo Router::url('/img/' . $profile['User']['id'] . '.jpg', true); ?>" width="150px" height="150px" class="img-thumbnail" id="previewImage">
					<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail">
				</object>		
			</div>
		</div>
	<?php echo $this->Form->create('User', array('enctype'=>'multipart/form-data')); ?>
		<div class="input-group mb-3 profile-image">
			<div class="custom-file">
				<?php echo $this->Form->input('image', array('label' => false, 'div' => false, 'type' => 'file', 'accept' => 'image/png, image/jpeg')); ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label">Name</label>
			<div class="col-sm-10">
				<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'profile_info form-control', 'value' => $profile['User']['name'])); ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputBirthdate" class="col-sm-2 col-form-label">Birthdate</label>
			<div class="col-sm-10">
				<?php echo $this->Form->input('birthdate', array('label' => false, 'div' => false, 'type' => 'date', 'class' => 'profile_info form-control', 'default' => '1990-01-01', 'value' => $profile['User']['birthdate'])); ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
			<?php
			$gender = $profile['User']['gender'];

			$options= array(
				'm' => 'Male',
				'f' => 'Female',
			);
			$attributes2 = array(
				'legend' => false, 
				'value' => $gender,
			);
			echo $this->Form->radio('gender', $options, $attributes2);
			?>
		</div>
		<div class="form-group row">
			<label for="inputHobby" class="col-sm-2 col-form-label">Hubby</label>
			<div class="col-sm-10">
				<?php 
				echo $this->Form->textarea('hubby', array('class' => 'profile_info form-control', 'rows' => '7', 'value' => $profile['User']['hubby']));
				?>
			</div>
		</div>
		<div class="text-center" style="padding: 0 150px;">
			<?php echo $this->Form->end('Save'); ?>
		</div>
	</div>

	<div class="tab-pane" id="newMessage">
		<h2>Messages</h2>
		<a href="#" id="createNewMessage" class="btn btn-outline-primary newMessageBtn">New Message</a>
		<div class="MessageBox">
			<div id="messages">
				<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail">
				<div class="messageInfo">
					<textarea name="message" readonly>Sample</textarea>
					<input type="text" name="date" class="timeInfo" value="01/07/2019 10:00 PM " readonly>
				</div>
			</div>
			<div id="messages">
				<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail">
				<div class="messageInfo">
					<textarea name="message" readonly>Sample</textarea>
					<input type="text" name="date" class="timeInfo" value="01/07/2019 10:00 PM " readonly>
				</div>
			</div>

			<div id="messages-invert">
				<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail">
				<div class="messageInfo">
					<textarea name="message" readonly>Sample</textarea>
					<input type="text" name="date" class="timeInfo" value="01/07/2019 10:00 PM "readonly>
				</div>
			</div>	
		</div>

	</div>

	<div class="tab-pane" id="createMessage">
		<h2>New Message</h2>
		<?php echo $this->Form->create('Message'); ?>
			<div class="form-group">
				<label for="exampleFormControlInput1">To</label>
				<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'type' => 'email', 'class' => 'form-control')); ?>
				<?php echo $this->Html->scriptBlock('var jsVars = ' . json_encode($contacts['User']) . '; Console.log(jsVars)'); ?>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Message</label>
				<?php 
				echo $this->Form->textarea('message', array('class' => 'form-control'));
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->end('Send'); ?>
			</div>
		</form>
	</div>

	<div class="wrapper">
		<!-- Sidebar -->
		<nav id="sidebar">
			<div class="sidebar-header text-center">
				<h3><?php echo $profile['User']['name'] ?></h3>
			</div>

			<ul class="list-unstyled components">
				<li class="ab-page active">
					<?php echo $this->Html->link('Home','home', array('id' => 'aboutPage')); ?>
				</li>
				<li class="nm-page">
					<?php echo $this->Html->link('New Message','#', array('id' => 'newMessagePage')); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Logout','logout'); ?>
				</li>
			</ul>
		</nav>
	</div>	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?php echo Router::url('/js/content.js', true); ?>" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>