<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<title> Form Sign UP</title>
</head>
<body>
	<div class="container">
	<legend>Form SignUp</legend>
	<?php  echo form_open('login/insert') ?>
	<?php  echo validation_errors() ?>
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Input field">
		<label for="">Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Input field">
	</div>

	

	<button type="submit" class="btn btn-primary">Submit</button></div>
</form>
</body>
</html>