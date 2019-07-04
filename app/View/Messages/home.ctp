<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<?php echo $this->Html->css('style'); ?>
	<link  href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" />
</head>
<body>

	<div class="tab-pane" id="about">
		<h2>About</h2>
		<div class="profile-image">
			<div class="text-center">
				<object data="<?php echo Router::url('/img/' . $profile['User']['id'] . '.jpg', true); ?>" width="150px" height="150px" class="img-thumbnail" id="previewImage">
					<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail" id="previewImage1">
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
		<?php foreach($inboxes as $inbox): ?>
			<a href="/cakephp/messages/reply/<?php echo $inbox['Message']['from_id']?>" title="reply">
				<div class="messages">
					<object data="<?php echo Router::url('/img/' . $inbox['Message']['from_id'] . '.jpg', true); ?>" width="110px" height="110px" class="img-thumbnail">
						<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail">
					</object>
					<div class="messageInfo">
						<textarea name="message" readonly><?php echo $inbox['Message']['content']; ?></textarea>
						<input type="text" name="date" class="timeInfo" value="<?php echo $inbox['Message']['modified']; ?> " readonly>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
		<div style="position: fixed; bottom: 3px; left: 40%; font-size: 25px;">
			<?php echo "<a href='".$this->here."?n=".$next_limit."' id='newMessagePage1'>More</a>"; ?>
		</div>
		</div>
	</div>

	<div class="tab-pane" id="createMessage">
		<h2>New Message</h2>
		<?php echo $this->Form->create('Message'); ?>
			<div class="form-group">
				<label for="exampleFormControlInput1">To</label>
				<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'form-control', 'autoComplete' => 'on')); ?>
				<?php echo $this->Form->input('from_id', array('label' => false, 'div' => false, 'type' => 'hidden', 'value' => $profile['User']['id'])); ?>
				<?php echo $this->Form->input('to_id', array('label' => false, 'div' => false, 'type' => 'hidden', 'value' => '')); ?>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Message</label>
				<?php echo $this->Form->textarea('content', array('class' => 'form-control')); ?>
			</div>
		<?php echo $this->Form->end('Send'); ?>
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

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?php echo Router::url('/js/content.js', true); ?>" type="text/javascript" charset="utf-8"></script>

	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</body>
</html>