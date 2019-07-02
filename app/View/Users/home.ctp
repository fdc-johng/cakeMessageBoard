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
				<img src="img/prof_default.png" alt="Profile Picture" class="img-thumbnail">		
			</div>
			<div class="input-group mb-3">
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" id="avatar" accept="image/png, image/jpeg">
			    <label class="custom-file-label" for="avar" aria-describedby="inputGroupFileAddon02">Choose file</label>
			  </div>
			</div>
		</div>
		<form>
		  <div class="form-group row">
		    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="profile_info  form-control" id="inputName" value="John Ellie Go" readonly>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputBirthdate" class="col-sm-2 col-form-label">Birthdate</label>
		    <div class="col-sm-10">
		      <input type="date" class="profile_info  form-control" id="inputBirthdate" value="1990-01-01" >
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
		    <div class="col-sm-10">
		      <input type="radio" name="gender" value="Male"> Male  
  			  <input type="radio" name="gender" value="Female"> Female
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Hubby</label>
		    <div class="col-sm-10">
		      <textarea name="hubby" class="profile_info form-control" rows="7"></textarea>
		    </div>
		  </div>
		</form>
	</div>

	<div class="tab-pane" id="newMessage">
		<h2>Messages</h2>
		<a href="#" id="createNewMessage" class="btn btn-outline-primary newMessageBtn">New Message</a>
		<div id="messages">
			<img src="img/prof_default.png" alt="Profile Picture" class="img-thumbnail">
			<div class="messageInfo">
				<textarea name="message" readonly>Sample</textarea>
				<input type="text" name="date" value="01/07/2019 10:00 PM " readonly>
			</div>
		</div>

		<div id="messages-invert">
			<img src="img/prof_default.png" alt="Profile Picture" class="img-thumbnail">
			<div class="messageInfo">
				<textarea name="message" readonly>Sample</textarea>
				<input type="text" name="date" value="01/07/2019 10:00 PM "readonly>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="createMessage">
		<h2>New Message</h2>
		<form>
			<div class="form-group">
				<label for="exampleFormControlInput1">To</label>
				<input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Name" required="">
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Message</label>
				<textarea class="form-control" id="exampleFormControlSelect1" required=""></textarea>
			</div>
			<div class="form-group">
				<input type="button" id="sendMessage" class="form-control btn btn-primary" name="submit" value="Send">
			</div>
		</form>
	</div>

	<div class="wrapper">
	    <!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header text-center">
	            <h3>John Ellie Go</h3>
	        </div>

	        <ul class="list-unstyled components">
	            <li class="ab-page active">
	                <a id="aboutPage" href="#">My Account</a>
	            </li>
	            <li class="nm-page">
	                <a id="newMessagePage" href="#"><strong>+</strong>  Messages</a>
	            </li>
	            <li>
	                <a href="#">Logout</a>
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