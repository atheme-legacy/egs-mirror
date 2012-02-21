<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="distribution" content="global" />
    <meta name="robots" content="follow, all" />
    <meta name="language" content="en" />
    
    <title><?php print $this->config->item('site_name'); ?> - EGs Web Panel</title>
    
    <!-- Icon -->
    <link rel="Shortcut Icon" href="<?php print base_url(); ?>favicon.ico" type="image/x-icon" />
      
    <!-- CSS -->
    <link rel="stylesheet" href="<?php print base_url(); ?>style.css" type="text/css" media="screen" charset="utf-8" />
    
    <!--[if lt IE 9]>
      <link rel="stylesheet" href="ie.css" />
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Javascript -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>js/notify.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>js/placeholder.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>js/egs.js"></script>
        
</head>
<body>
	<?php $this->load->view('response'); ?>
	
	<div id="container" class="logincontainer">
		<header>
			<h1 id="logo">Admin Control Panel</h1> 
		</header>
		
		<!-- login window -->
		<div id="application">
			<nav id="secondary">
			<ul>
				<li class="current"><a href="<?php print site_url('login'); ?>">Login</a></li>
				<?php if ($this->config->item('web_register')) : ?>
					<li><a href="<?php print site_url('register'); ?>">Register</a></li>
				<?php endif; ?>
			</ul>
			</nav>
			
			<section id="content">
				
				<div id="login" class="tab">
					<br /><br />
					<form action="" method="post">
					<section>
						<label for="username">Username</label>
						<div>
							<input type="text" name="username" placeholder="Nickname" class="required" />
						</div>
					</section>
					
					<section>
						<label for="password">Password</label>
						<div>
							<input type="password" name="password" id="password" placeholder="Password" class="required" />
							<br /><br /><input type="submit" value="Login" class="button primary" />
							<a href="#" class="button">Cancel</a>
						</div>
					</section>
					</form>
				</div>
						
			</section>
		</div>
        
		<footer id="copyright"><a href="irc://pool.ircmojo.org/egs">EGs Web Panel</a> - (Copyright &copy; <a href="http://epicgeeks.net/egs/">synmuffin</a>)</footer>
	</div>

</body>
</html>