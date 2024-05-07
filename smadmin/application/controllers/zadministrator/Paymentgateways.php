<?php
	class Paymentgateways extends CI_Controller{
		/*Payment-gateways accounts*/
		public function index($offset = 0){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'sadministrator/accounts/index/';
			$config['total_rows'] = $this->db->count_all('m_smsaltmanagement');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'List Payment Gateway - Salt Management';
			$data['posts'] = $this->paymentgateways_model->get_paymentgateways(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/paymentgateways/index', $data);
			//$this->load->view('sadministrator/crm/transactions', $data);
			$this->load->view('sadministrator/footertable');
		}




		
	}