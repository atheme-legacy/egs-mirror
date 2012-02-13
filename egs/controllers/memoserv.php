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
 * Memoserv Controller
 * 
 */
class Memoserv extends CI_Controller {

	
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
	 * Page shows a list of memos
	 * 
	 */
	public function index()
	{
		$page_data = array();
		
		$callback = $this->memoserv_model->get_memos();
		
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');
		
		if ($callback['response'])
			$page_data['memos'] = $callback['data'];
		
		$this->load->view('memoserv/main', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Viewmemo Page
	 * Page displayes a memo based on the passed memo ID
	 *
	 */
	public function viewmemo($memoid = FALSE)
	{
		$page_data = array();
		
		if ($this->input->post('memoid'))
			$memoid = $this->input->post('memoid');
		
		if ($memoid)
		{
			$callback = $this->memoserv_model->get_memo($memoid);
			
			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');
	
			if ($callback['response'])
			{
				$page_data['response'] = $callback['data'];
				
				// get nickname
				preg_match('/Sent by (.*),/', $callback['data'], $match_data);
				$page_data['reply_nick'] = $match_data[1];
			}
		}
		else
		{
			$page_data['memoid'] = FALSE;
		}
		
		$this->load->view('memoserv/view', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Sendmemo Page
	 * Page allows users to send network memos.
	 *
	 */
	public function sendmemo($nickname = FALSE)
	{
		$page_data = array();
		
		if ($this->input->post('nickname'))
			$memoid = $this->input->post('nickname');
		
		$this->form_validation->set_rules('nickname', 'Nickname', 'required');
		$this->form_validation->set_rules('thememo', 'Memo', 'required');
				
		if ($nickname)
		{
			$page_data['nickname'] = $nickname;
			
			if ($this->form_validation->run())
			{
				$callback = $this->memoserv_model->send_memo();
				
				if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
					redirect('main/logout');
				
				$page_data['success'] = $callback['response'];
				$page_data['msg'] = $callback['data'];
			}
		}
		else
		{
			$page_data['nickname'] = FALSE;
			
			if ($this->form_validation->run())
			{
				$callback = $this->memoserv_model->send_memo();
				
				if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
					redirect('main/logout');
				
				$page_data['success'] = $callback['response'];
				$page_data['msg'] = $callback['data'];
			}
		}
		
		$this->load->view('memoserv/send', $page_data);
	}
	// --------------------------------------------------------
	
	
	/**
	 * Delmemo Page
	 * Page will allow users to delete specified memo's by ID
	 *
	 */
	public function delmemo($memoid = FALSE)
	{
	 	$page_data = array();
		
		if ($this->input->post('memoid'))
			$memoid = $this->input->post('memoid');
		
		$this->form_validation->set_rules('memoid', "Memo Number", 'require');
		
		if ($memoid)
		{
			$page_data['memoid'] = $memoid;
			
			if ($this->form_validation->run())
			{
				$callback = $this->memoserv_model->delete_memo($memoid);
				
				if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
					redirect('main/logout');
				
				$page_data['success'] = $callback['response'];
				$page_data['msg'] = $callback['data'];
			}
		}
		else
		{
			$page_data['memoid'] = FALSE;
		}
		
		$this->load->view('memoserv/delete', $page_data);
	}
	// --------------------------------------------------------
	 
	
	/**
	 * Forward Page
	 * Page allows users to forawrd memos.
	 *
	 */
	public function forward($memoid = FALSE)
	{
	  	$page_data = array();
	  	
	  	if ($this->input->post('memoid'))
	  		$memoid = $this->input->post('memoid');
	  	
	  	$this->form_validation->set_rules('nickname', 'Nick Name', 'required');
	  	$this->form_validation->set_rules('memoid', 'Memo ID', 'required');
	  	
	  	if ($memoid)
	  	{
	  		$page_data['memoid'] = $memoid;
	  		
	  		if ($this->form_validation->run())
	  		{
	  			$callback = $this->memoserv_model->fwd_memo($memoid, $this->input->post('nickname'));
	  			
	  			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
					redirect('main/logout');
				
				$page_data['success'] = $callback['response'];
				$page_data['msg'] = $callback['data'];
	  		}
		}
		else
		{
			$page_data['memoid'] = FALSE;
		}
	  	
	  	$this->load->view('memoserv/forward', $page_data);
	}
	// --------------------------------------------------------
	
	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================
	
	
}
