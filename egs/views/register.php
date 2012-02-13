<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="distribution" content="global" />
    <meta name="robots" content="follow, all" />
    <meta name="language" content="en" />
    
    <title>New EGs</title>
    
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
				<li><a href="<?php print site_url('login'); ?>">Login</a></li>
				<?php if ($this->config->item('web_register')) : ?>
					<li class="current"><a href="<?php print site_url('register'); ?>">Register</a></li>
				<?php endif; ?>
			</ul>
			</nav>
			
			<section id="content">
				
				<?php if (!$this->session->userdata('is_authed')
						 && $this->config->item('web_register')) : ?>

				<div id="register" class="tab">
					<br /><br />
					<form action="" method="post">
					
					<section>
						<label for="username">
							Nickname
							<small>Select a nickname to register</small>
						</label>
            	      	<div>
							<input name="username" id="username" size="35" maxlength="50" type="text" placeholder="Nickname" class="required" />
						</div>
					</section>


					<section>
						<label for="password">
							Password
							<small>Select a secure password.</small>
						</label>
						<div>
							<input name="password" id="password" size="35" maxlength="50" type="password" placeholder="Password" class="required" />
						</div>
					</section>

					<section>
						<label for="repassword">
							Re-Type Password
							<small>Re-Type the password above.</small>
						</label>
						<div>
							<input name="repassword" id="repassword" size="35" maxlength="50" type="password" placeholder="Re-Type Password" class="required" />
						</div>
					</section>

					<section>
						<label for="email">
							Email
							<small>Email must be valid.</small>
						</label>
						<div>
                	    	<input name="email" id="email" size="35" type="text" placeholder="Your@Email.com" class="required" />
                	    	<br /><br /><input type="submit" value="Register" class="button primary" />
							<a href="#" class="button">Cancel</a>
                	    </div>
					</section>
					</form>
				</div>
				
				<?php endif; ?>
			</section>
		</div>
        
		<footer id="copyright"><a href="irc://pool.ircmojo.org/egs">EGs Web Panel</a> - (Copyright &copy; <a href="http://epicgeeks.net/egs/">synmuffin</a>)</footer>
	</div>

</body>
</html>