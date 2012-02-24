<?php

/****************************************************************/
/* EGs Web Panel (Web Services for Atheme)                      */
/*                                                              */
/* author: 	J. Newing (synmuffin)                               */
/* web:		http://egs.ircmojo.org                              */
/* email: 	jnewing [at] gmail [dot] com                        */
/* irc: 	pool.ircmojo.org                                    */
/* version: 3.1                                                 */
/****************************************************************/


/**
 * Nickserv Controller
 * 
 */
class Nickserv extends CI_Controller {

	
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
	 * Construct
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->session->userdata('is_authed'))
			redirect('main');
	}
	// --------------------------------------------------------
	
	
	/**
	 * Index Page
	 * Page displays some basic user info on the given nickname
	 *
	 */
	public function index()
	{		
		$page_data = array();
		
		$this->form_validation->set_rules('nickname', 'Nickname', 'required');

		// default callback is on your own nick
		$callback = $this->nickserv_model->get_info();

		if ($this->form_validation->run())
			$callback = $this->nickserv_model->get_info($this->input->post('nickname'));
		
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');
		
		if ($callback['response'])
		{
			$tmp = $this->fout->nick_info($callback['data']);
			$page_data['response'] = implode("<br />", $tmp);
		}	
				
		$this->load->view('nickserv/main', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Email Page
	 * Page allows users to change their set email address associated with their nickname
	 *
	 */
	public function email()
	{	
		$page_data = array();
		
		$this->form_validation->set_rules('email', 'Account Email', 'required');
		
		if ($this->form_validation->run())
		{
			
			$callback = $this->nickserv_model->set_email($this->input->post('email'));

			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');
						
			$page_data['success'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}
		
		$this->load->view('nickserv/email', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Password Page
	 * Page allows users to manage their current nickname password
	 *
	 */
	public function password()
	{
		$page_data = array();
		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_again]');
		$this->form_validation->set_rules('password_again', 'Password Again', 'required');
		
		if ($this->form_validation->run())
		{
			$callback = $this->nickserv_model->set_password($this->input->post('password'));
			
			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');
			
			$page_data['success'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}
		
		$this->load->view('nickserv/password', $page_data); 
	}
	// --------------------------------------------------------
	
	
	/**
	 * json_access Page
	 * Page displayes a json list of channels that you have access to
	 * 
	 */
	public function json_access($json = true)
	{
		header("Content-Type: text/plain");
		
		if ($json)
		{
			$callback = $this->nickserv_model->list_chans();
			$channel_data = array();
			
			if ($callback['response'] && $callback['data'] > 1)
			{
				$channels = $callback['data'];
				array_pop($channels);
				
				$count = 1;
				foreach ($channels as $channel)
				{
					$buf = explode(" ", $channel);
					$tmp['id']	= $count;
					$tmp['text']	= $buf[4];
					$count++;
					
					array_push($channel_data, $tmp);
				}
			}
			
			print json_encode($channel_data);			
		}
	}
	// --------------------------------------------------------
	
	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================

}
