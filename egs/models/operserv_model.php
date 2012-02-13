<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * EGs Web Panel (Web Services for Atheme)
 *
 * author: J. Newing (synmuffin)
 * email: jnewing [at] gmail [dot] com
 * version: 3.0
 *
 */

/**
 * Operserv Model
 *
 */
class Operserv_model extends CI_Model {

	
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
	}
	// --------------------------------------------------------
	
	
	/**
	 * check_access()
	 * function will check for access to Operserv and return a bool value if users has access
	 * or not
	 *
	 */
	public function check_access()
	{
		$ret_array = array();

		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_operserv'),
			array(
				"HELP"
			)
		);

		if ($cmd)
			return TRUE;

		return FALSE;
	}
	// --------------------------------------------------------
	
	
	
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================
	
	
}
