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

	
	public function akill()
	{
		$page_data = array();

		if ($this->input->post('add_akill'))
		{
			$this->form_validation->set_rules('nick_host', 'Nickname or Hostmask', 'requried');
			$this->form_validation->set_rules('akill_type', 'Type of AKill', 'required');
		}

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

		$callback = $this->operserv_model->akill_list();

		// auth check
		if (!$callback['response'] && $callback['data'] == $this->lang->line('error_invalid_authcookie'))
			redirect('main/logout');

		if ($callback['response'])
			$page_data['info'] = $this->fout->as_akills($this->fout->as_array($callback['data']));

		$this->load->view('operserv/akill', $page_data);
	}
	// --------------------------------------------------------
	
	
	//========================================================
	// CALLBACK FUNCTIONS
	//========================================================
	
	
	//========================================================
	// PRIVATE FUNCTIONS
	//========================================================

}
