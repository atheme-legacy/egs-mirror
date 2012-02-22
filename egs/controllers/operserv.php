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

		// validation rules for loading a module
		if ($this->input->post('load_module'))
			$this->form_validation->set_rules('module_name', 'Module Name', 'required');

		// validation rules for unloading a module
		if ($this->input->post('unload_module'))
			$this->form_validation->set_rules('module_name', 'Module Name', 'required');

		// did the user submit?
		if ($this->form_validation->run())
		{
			// are we loading a module?
			if ($this->input->post('load_module'))
				$callback = $this->operserv_model->module_load($this->input->post('module_name'));

			// are we unloading a module?
			if ($this->input->post('unload_module'))
				$callback = $this->operserv_model->module_unload($this->input->post('module_name'));

			// auth check
			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');

			// atheme response
			$page_data['success'] =  $page_data['info'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}

		// get modules list
		$callback = $this->operserv_model->module_list();
		
		// auth check
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		// clean modules list for options list
		$page_data['modules'] = $this->fout->as_modules($this->fout->as_array($callback['data']));

		// load the main view
		$this->load->view('operserv/modules', $page_data);
	}
	// --------------------------------------------------------
	

	/**
	 * Soper Page
	 * Page deals with all opserserv soper stuff
	 */
	public function soper()
	{
		// page data
		$page_data = array();

		// validation rules for adding a soper
		if ($this->input->post('add_soper'))
		{
			$this->form_validation->set_rules('soper_name', 'Soper Name', 'required');
			$this->form_validation->set_rules('soper_class', 'Soper Class', 'required');
		}

		// validation rules for removing soper
		if ($this->input->post('del_soper'))
			$this->form_validation->set_rules('soper_name', 'Soper Name', 'required');

		// did the user submit
		if ($this->form_validation->run())
		{
			// are we adding a soper?
			if ($this->input->post('add_soper'))
				$callback = $this->operserv_model->soper_add($this->input->post('soper_name'), $this->input->post('soper_class'));

			// are we removing a soper
			if ($this->input->post('del_soper'))
				$callback = $this->operserv_model->soper_del($this->input->post('soper_name'));

			// auth check
			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');

			// atheme response
			$page_data['success'] =  $page_data['info'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}

		// get soper list
		$callback = $this->operserv_model->soper_list();

		// auth check
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		// clean modules list for options list
		$page_data['sopers'] = $this->fout->as_sopers( $this->fout->as_array($callback['data']) );

		// load view
		$this->load->view('operserv/soper', $page_data);
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

		// validation rules
		$this->form_validation->set_rules('rehash_check', 'Rehash Confirm', 'required|callback__rehash_confirm');

		if ($this->form_validation->run())
		{
			// issue rehash command
			$callback = $this->operserv_model->rehash();

			// auth check
			if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
				redirect('main/logout');

			// atheme response
			$page_data['success'] =  $page_data['info'] = $callback['response'];
			$page_data['msg'] = $callback['data'];
		}

		// load the main view
		$this->load->view('operserv/rehash', $page_data);
	}
	// --------------------------------------------------------

	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	

	/**
	 * _rehash_confirm()
	 * function will make sure the user enters "YES" into the confirm box
	 * 
	 * @param string $str 	- the string to confirm as a "YES"
	 */
	public function _rehash_confirm($str)
	{
		if ($str === "YES")
			return TRUE;

		$this->form_validation->set_message('_rehash_confirm', 'You must confirm a rehash by entering "YES" into the %s field.');
		return FALSE;
	}
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================

}
