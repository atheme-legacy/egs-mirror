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
 * Operserv Controller
 * 
 */
class Operserv extends CI_Controller {

	
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
				
		$this->load->view('operserv/main', $page_data);
	}
	// --------------------------------------------------------
	
	
	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================

}
