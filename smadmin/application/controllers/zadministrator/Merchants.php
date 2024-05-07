<?php
	class Merchants extends CI_Controller{
		/*Merchants Active*/
		public function index($offset = 0){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'sadministrator/merchants/index/';
			$config['total_rows'] = $this->db->count_all('m_merchants');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'View Active Merchants - Zaffran PSP';
			$data['posts'] = $this->merchants_model->get_active_merchants(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/merchants/index', $data);
			$this->load->view('sadministrator/footertable');
			unset($_SESSION['success']);
			unset($_SESSION['warning']);
			unset($_SESSION['danger']);
		}
		public function getclosed_merchants($offset = 0){	
			
			$data['title'] = 'View Closed Merchants - Zaffran PSP';
			$data['posts'] = $this->merchants_model->get_closed_merchants(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/merchants/closed-merchants', $data);
			$this->load->view('sadministrator/footertable');
		}
		public function create(){
			// Check login
			// if(!$this->session->userdata('login')) {
			// 	redirect('administrator/index');
			// }
			unset($_SESSION['success']);
			unset($_SESSION['warning']);

			$data['title'] = 'Add Merchant';
			$this->form_validation->set_rules('msalutation', 'Salution', 'required|xss_clean');
			$this->form_validation->set_rules('mname', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('musername', 'User Name', 'trim|required|is_unique[m_merchants.musername]');
			$this->form_validation->set_rules('mpassword', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('memail', 'Email', 'trim|required|valid_emails|is_unique[m_merchants.memail]');
			$this->form_validation->set_rules('mcontact', 'Contact Number', 'required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[15]|is_unique[m_merchants.mcontact]');
			$this->form_validation->set_rules('mgender', 'Gender', 'required|xss_clean');
			$this->form_validation->set_rules('mdesignation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('mimstype', 'Merchant IM’S', 'required|xss_clean');
			$this->form_validation->set_rules('mimsid', 'Merchant IM’S-ID', 'required|xss_clean');
			$this->form_validation->set_rules('maddress', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('mcity', 'City', 'required|xss_clean');
			$this->form_validation->set_rules('mstate', 'State', 'required|xss_clean');
			$this->form_validation->set_rules('mzipcode', 'lang:valid_postcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('mcountry', 'Country', 'required|xss_clean');
			$this->form_validation->set_rules('mcurrency', 'Currency', 'required|xss_clean');
			$this->form_validation->set_rules('status', 'Profile Status', 'required|xss_clean');
			/*$this->form_validation->set_rules('login-radio', 'Can User Login To App', 'required|trim|is_numeric');
			$this->form_validation->set_rules('notifications-radio', 'Can User Receive Email Notifications', 'required|trim|is_numeric');*/
			$this->form_validation->set_rules('login-radio', 'Can User Login To App', 'required|xss_clean');
			$this->form_validation->set_rules('notifications-radio', 'Can User Receive Email Notifications', 'required|xss_clean');
			if($this->form_validation->run() === FALSE){
				$this->load->view('sadministrator/header-script');
		 	 	$this->load->view('sadministrator/header');
		  		$this->load->view('sadministrator/header-bottommain');
		   		$this->load->view('sadministrator/merchants/create', $data);
		  		$this->load->view('sadministrator/footertable');
			} 
			else {
					$new_image = time()."merchantskyc.".pathinfo($_FILES['mkyc']['name'], PATHINFO_EXTENSION);
					$config['upload_path'] = './assets/images/merchantskyc';
					$config['allowed_types'] = 'pdf|PDF';
					$config['max_size'] = '10000000';
					$config['file_name'] = $new_image;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
						if(!$this->upload->do_upload('mkyc')){
							$errors =  array('error' => $this->upload->display_errors());
        					$tempName= $_FILES['mkyc']['tmp_name'];
        					$filepath ="./assets/images/merchantskyc/";
        						if(move_uploaded_file($tempName,$filepath.$new_image)){
									$post_image =$new_image;
								}
								else{$post_image = '';}		
						}		
						else{
							$data =  array('upload_data' => $this->upload->data());
							$post_image = $new_image;		
						}
					$ins=$this->merchants_model->create($post_image);
					if($ins){
						$this->session->set_flashdata('success', 'Merchant Account Info has been Added Successfull.');
						redirect('sadministrator/merchants');
        			}
					else{
						$this->session->set_flashdata('warning', 'Merchant Info Not Added.');
						redirect('sadministrator/merchants');
					}

					
			}
		}
		public function edit($slug){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/
			$data['post'] = $this->merchants_model->get_all_merchants($slug);
			$data['title'] = 'Edit Merchant';
			$this->load->view('sadministrator/header-script');
		 	$this->load->view('sadministrator/header');
		 	$this->load->view('sadministrator/header-bottommain');
		    $this->load->view('sadministrator/merchants/edit', $data);
		    $this->load->view('sadministrator/footertable');
		}
		public function update(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/
			unset($_SESSION['success']);
			unset($_SESSION['warning']);
			$id =$this->input->post('id');
			$this->form_validation->set_rules('msalutation', 'Salution', 'required|xss_clean');
			$this->form_validation->set_rules('mname', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('musername', 'User Name', 'trim|required|edit_unique[m_merchants.musername.id.'.$id.']');
			$this->form_validation->set_rules('mpassword', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('memail', 'Email', 'trim|required|valid_emails|edit_unique[m_merchants.memail.id.'.$id.']');
			$this->form_validation->set_rules('mcontact', 'Contact Number', 'required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[15]|edit_unique[m_merchants.mcontact.id.'.$id.']');
			$this->form_validation->set_rules('mgender', 'Gender', 'required|xss_clean');
			$this->form_validation->set_rules('mdesignation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('mimstype', 'Merchant IM’S', 'required|xss_clean');
			$this->form_validation->set_rules('mimsid', 'Merchant IM’S-ID', 'required|xss_clean');
			$this->form_validation->set_rules('maddress', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('mcity', 'City', 'required|xss_clean');
			$this->form_validation->set_rules('mstate', 'State', 'required|xss_clean');
			$this->form_validation->set_rules('mzipcode', 'lang:valid_postcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('mcountry', 'Country', 'required|xss_clean');
			$this->form_validation->set_rules('mcurrency', 'Currency', 'required|xss_clean');
			$this->form_validation->set_rules('status', 'Profile Status', 'required|xss_clean');
			/*$this->form_validation->set_rules('login-radio', 'Can User Login To App', 'required|trim|is_numeric');
			$this->form_validation->set_rules('notifications-radio', 'Can User Receive Email Notifications', 'required|trim|is_numeric');*/
			$this->form_validation->set_rules('login-radio', 'Can User Login To App', 'required|xss_clean');
			$this->form_validation->set_rules('notifications-radio', 'Can User Receive Email Notifications', 'required|xss_clean');
			if($this->form_validation->run() === FALSE){
				$this->edit($this->input->post('id'));
			} 
			else {
			// Upload Image
				$new_image = time()."merchantskyc.".pathinfo($_FILES['mkyc']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/merchantskyc';
				$config['allowed_types'] = 'pdf|PDF';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);			
				if($_FILES['mkyc']['error']==0) {
					$this->upload->initialize($config);
					if(!$this->upload->do_upload('mkyc')){
						$errors =  array('error' => $this->upload->display_errors());
        				$tempName= $_FILES['mkyc']['tmp_name'];
        				$filepath ="./assets/images/merchantskyc/";
        				if(move_uploaded_file($tempName,$filepath.$new_image)){
							$post_image =$new_image;
						}
						else{
							$post_image = $this->input->post('fu');
						}		
					}
					else{					
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $new_image;		
					}
				}
				else{
					$post_image = $this->input->post('fu');
				}
				$this->merchants_model->update($post_image);
				$this->session->set_flashdata('success', 'Merchant Info has been updated.');
				redirect('sadministrator/merchants');
			}
	  	}
	  	/*business-profile*/
	  	public function getbusiness_profile($offset = 0){	
			
			$data['title'] = 'View Business Profile- Merchants - Zaffran PSP';
			$data['posts'] = $this->merchants_model->getbusiness_profile(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/merchants/business-profile', $data);
			$this->load->view('sadministrator/footertable');
			unset($_SESSION['success']);
			unset($_SESSION['warning']);
			unset($_SESSION['danger']);
		}
		public function get_sub_merchants(){
        	$category_id = $this->input->post('id',TRUE);
			//log_message('debug', 'Value of id is '+$this->input->post('id'));
        	//$data = $this->products_model->get_sellers($category_id)->result();
        	$data = $this->merchants_model->get_merchants($category_id);
        	echo json_encode($data['mname']);
			//	echo $data;
		}
		public function view_business_profile($slug){
			$data['post'] = $this->merchants_model->getbusiness_profile($slug);
			$data['categories'] = $this->merchants_model->get_all_merchants(FALSE);
			$data['title'] = 'View Business-Profile ';
			$this->load->view('sadministrator/header-script');
		 	$this->load->view('sadministrator/header');
		 	$this->load->view('sadministrator/header-bottommain');
		    $this->load->view('sadministrator/merchants/business-profile-view', $data);
		    $this->load->view('sadministrator/footertable');
		}
		public function edit_business_profile($slug){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/
			$data['post'] = $this->merchants_model->getbusiness_profile($slug);
			$data['categories'] = $this->merchants_model->get_all_merchants(FALSE);
			$data['title'] = 'View Business-Profile ';
			$this->load->view('sadministrator/header-script');
		 	$this->load->view('sadministrator/header');
		 	$this->load->view('sadministrator/header-bottommain');
		    $this->load->view('sadministrator/merchants/business-profile-edit', $data);
		    $this->load->view('sadministrator/footertable');
		}
		public function create_business_profile(){
			unset($_SESSION['success']);
			unset($_SESSION['warning']);

			$data['title'] = 'Add Business Profile- Merchant';
			$data['posts'] = $this->merchants_model->getbusiness_profile(FALSE);
			$data['categories'] = $this->merchants_model->get_all_merchants(FALSE);
			$this->form_validation->set_rules('merchantid', 'Merchant Id', 'required|xss_clean|is_unique[m_mbusiness.merchantid]');
			$this->form_validation->set_rules('mname', 'Merchant Name', 'required|xss_clean');
			$this->form_validation->set_rules('mbname', 'Business Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mbcategory', 'Business Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mbsubcategory', 'Business SubCategory', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mbwebsite', 'Website', 'required|xss_clean|is_unique[m_mbusiness.mbwebsite]');
			$this->form_validation->set_rules('mbcinno', 'Business Proof Type', 'trim|required|xss_clean|is_unique[m_mbusiness.mbcinno]');
			$this->form_validation->set_rules('mbcontact', 'Contact Number', 'required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[15]|is_unique[m_mbusiness.mbcontact]');
			$this->form_validation->set_rules('mbdescri', 'Description', 'required|xss_clean');
			$this->form_validation->set_rules('mbaddress', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('mbcity', 'City', 'required|xss_clean');
			$this->form_validation->set_rules('mbstate', 'State', 'required|xss_clean');
			$this->form_validation->set_rules('mbzipcode', 'lang:valid_postcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('mbcountry', 'Country', 'required|xss_clean');
			$this->form_validation->set_rules('mbimstype', 'Business IM’S', 'required|xss_clean');
			$this->form_validation->set_rules('mbimsid', 'Business IM’S-ID', 'required|xss_clean');
			$this->form_validation->set_rules('mbdocumentype', 'Document Type', 'required|xss_clean');
			// $this->form_validation->set_rules('mbdocumen', 'Document', 'required|xss_clean');
			$this->form_validation->set_rules('mbwirefee', 'Wire fee', 'required|xss_clean');
			$this->form_validation->set_rules('mbmonthlyfee', 'Monthly fee', 'required|xss_clean');
			$this->form_validation->set_rules('mbfrozenbalance', 'Frozen Balance', 'required|xss_clean');
			$this->form_validation->set_rules('mbwithdraw_minamt', 'Withdraw Minimum Amount', 'required|xss_clean');
			$this->form_validation->set_rules('mbwithdraw_maxamt', 'Withdraw  Maximum Amount', 'required|xss_clean');
			$this->form_validation->set_rules('requestfunds', 'Request Funds', 'required|xss_clean');
			$this->form_validation->set_rules('mbmoto', 'Moto', 'required|xss_clean');
			$this->form_validation->set_rules('mbpayoutgateway', 'Payout Gateway', 'required|xss_clean');
			$this->form_validation->set_rules('mbstatus', 'Business Status', 'required|xss_clean');
			if($this->form_validation->run() === FALSE){
				$this->load->view('sadministrator/header-script');
		 	 	$this->load->view('sadministrator/header');
		  		$this->load->view('sadministrator/header-bottommain');
		   		$this->load->view('sadministrator/merchants/business-profile-create', $data);
		  		$this->load->view('sadministrator/footertable');
			} 
			else {
				$new_image = time()."merchantsbuz.".pathinfo($_FILES['mbdocumen']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/merchantsbuz';
				$config['allowed_types'] = 'pdf|PDF';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('mbdocumen')){
						$errors =  array('error' => $this->upload->display_errors());
        				$tempName= $_FILES['mbdocumen']['tmp_name'];
        				$filepath ="./assets/images/merchantsbuz/";
        					if(move_uploaded_file($tempName,$filepath.$new_image)){
								$post_image =$new_image;
							}
							else{$post_image = '';}		
					}		
					else{
						$data =  array('upload_data' => $this->upload->data());
						$post_image = $new_image;		
					}
				$ins=$this->merchants_model->create_business_profile($post_image);
				if($ins){
					$this->session->set_flashdata('success', 'Merchant Business Info has been Added Successfull.');
					redirect('sadministrator/merchants/business-profile');
       			}
				else{
					$this->session->set_flashdata('warning', 'Merchant Business Info Not Added.');
					//redirect('sadministrator/merchants/business-profile');
				}

			}
		}
		/*business-profile*/

	}