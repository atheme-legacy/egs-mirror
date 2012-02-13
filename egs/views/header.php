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

	<div id="container">
	
	<!-- header -->
	<header>
		<h1 id="logo">Admin Control Panel</h1>
		<div id="userinfo">
			<img src="<?php gravatar($this->session->userdata('email')); ?>" alt="" />
			<div class="intro">
				Welcome back; <?php print $this->session->userdata('nick'); ?><br />
				<a href="<?php print site_url('main/logout'); ?>">Logout</a><br />
				<br />
			</div>
		</div>
	</header>
        
	<!-- application "window" -->
	<div id="application">
	