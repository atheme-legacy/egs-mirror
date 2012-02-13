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
 * Nickserv Model
 *
 */
class Nickserv_model extends CI_Model {

	
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
	 * get_info()
	 * function will return info on the nickname currently logged in
	 *
	 * @param string $nickname	- string of the nickname you wish to issue the /info command on
	 * @return array			- server response
	 * 
	 */
	public function get_info($nickname = FALSE)
	{
		$ret_array = array();
		
		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_nickserv'),
			array(
				"INFO",
				(($nickname) ? $nickname : $this->session->userdata('nick'))
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
	
	
	/**
	 * list_chans()
	 * function will get a list of all channels that you current have access to
	 *
	 * @return array	- server response
	 *
	 */
	public function list_chans()
	{
		$ret_array = array();
		
		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_nickserv'),
			array(
				"LISTCHANS"
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
	 * set_email()
	 * function will allow the user to set the email address assoicated with their account
	 *
	 * @param string $email		- email they wish to set
	 * @return array			- server response
	 *
	 */
	public function set_email($email)
	{
		$ret_array = array();
		
		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_nickserv'),
			array(
				"SET",
				"EMAIL",
				$email
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
	
	
	/**
	 * set_password()
	 * function allows users to change the password assoicated with their account
	 *
	 * @param string $password	- password you wish to change
	 * @return array			- server response
	 *
	 */
	public function set_password($password)
	{
		$ret_array = array();
		
		$cmd = $this->atheme->atheme_command($this->session->userdata('nick'), $this->session->userdata('auth'), $this->config->item('atheme_nickserv'),
			array(
				"SET",
				"PASSWORD",
				$password
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
	
	
	/**
	 * register()
	 * function allows users to register a nickname
	 *
	 * @param string $nickname	- nickname you wish to register
	 * @param string $password	- password to register the nickname with
	 * @param string $email		- email to assoc. with the account
	 * @return array			- server response
	 *
	 */
	public function register($nickname, $password, $email)
	{
	    $ret_array = array();
	    
	    $cmd = $this->atheme->atheme_command('*', '*', $this->config->item('atheme_nickserv'),
	        array(
	            "REGISTER",
	            $nickname,
	            $password,
	            $email
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
