<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

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
 * Hostserv Model
 *
 */
class Hostserv_model extends CI_Model {

	
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
	 */
	public function __construct()
	{
		parent::__construct();
	}
	// --------------------------------------------------------
	
	
	/**
	 * host_offerlist()
	 * function will display the current list of offered vhosts via hostserv
	 *
	 * @return array 	- server response
	 *
	 */
	public function host_offerlist()
	{
		$ret_array = array();
		
		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_hostserv'),
			array(
				"OFFERLIST"
			)
		);
		
		if ($cmd)
		{
			$ret_array['response'] = TRUE;
			$ret_array['data'] = $this->fout->as_array($this->xmlrpc->display_response());
		}
		else
		{
			$ret_array['response'] = FALSE;
			$ret_array['data'] = $this->xmlrpc->display_error();
		}
		
		return $ret_array;
	}
	// --------------------------------------------------------
	
	
	/**
	 * host_request()
	 * function will request a offered hostname for your nick
	 *
	 * @return array	- server response
	 *
	 */
	public function host_request($hostname)
	{
		$ret_array = array();
		
		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_hostserv'),
			array(
				"REQUEST",
				$hostname
			)
		);
		
		if ($cmd)
		{
			$ret_array['response'] = TRUE;
			$ret_array['data'] = $this->xmlrpc->display_response();
		}
		else
		{
			$ret_array['response'] = FALSE;
			$ret_array['data'] = $this->xmlrpc->display_error();
		}
		
		return $ret_array;
	}
	// --------------------------------------------------------
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================
	
	
}
