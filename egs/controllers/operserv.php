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
	 */
	public function index()
	{
		// page data		
		$page_data = array();
		
		// setup rules for a global message
		if ($this->input->post('global_message'))
			$this->form_validation->set_rules('g_msg', 'Global Message', 'required');
		
		// setup rules for clearing a channel
		if ($this->input->post('clear_channel'))
			$this->form_validation->set_rules('channel', 'Channel', 'required');

		// did the user submit
		if ($this->form_validation->run())
		{
			// are we sending a global message?
			if ($this->input->post('global_message'))
				$callback = $this->operserv_model->send_global($this->input->post('g_msg'));

			// are we clearing a channel?
			if ($this->input->post('clear_channel'))
				$callback = $this->operserv_model->clear_channel($this->input->post('clear_action'), $this->input->post('channel'), $this->input->post('clear_reason'));
			
			// auth valid session
			if (!$callback['response'] && $callback['data'] == "Invalid authcookie for this account.")
                    redirect('main/logout');

            // atheme response
            $page_data['success'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}

		// get user opserserv specs
		$callback = $this->operserv_model->specs();

		// auth valid session
		if (!$callback['response'] && $callback['data'] == "Invalid authcookie for this account.")
			redirect('main/logout');

		$page_data['specs'] = $this->fout->as_array($callback['data']);

		// load the main view
		$this->load->view('operserv/main', $page_data);
	}
	// --------------------------------------------------------

	
	/**
	 * AKill Page
	 * Page controls all the akill stuff
	 */
	public function akill()
	{
		// page data
		$page_data = array();

		// form validation rules for adding an akill
		if ($this->input->post('add_akill'))
		{
			$this->form_validation->set_rules('nick_host', 'Nickname or Hostmask', 'requried');
			$this->form_validation->set_rules('akill_type', 'Type of AKill', 'required');
		}

		// form validation rules for deleting an akill
		if ($this->input->post('del_akill'))
		{
			$this->form_validation->set_rules('akill_id', 'AKill ID', 'required');
		}

		// did the user submit?
		if ($this->form_validation->run())
		{
			// adding an akill
			if ($this->input->post('add_akill'))
				$callback = $this->operserv_model->akill_add($this->input->post('nick_host'), $this->input->post('akill_type'), $this->input->post('duration'), $this->input->post('reason'));

			// deleting an akill
			if ($this->input->post('del_akill'))
				$callback = $this->operserv_model->akill_del($this->input->post('akill_id'));

			// auth valid session
			if (!$callback['response'] && $callback['data'] == "Invalid authcookie for this account.")
                    redirect('main/logout');

            // atheme response
            $page_data['success'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}

		// get currently akill list
		$callback = $this->operserv_model->akill_list();

		// auth check
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		if ($callback['response'])
			$page_data['info'] = $this->fout->as_akills($this->fout->as_array($callback['data']));

		$this->load->view('operserv/akill', $page_data);
	}
	// --------------------------------------------------------


	/**
	 * Modules Page
	 * Page deals with all the module stuff, loading, unloading etc...
	 */
	public function modules()
	{
		// page data
		$page_data = array();

		$callback = $this->operserv_model->module_list();

		// auth check
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		$page_data['info'] = $this->fout->as_array($callback['data']);

		// load the main view
		$this->load->view('operserv/modules', $page_data);
	}
	// --------------------------------------------------------
	

	/**
	 * Rehash Page 
	 * Page will rehash Atheme Services
	 */
	public function rehash()
	{
		// page data
		$page_data = array();

		//$callback = $this->operserv_model->rehash();
		$callback = $this->operserv_model->specs();

		// auth check
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		// atheme response
		$page_data['success'] =  $page_data['info'] = $callback['response'];
		$page_data['msg'] = $callback['data'];

		// load the main view
		$this->load->view('operserv/modules', $page_data);
	}
	// --------------------------------------------------------

	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================

}
