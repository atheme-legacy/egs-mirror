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
 * Hostserv Controller
 * 
 */
class Hostserv extends CI_Controller {

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
		
		if (!$this->session->userdata('is_authed'))
			redirect('main');
	}
	// --------------------------------------------------------
	
	
	/**
	 * Index Page
	 *
	 */
	public function index()
	{
		// durp?
	}
	// --------------------------------------------------------
	
	
	/**
	 * Hostserv Offer List Page
	 * Page allows users to view the current Hostserv offer list.
	 *
	 */
	public function offerlist()
	{
		$page_data = array();
		
		$callback = $this->hostserv_model->host_offerlist();
			
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');
			
		$page_data['response'] = $callback['data'];
		
		$this->load->view('hostserv/list', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Request Page
	 * Page allows users to request a host via Hostserv
	 *
	 */
	public function request()
	{
		$page_data = array();
		
		$this->form_validation->set_rules('hostname', 'Hostname', 'required');
		
		if ($this->form_validation->run())
		{
			$callback = $this->hostserv_model->host_request($this->input->post('hostname'));
			
			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');
				
			$page_data['success'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}
		
		$this->load->view('hostserv/request', $page_data);
	}
	// --------------------------------------------------------
	
	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================
	
}
