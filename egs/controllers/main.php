<?php

/**
 * EGs Web Panel (Web Services for Atheme)
 *
 * author: J. Newing (synmuffin)
 * email: jnewing [at] gmail [dot] com
 * version: 3.0
 *
 */

/**
 * Main Controller
 * 
 */
class Main extends CI_Controller {

	
	//========================================================
	// PRIVATE VARS
	//========================================================
	
	
	//========================================================
	// PUBLIC VARS
	//========================================================
	
	
	//========================================================
	// PUBLIC FUNCTIONS
	//========================================================
	
	
	/**
	 * Constructor
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}
	// --------------------------------------------------------
	
	
	/**
	 * Index Page
	 * Displays the main dashboard page or redirects to the login page.
	 *
	 */
	public function index()
	{
		if ($this->session->userdata('is_authed'))
			redirect('main/home');
		
		$page_data = array();
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run())
		{	
			if ($this->atheme->login($this->input->post('username'), $this->input->post('password')))
			{				
				$user_data = array(
					'is_authed'	=> TRUE,
					'nick'	=> $this->input->post('username'),
					'auth'	=> $this->xmlrpc->display_response(),
				);
				
				$this->session->set_userdata($user_data);
				
				redirect('main/home');
			}
			else
			{
				$page_data['success'] = FALSE;
				$page_data['msg'] = $this->xmlrpc->display_error();
			}
		}

		$this->load->view('login', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Home Page
	 * Displays the main dashboard page.
	 * 
	 */
	public function home()
	{	
		$page_data = array();
		
		// info
		$callback = $this->nickserv_model->get_info();
		
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');
		
		if ($callback['response'])
			$page_data['info'] = $this->fout->nick_info($callback['data']);
			
		// parse users email and set into session
		// we'll use this for gravatar icons
		//
		// i had to use a loop for this as where the email can appear in the callback varies per net
		// depending on what modules they have installed and in use on NS.
		foreach ($page_data['info'] as $ep)
		{
			if (strstr($ep, 'Email'))
			{
				$email_parts = explode(":", $ep);
				$u_email = explode(" ", trim($email_parts[1]));
			}
								
		}
		$this->session->set_userdata('email', $u_email[0]);
		
		// channel access
		$callback = $this->nickserv_model->list_chans();
		
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		$page_data['response'] = $callback['data'];		
		
		$this->load->view('home', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Logout Page
 	 * Does the user logout and then redirects.
 	 * 
 	 */
	public function logout()
	{
		$page_data = array();
		
		$this->atheme->logout($this->session->userdata('nick'), $this->session->userdata('auth'));
		$this->session->sess_destroy();
		
		redirect('');
	}
	// --------------------------------------------------------
	
	
	/**
	 * Register Page
	 * Displayes the users registration page, if allowd via the config.
	 *
	 */
	public function register()
	{
	    $page_data = array();
	    
	    $this->form_validation->set_rules('username', 'Nickname', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('repassword', 'Re-Typed Password', 'required|matches[password]');
	    $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
	    
	    if ($this->form_validation->run())
	    {
	        $callback = $this->nickserv_model->register($this->input->post('username'), $this->input->post('password'), $this->input->post('email'));
			
			if (!$callback['response'] && $callback['data'] == "Invalid authcookie for this account.")
				redirect('main/logout');
			
			$page_data['success'] = $callback['response'];
			$page_data['msg'] = $callback['data'] . '<br /><br /><a href="' . base_url() . '">Click here</a> to be taken back to login screen.';
	    }
	    
	    $this->load->view('register', $page_data);
	}
	// --------------------------------------------------------


	public function hash($password = FALSE)
	{
		if (!$password)
			return;

		$md5 = md5($password);
		print "<pre>------------------------\n";
		print "MD5: $md5\n";
		print "Atheme.conf: " . '$rawmd5$' . $md5 . "\n";
		print "------------------------</pre>";

		/*
		$md5 = md5($password, TRUE);
		$fp = fopen("/home/ircd/www/egs/controllers/dump.bin", "wb");
		fwrite($fp, $md5);
		fclose($fp);
		*/

	}
	
	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================
	
}
