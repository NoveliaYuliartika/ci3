<html>
<head>
<title>My Private Website</title>
</head>
<style type="text/css">
	div.container{
		width: 100%;
		border: 1px;
	}

	header, footer{
		color:white;
		background:brown;
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
		<h1>WELCOME<span style="color:yellow"> NOVELIA </span><br><span style="color: yellow"> </span> as <span style="color: white">USER1</span></h1>
	</marquee>
	</header>

<div style="background-color: #F08080;color: white;padding: 1px" align="center">
	<h3><button type="submit" class="btn btn-default"><a href="home">Home</a></button><br><br>
  	<button type="submit" class="btn btn-default"><a href="about">About Me</a></button><br><br>
  	<button type="submit" class="btn btn-default"><a href="blog">My Blog</a></button><br><br>
    <button type="submit" class="btn btn-default"><a href="<?php echo base_url('index.php/Login/logout')?>">Logout</a></button></h3>
</div>
</form>

	<footer><img src="<?php echo base_url().'image/logo1.jpg'?>" width="30" height="30">
	Copyright &copy; Novelia.com</footer>
		</div>
	</div>
	

</body>
</html>