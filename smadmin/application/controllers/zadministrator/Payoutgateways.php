<?php
	class Payoutgateways extends CI_Controller{
		/*bank accounts*/
		public function index($offset = 0){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'sadministrator/accounts/index/';
			$config['total_rows'] = $this->db->count_all('m_smpayout_saltmanagement');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'List Payout Gateway - Salt Management';
			$data['posts'] = $this->payoutgateways_model->get_payoutgateways(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/payoutgateways/index', $data);
			//$this->load->view('sadministrator/crm/transactions', $data);
			$this->load->view('sadministrator/footertable');
		}



		
	}