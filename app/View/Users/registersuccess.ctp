<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Router::url('/css/style.css', true); ?>">
</head>
<body>
	<div id="reg-success" class="text-center">
		<h1>Thank you for registering!</h1>
		<?php echo $this->Html->link(
			'← Back to login page',
			'index',
			array('class' => 'btn btn-outline-success', 'target' => '_self')
		); ?>
	</div>
</body>
</html>