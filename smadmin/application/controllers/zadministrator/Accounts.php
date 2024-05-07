<?php
	class Accounts extends CI_Controller{

		/*zaffran-bank accounts*/
		public function index($offset = 0){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'sadministrator/accounts/index/';
			$config['total_rows'] = $this->db->count_all('m_banks');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'List Bank Accounts - Zaffran PSP';
			$data['posts'] = $this->accounts_model->get_zaffranbanks(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/accounts/index', $data);
			//$this->load->view('sadministrator/crm/transactions', $data);
			$this->load->view('sadministrator/footertable');
		}
		
		/*create zaffran-bank accounts*/
		public function create(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zbanks.".pathinfo($_FILES['adbdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/banks';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = '10000000';
			$config['file_name'] = $new_image;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('adbdocument')){
				$errors =  array('error' => $this->upload->display_errors());
        		$tempName= $_FILES['adbdocument']['tmp_name'];
        		$filepath ="./assets/images/banks/";
        		if(move_uploaded_file($tempName,$filepath.$new_image)){
					$post_image =$new_image;
				}
				//else{$post_image = 'nofile.pdf';}
				else{$post_image = '';}		
			}		
			else{
				$data =  array('upload_data' => $this->upload->data());
				$post_image = $new_image;		
			}
			$upd=$this->accounts_model->create($post_image);
			if($upd){
				$this->session->set_flashdata('success', 'Bank Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Bank has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Bank Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Bank has been not submitted');
			}
        	echo json_encode($data);
		}
		/*create zaffran-bank accounts*/
		/*Update zaffran-bank accounts*/
		public function update(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zbanks.".pathinfo($_FILES['edbdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/banks';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = '10000000';
			$config['file_name'] = $new_image;
			$this->load->library('upload', $config);
			if($_FILES['edbdocument']['error']==0) {
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('edbdocument')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['edbdocument']['tmp_name'];
        			$filepath ="./assets/images/banks/";
        			if(move_uploaded_file($tempName,$filepath.$new_image)){
						$post_image =$new_image;
					}
					//else{$post_image = 'nofile.pdf';}
					else{$post_image = $this->input->post('fu');}
				}		
				else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $new_image;		
				}
			}
			else{
					$post_image = $this->input->post('fu');
			}
			$upd=$this->accounts_model->update($post_image);
			if($upd){
				$this->session->set_flashdata('success', 'Bank Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Bank has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Bank Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Bank has been not submitted');
			}
        	echo json_encode($data);
		}
		/*Update zaffran-bank accounts*/
		/*Delete zaffran-bank accounts*/
		/*Delete zaffran-bank accounts*/
		/*zaffran-bank accounts*/

		/*zaffran-crypto accounts*/
		public function zaffran_crypto()
		{
			$data['posts'] = $this->accounts_model->get_zaffran_crypto(FALSE);
			$data['title'] = 'List Crypto Accounts - Zaffran PSP';
			$this->load->view('sadministrator/header-script');
	 	 	$this->load->view('sadministrator/header');
	  		$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/accounts/zaffran-crypto', $data);
	  		$this->load->view('sadministrator/footertable');
		}
		/*create zaffran-crypto accounts*/
		public function create_zaffran_crypto(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zcrypto.".pathinfo($_FILES['adcdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/crypto';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = '10000000';
			$config['file_name'] = $new_image;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('adcdocument')){
				$errors =  array('error' => $this->upload->display_errors());
        		$tempName= $_FILES['adcdocument']['tmp_name'];
        		$filepath ="./assets/images/crypto/";
        		if(move_uploaded_file($tempName,$filepath.$new_image)){
					$post_image =$new_image;
				}
				//else{$post_image = 'nofile.pdf';}
				else{$post_image = '';}		
			}		
			else{
				$data =  array('upload_data' => $this->upload->data());
				$post_image = $new_image;		
			}
			$upd=$this->accounts_model->create_zaffran_crypto($post_image);
			if($upd){
				$this->session->set_flashdata('success', 'Crypto Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Crypto has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Crypto Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Crypto has been not submitted');
			}
        	echo json_encode($data);
		}
		/*create zaffran-bank accounts*/
		/*Update zaffran-crypto accounts*/
		public function update_zaffran_crypto(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zcrypto.".pathinfo($_FILES['edcdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/crypto';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = '10000000';
			$config['file_name'] = $new_image;
			$this->load->library('upload', $config);
			if($_FILES['edcdocument']['error']==0) {
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('edcdocument')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['edcdocument']['tmp_name'];
        			$filepath ="./assets/images/crypto/";
        			if(move_uploaded_file($tempName,$filepath.$new_image)){
						$post_image =$new_image;
					}
					//else{$post_image = 'nofile.pdf';}
					else{$post_image = $this->input->post('fu');}
				}		
				else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $new_image;		
				}
			}
			else{
					$post_image = $this->input->post('fu');
			}
			$upd=$this->accounts_model->update_zaffran_crypto($post_image);
			if($upd){
				$this->session->set_flashdata('success', 'Crypto Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Crypto has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Crypto Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Crypto has been not submitted');
			}
        	echo json_encode($data);
		}
		/*Update zaffran-crypto accounts*/
		/*zaffran-crypto accounts*/
		/*zaffran-wallets accounts*/
		public function zaffran_wallets()
		{
			$data['posts'] = $this->accounts_model->get_zaffran_wallets(FALSE);
			$data['title'] = 'List Wallets Accounts - Zaffran PSP';
			$this->load->view('sadministrator/header-script');
	 	 	$this->load->view('sadministrator/header');
	  		$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/accounts/zaffran-wallets', $data);
	  		$this->load->view('sadministrator/footertable');
		}
		/*create zaffran-wallets accounts*/
		public function create_zaffran_wallets(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zwallets.".pathinfo($_FILES['adwdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/wallets';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = '10000000';
			$config['file_name'] = $new_image;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('adwdocument')){
				$errors =  array('error' => $this->upload->display_errors());
        		$tempName= $_FILES['adwdocument']['tmp_name'];
        		$filepath ="./assets/images/wallets/";
        		if(move_uploaded_file($tempName,$filepath.$new_image)){
					$post_image =$new_image;
				}
				//else{$post_image = 'nofile.pdf';}
				else{$post_image = '';}		
			}		
			else{
				$data =  array('upload_data' => $this->upload->data());
				$post_image = $new_image;		
			}
			$upd=$this->accounts_model->create_zaffran_wallets($post_image);
			if($upd){
				$this->session->set_flashdata('success', 'Wallets Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Wallets has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Wallets Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Wallets has been not submitted');
			}
        	echo json_encode($data);
		}
		/*create zaffran-wallets accounts*/
		/*Update zaffran-wallets accounts*/
		public function update_zaffran_wallets(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zwallets.".pathinfo($_FILES['edwdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/wallets';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = '10000000';
			$config['file_name'] = $new_image;
			$this->load->library('upload', $config);
			if($_FILES['edwdocument']['error']==0) {
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('edwdocument')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['edwdocument']['tmp_name'];
        			$filepath ="./assets/images/wallets/";
        			if(move_uploaded_file($tempName,$filepath.$new_image)){
						$post_image =$new_image;
					}
					//else{$post_image = 'nofile.pdf';}
					else{$post_image = $this->input->post('fu');}
				}		
				else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $new_image;		
				}
			}
			else{
					$post_image = $this->input->post('fu');
			}
			$upd=$this->accounts_model->update_zaffran_wallets($post_image);
			if($upd){
				$this->session->set_flashdata('success', 'Wallets Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Wallets has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Wallets Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Wallets has been not submitted');
			}
        	echo json_encode($data);
		}
		/*Update zaffran-wallets accounts*/
		/*zaffran-wallets accounts*/

		/*Merchants-banks accounts*/
		public function merchants_banks()
		{
			$data['posts'] = $this->accounts_model->get_merchants_banks(FALSE);
			$data['title'] = 'List Bank Accounts - Zaffran Merchants';
			$this->load->view('sadministrator/header-script');
	 	 	$this->load->view('sadministrator/header');
	  		$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/accounts/zaffran-merchants-bank', $data);
	  		$this->load->view('sadministrator/footertable');
		}
		/*Merchants-banks accounts*/
		/*Merchants-crypto accounts*/
		public function merchants_crypto()
		{
			$data['posts'] = $this->accounts_model->get_merchants_crypto(FALSE);
			$data['title'] = 'List Crypto Accounts - Zaffran Merchants';
			$this->load->view('sadministrator/header-script');
	 	 	$this->load->view('sadministrator/header');
	  		$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/accounts/zaffran-merchants-crypto', $data);
	  		$this->load->view('sadministrator/footertable');
		}
		/*Merchants-crypto accounts*/
		/*Merchants-wallets accounts*/
		public function merchants_wallets()
		{
			$data['posts'] = $this->accounts_model->get_merchants_wallets(FALSE);
			$data['title'] = 'List Wallets Accounts - Zaffran Merchants';
			$this->load->view('sadministrator/header-script');
	 	 	$this->load->view('sadministrator/header');
	  		$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/accounts/zaffran-merchants-wallets', $data);
	  		$this->load->view('sadministrator/footertable');
		}

		/*Merchants-wallets accounts*/

		
	}