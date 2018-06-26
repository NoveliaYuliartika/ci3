<html>
<head>
<title>My Private Website</title>
</head>


<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">

<style type="text/css">
	div.container{
		width: 100%;
		border: 1px;
	}

	header, footer{
		color:white;
		background:blue;
		clear:left;
		padding:1cm;
		text-align: center;
	}

	nav{
		float: right;
		max-width: 160px;
		height: 640px
		margin: 0;
		padding-right: 50px;
		border-right: 150px gainsboro;
		background: #ffb6c1;
		text-align: left;
	}

	nav ul{
		list-style-type: circle;
		padding: 20px; 
	}

	nav ul a{
		text-decoration: none;
	}

	article{
		margin-right: 50px;
		border-right: 3px;
		padding: 2cm;
		overflow: hidden;
	}

</style>

<body>

	<div class="container">
		<div class="col-sm-12 col-md-12">
			<header>
		<img src="<?php echo base_url().'image/logo1.jpg'?>" width="70" height="70">
	<marquee>
		<h1>WELCOME<span style="color:red"> IN </span><br><span style="color: yellow"> MY PRIVATE</span> <span style="color: black">WEBSITE</span></h1>
	</marquee>
	</header>

	<?php echo form_open('Login/ceklogin')?>
	<?php echo validation_errors();?>
		<div class="form-group">
			<label for="">Username</label>
			<input type="text" class="form-control" id="username" name="username">
			<label for="">Password</label>
			<input type="text" class="form-control" id="password" name="password">

		</div>
		<button type="submit" class="btn btn-primary">Sign In</button>

</div>
	<b>ADMIN : </b><br>
	username = tika, password = tika<br><br>
	<b>USER : </b><br>
	username = novelia, password = novelia

	<footer><img src="<?php echo base_url().'image/logo1.jpg'?>" width="30" height="30">
	Copyright &copy; NoveliaYuliartika.com</footer>
		</div>
	</div>
	

</body>
</html>