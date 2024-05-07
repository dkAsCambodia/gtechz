<?php
	class Transactions extends CI_Controller{
		/*Transactions-Office*/
		//public function transactions_office($offset = 0){	
			//// Pagination Config	
			////$config['base_url'] = base_url() . 'sadministrator/accounts/index/';
			//$config['total_rows'] = $this->db->count_all('m_payin');
			//$config['per_page'] = 3;
			//$config['uri_segment'] = 3;
			//$config['attributes'] = array('class' => 'paginate-link');
			//$slug1='source1';
			//// Init Pagination
			//$this->pagination->initialize($config);
			//$data['title'] = 'List Payin Transactions Office  - Source1 Gateway';
			//$data['posts'] = $this->transactions_model->get_m_payin($slug1,FALSE);
		  	//$this->load->view('sadministrator/header-script');
			//$this->load->view('sadministrator/header');
			//$this->load->view('sadministrator/header-bottommain');
			//$this->load->view('sadministrator/transactions/index', $data);
			////$this->load->view('sadministrator/crm/transactions', $data);
			//$this->load->view('sadministrator/footertable');
		//}
		public function transactions_others($offset = 0){
			date_default_timezone_set('Asia/Kolkata');
			$data['title'] = 'List Payin Transactions Others  - Other Gateways';
			//$data['posts'] = $this->transactions_model->get_m_payinother($slug1,FALSE);
			$slug4="source19";
			$slug3=1;
			$formSubmit = $this->input->post('submitForm');
			if(isset($formSubmit)){
				if( $formSubmit == 'viewdate' ){
					$this->form_validation->set_rules('startdate', 'Start Date', 'trim|required|xss_clean');
					$this->form_validation->set_rules('enddate', 'End Date', 'trim|required|xss_clean');

					if($this->form_validation->run() === FALSE){
						$data['posts'] = $this->transactions_model->get_m_payinothers(FALSE,FALSE,FALSE,$slug4,FALSE);
						$data['cashcounts'] = $this->transactions_model->get_m_cashcounts(FALSE,FALSE,FALSE,$slug3,$slug4,FALSE);
						$this->load->view('sadministrator/header-script');
						$this->load->view('sadministrator/header');
						$this->load->view('sadministrator/header-bottommain');
						$this->load->view('sadministrator/transactions/others', $data);
						$this->load->view('sadministrator/footertable');

					}
					else{

						$slug1 = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('startdate'))));
						$slug2 = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('enddate'))));
						$data['posts'] = $this->transactions_model->get_m_payinothers($slug1,$slug2,FALSE,$slug4,FALSE);
						$data['cashcounts'] = $this->transactions_model->get_m_cashcounts($slug1,$slug2,FALSE,$slug4,FALSE);
						
						//Calculate Deposit Charges START
						$data['cashcounts'][0]['deposit_charge']='1.3';
						if(isset($data['cashcounts'][0]['totprice']) && $data['cashcounts'][0]!="" ){
								$deposit=number_format($data['cashcounts'][0]['totprice'],2, '.', '');  
								
								$deposit_charge='1.3';
								$new_width = ($deposit_charge / 100) * $deposit;
								$deposit_val= $deposit-$new_width;
								$data['cashcounts'][0]['net_deposit']=round($deposit_val, 2);  

						}else{ 
							$data['cashcounts'][0]['net_deposit']='0.0';
						}
						//Calculate Deposit Charges END

						//Calculate withdrawal Charges START
						 $data['cashcounts'][2]['withdrawal_charge']='0';
						if(isset($data['cashcounts'][2]['totprice']) &&  $data['cashcounts'][2]!="" ){
								$withdrawal=number_format($data['cashcounts'][2]['totprice'],2, '.', '');  
								
								$withdrawal_charge='0';
								$new_width2 = ($withdrawal_charge / 100) * $withdrawal;
								$withdrawal_val= $withdrawal-$new_width2;
								$data['cashcounts'][2]['net_withdrawal']=round($withdrawal_val, 2);  

						}else{ 
							
							$data['cashcounts'][2]['net_withdrawal']='0';
					
						}
						//Calculate withdrawal Charges END

						// Calculate Available Balance Code START
						if (isset($data['cashcounts'][0]['net_deposit']) && !empty($data['cashcounts'][0]['net_deposit']) ) {
							$data['cashcounts']['saving_amt']=$data['cashcounts'][0]['net_deposit']-$data['cashcounts'][2]['net_withdrawal'];
						}else{
							$data['cashcounts']['saving_amt']= "0";
						}
						// Calculate Available Balance Code START
						// echo "viewdate"."<pre>"; print_r($data['cashcounts']); die;
						

						$this->load->view('sadministrator/header-script');
						$this->load->view('sadministrator/header');
						$this->load->view('sadministrator/header-bottommain');
						$this->load->view('sadministrator/transactions/others', $data);
						$this->load->view('sadministrator/footertable');
						
						
					}

					
				}
				else if( $formSubmit == 'viewtoday' ){

					$data['posts'] = $this->transactions_model->get_m_payinothers(FALSE,FALSE,FALSE,$slug4,FALSE);
					$data['cashcounts'] = $this->transactions_model->get_m_cashcounts(FALSE,FALSE,FALSE,$slug4,FALSE);
					
					//Calculate Deposit Charges START
					$data['cashcounts'][0]['deposit_charge']='1.3';
					if(isset($data['cashcounts'][0]['totprice']) && $data['cashcounts'][0]!="" ){
							$deposit=number_format($data['cashcounts'][0]['totprice'],2, '.', '');  
							
							$deposit_charge='1.3';
							$new_width = ($deposit_charge / 100) * $deposit;
							$deposit_val= $deposit-$new_width;
							$data['cashcounts'][0]['net_deposit']=round($deposit_val, 2);  

					}else{ 
						$data['cashcounts'][0]['net_deposit']='0.0';
					}
					//Calculate Deposit Charges END

					//Calculate withdrawal Charges START
					 $data['cashcounts'][2]['withdrawal_charge']='0';
					if(isset($data['cashcounts'][2]['totprice']) &&  $data['cashcounts'][2]!="" ){
							$withdrawal=number_format($data['cashcounts'][2]['totprice'],2, '.', '');  
							
							$withdrawal_charge='0';
							$new_width2 = ($withdrawal_charge / 100) * $withdrawal;
							$withdrawal_val= $withdrawal-$new_width2;
							$data['cashcounts'][2]['net_withdrawal']=round($withdrawal_val, 2);  

					}else{ 
						
						$data['cashcounts'][2]['net_withdrawal']='0';
				
					}
					//Calculate withdrawal Charges END

					// Calculate Available Balance Code START
					if (isset($data['cashcounts'][0]['net_deposit']) && !empty($data['cashcounts'][0]['net_deposit']) ) {
						$data['cashcounts']['saving_amt']=$data['cashcounts'][0]['net_deposit']-$data['cashcounts'][2]['net_withdrawal'];
					}else{
						$data['cashcounts']['saving_amt']= "0";
					}
					// Calculate Available Balance Code START
					// echo "viewtoday"."<pre>"; print_r($data['cashcounts']); die;

					$this->load->view('sadministrator/header-script');
					$this->load->view('sadministrator/header');
					$this->load->view('sadministrator/header-bottommain');
					$this->load->view('sadministrator/transactions/others', $data);
					$this->load->view('sadministrator/footertable');

				}
				else if( $formSubmit == 'viewall' ){
					$data['posts'] = $this->transactions_model->get_m_payinothers(FALSE,FALSE,$slug3,$slug4,FALSE);
					$data['cashcounts'] = $this->transactions_model->get_m_cashcounts(FALSE,FALSE,$slug3,$slug4,FALSE);

					//Calculate Deposit Charges START
					$data['cashcounts'][0]['deposit_charge']='1.3';
					if(isset($data['cashcounts'][0]['totprice']) && $data['cashcounts'][0]!="" ){
							$deposit=number_format($data['cashcounts'][0]['totprice'],2, '.', '');  
							
							$deposit_charge='1.3';
							$new_width = ($deposit_charge / 100) * $deposit;
							$deposit_val= $deposit-$new_width;
							$data['cashcounts'][0]['net_deposit']=round($deposit_val, 2);  

					}else{ 
						$data['cashcounts'][0]['net_deposit']='0.0';
					}
					//Calculate Deposit Charges END

					//Calculate withdrawal Charges START
					 $data['cashcounts'][2]['withdrawal_charge']='0';
					if(isset($data['cashcounts'][2]['totprice']) &&  $data['cashcounts'][2]!="" ){
							$withdrawal=number_format($data['cashcounts'][2]['totprice'],2, '.', '');  
							
							$withdrawal_charge='0';
							$new_width2 = ($withdrawal_charge / 100) * $withdrawal;
							$withdrawal_val= $withdrawal-$new_width2;
							$data['cashcounts'][2]['net_withdrawal']=round($withdrawal_val, 2);  

					}else{ 
						
						$data['cashcounts'][2]['net_withdrawal']='0';
				
					}
					//Calculate withdrawal Charges END

					// Calculate Available Balance Code START
					if (isset($data['cashcounts'][0]['net_deposit']) && !empty($data['cashcounts'][0]['net_deposit']) ) {
						$data['cashcounts']['saving_amt']=$data['cashcounts'][0]['net_deposit']-$data['cashcounts'][2]['net_withdrawal'];
					}else{
						$data['cashcounts']['saving_amt']= "0";
					}
					// Calculate Available Balance Code START
					// echo "viewall"."<pre>"; print_r($data['cashcounts']); die;

					$this->load->view('sadministrator/header-script');
					$this->load->view('sadministrator/header');
					$this->load->view('sadministrator/header-bottommain');
					$this->load->view('sadministrator/transactions/others', $data);
					$this->load->view('sadministrator/footertable');

				}
				else {

					
					$data['posts'] = $this->transactions_model->get_m_payinothers(FALSE,FALSE,FALSE,$slug4,FALSE);
					$data['cashcounts'] = $this->transactions_model->get_m_cashcounts(FALSE,FALSE,FALSE,$slug4,FALSE);
					$this->load->view('sadministrator/header-script');
					$this->load->view('sadministrator/header');
					$this->load->view('sadministrator/header-bottommain');
					$this->load->view('sadministrator/transactions/others', $data);
					$this->load->view('sadministrator/footertable');
				}
			}
			else{
				
				$data['posts'] = $this->transactions_model->get_m_payinothers(FALSE,FALSE,FALSE, $slug4,FALSE);
				$data['cashcounts'] = $this->transactions_model->get_m_cashcounts(FALSE,FALSE,FALSE,$slug4,FALSE);
				//var_dump($data['cashcounts']);
				//exit();
				$this->load->view('sadministrator/header-script');
				$this->load->view('sadministrator/header');
				$this->load->view('sadministrator/header-bottommain');
				$this->load->view('sadministrator/transactions/others', $data);
				$this->load->view('sadministrator/footertable');

			}
		
		}
		public function transactions_otherz($offset = 0){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'sadministrator/accounts/index/';
			$config['total_rows'] = $this->db->count_all('m_payin');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			$slug1='source1';
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'List Payin Transactions Others  - Other Gateways';
			$data['posts'] = $this->transactions_model->get_m_payinothers($slug1,FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/transactions/others', $data);
			//$this->load->view('sadministrator/crm/transactions', $data);
			$this->load->view('sadministrator/footertable');
		}
		public function payout_others($offset = 0){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'sadministrator/accounts/index/';
			$config['total_rows'] = $this->db->count_all('m_payin');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			// Init Pagination
			$this->pagination->initialize($config);
			$data['title'] = 'List Payout Transactions Others  - All Gateways';
			$data['posts'] = $this->transactions_model->get_m_payout_others(FALSE);
		  	$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/transactions/payout-others', $data);
			//$this->load->view('sadministrator/crm/transactions', $data);
			$this->load->view('sadministrator/footertable');
		}
		/*update_trnz*/
		public function update_trnz(){
			// Check login
			/*if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}*/

			$new_image = time()."zbanks.".pathinfo($_FILES['edbdocument']['name'], PATHINFO_EXTENSION);
			$config['upload_path'] = './assets/images/banks';
			$config['allowed_types'] = 'pdf|PDF|gif|jpg|png|jpeg';
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
			$upd=$this->transactions_model->update_trnz($post_image);
			if($upd){
						$this->session->set_flashdata('success', 'Bank Slip Info has been Added Successfull.');
						//redirect('sadministrator/transactions/others');
						header('Location: ' . $_SERVER['HTTP_REFERER']);
        			}
					else{
						$this->session->set_flashdata('warning', 'Bank Slip Info Not Added.');
						//redirect('sadministrator/transactions/others');
						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
			/*if($upd){
				$this->session->set_flashdata('success', 'Bank Slip Info has been Added Successfull.');
        		$data = array('success' => true, 'msg'=> 'Bank Slip has been submitted successfully');
        	}
			else{
				$this->session->set_flashdata('warning', 'Bank Slip Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Bank Slip has been not submitted');
			}
        	echo json_encode($data);*/
		}
		




		
	}