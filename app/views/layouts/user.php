<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.3/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="/ui/s/app.css">
</head>
<body>
<div id="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="/">CIA</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="nav navbar-nav ml-auto">
				<?php if($this->session->userdata('is_logged_in')) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>user/view/<?=$profile['username']?>"><?=$profile['first_name']?> <?=$profile['last_name']?></a>
					</li>				
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>user/logout"><i class="fa fa-sign-out fa-2x"></i></a>
					</li>
				<?php endif; ?>
				<?php if(!$this->session->userdata('is_logged_in')) : ?>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>user/login">Log in</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url(); ?>user/register">Register</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
	
	

	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/">Home</a></li>
		<li class="breadcrumb-item"><a href="/<?=$this->router->fetch_class()?>"><?=ucwords($this->router->fetch_class())?></a></li>
		<li class="breadcrumb-item active"><?=ucwords($this->router->fetch_method())?></li>			
	</ol>
		<div id="body">
			<?php if($this->session->flashdata('message')) : ?>
				<div class="alert alert-<?=$this->session->flashdata('class')?> alert-dismissible fade show" role="alert">
					<?=$this->session->flashdata('message')?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<?php
				if(isset($user_view) && $user_view)
				{ 
					$this->load->view($user_view); 
				} 
			?>
		</div>
		<p class="footer text-center p-10">&copy; <?=date('Y')?> CIA | <a href="/docs/index.html">Docs</a><?php if($this->session->userdata('is_logged_in') == true): ?> | <a href="/user/logout">Logout</a><?php endif ?></p>
		
		
</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" charset="utf-8"></script>
	<script>
		$(".alert").delay(2500).slideUp(250, function() {
			$(this).alert('close');
		});
	</script>
</body>
</html>