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
<div class="MessageBox">

	<?php echo $this->Form->create('Message'); ?>
		<div class="form-group">
			<?php echo $this->Form->input('from_id', array('label' => false, 'div' => false, 'type' => 'hidden', 'value' => $profile['User']['id'])); ?>
			<?php 
				foreach($inboxes as $inbox): 
					if($inbox['Message']['to_id'] == $profile['User']['id']):
						continue;
					endif;
			?>

			<?php echo $this->Form->input('to_id', array('label' => false, 'div' => false, 'type' => 'hidden', 'value' => $inbox['Message']['to_id'])); ?>
			<?php 
					if($inbox['Message']['to_id'] != $profile['User']['id']):
						break;
					endif;
				endforeach;
			?>
		</div>
		<div class="form-group" style="text-align: left; width: 400px; margin-left: 200px;">
			<label for="exampleFormControlSelect1" style="display: block;">Reply</label>
			<?php echo $this->Form->textarea('content', array('class' => 'form-control')); ?>
		</div>
		<div style="position: relative; left:500px; top: -20px;">
	<?php echo $this->Form->end('Send'); ?>
		</div>

	<?php foreach($inboxes as $inbox): ?>
		<?php if($inbox['Message']['to_id'] == $profile['User']['id']): ?>
		<div class="messages">
		<?php else: ?>
		<div class="messages-invert">
		<?php endif; ?>
			<object data="<?php echo Router::url('/img/' . $inbox['Message']['from_id'] . '.jpg', true); ?>" width="110px" height="110px" class="img-thumbnail">
				<img src="<?php echo Router::url('/img/prof_default.png', true); ?>" alt="Profile Picture" class="img-thumbnail">
			</object>
			<div class="messageInfo">
				<textarea name="message" readonly><?php echo $inbox['Message']['content']; ?></textarea>
				<input type="text" name="date" class="timeInfo" value="<?php echo $inbox['Message']['modified']; ?> " readonly>
			</div>
		</div>
	<?php endforeach;?>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?php echo Router::url('/js/content.js', true); ?>" type="text/javascript" charset="utf-8"></script>

	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</body>