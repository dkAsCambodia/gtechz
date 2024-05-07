<?php 

	class Sadministrator extends CI_Controller{

		//Log login,dashbard,enable,delete,check
		public function view($page = 'index'){
			if($this->session->userdata('sadminlogin')) {
    			redirect('sadministrator/dashboard');
   			}
   			if (!file_exists(APPPATH.'views/sadministrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			
			//$this->load->view('common/header-script');
			//$this->load->view('common/header');
			//$this->load->view('common/index');
			$this->load->view('sadministrator/'.$page, $data);
			//$this->load->view('common/footer');
		}

		public function home($page = 'home'){
			if (!file_exists(APPPATH.'views/sadministrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('sadministrator/header-script');
			$this->load->view('sadministrator/header');
			$this->load->view('sadministrator/header-bottommain');
			$this->load->view('sadministrator/'.$page, $data);
			$this->load->view('sadministrator/footer');
			
		}

		public function dashboard($page = 'dashboard'){
		   if (!file_exists(APPPATH.'views/sadministrator/'.$page.'.php')) {
		    	show_404();
		   }
		   $data['title'] = ucfirst($page);
		   $this->load->view('sadministrator/header-script');
		   $this->load->view('sadministrator/header');
		   $this->load->view('sadministrator/header-bottommain');
		   $this->load->view('sadministrator/'.$page, $data);
		   $this->load->view('sadministrator/footer');
			
		}
		
					
		// Log in Admin
		public function sadminlogin(){
			$data['title'] = 'Master Admin Login';
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				//$data['title'] = ucfirst($page);
				//$this->load->view('common/header-script');
				//$this->load->view('common/header');
				//$this->load->view('staff/header-bottom');
				$this->load->view('sadministrator/index');
				//$this->load->view('common/footer');
				//$this->load->view('common/index');
			}else{
				//var_dump("shaju");
				// get email and Encrypt Password
				$email = $this->input->post('email');
				//$encrypt_password = $this->input->post('password');
				//$encrypt_password = md5($this->input->post('password'));
				//$encrypt_password =hash('sha256', $this->input->post('password'));
				$encrypt_password =hash('sha256', $this->input->post('password'));
				//var_dump($email);
				//var_dump($encrypt_password);

				
				$usersadmin_id = $this->Sadministrator_Model->sadminLogin($email, $encrypt_password);
				var_dump($usersadmin_id);
				//exit();

				
				$sitelogo = $this->Sadministrator_Model->update_siteconfiguration(1);
				if ($usersadmin_id) {
					//Create Session
					$usersadmin_data = array(
								'sadmin_id' => $usersadmin_id->user_id,
				 				'sadminname' => $usersadmin_id->name,
				 				'sadminusername' => $usersadmin_id->username,
				 				'sadminemail' => $usersadmin_id->email,
				 				'sadminlogin' => true,
				 				'sadminrole' => $usersadmin_id->role_id,
				 				//'image' => $userstaff_id->image,
				 				'sadminsite_logo' => $sitelogo['logo_img']
				 	);

				 	$this->session->set_userdata($usersadmin_data);
				 	

					//Set Message
					$this->session->set_flashdata('success', 'Welcome to Master Admin Dashboard.');
					redirect('sadministrator/dashboard');
				}else{
					$this->session->set_flashdata('danger', 'Login Credential in invalid!');
					redirect('sadministrator/index');
				}
				
			}
		}

		// log admin out
		public function logout(){
			// unset user data
			 //$this->session->unset_userdata('userstaff_data');
			
			 $this->session->unset_userdata('sadminuser_id');
			 $this->session->unset_userdata('sadminname');
			 $this->session->unset_userdata('sadminusername');
			 $this->session->unset_userdata('sadminemail');
			 $this->session->unset_userdata('sadminlogin');
			 $this->session->unset_userdata('sadminrole');
			 $this->session->unset_userdata('sadminsite_logo');

			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			redirect(base_url().'sadministrator/index');
		}

		public function forget_password($page = 'forget-password'){
			if (!file_exists(APPPATH.'views/sadministrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('sadministrator/header-script');
			//$this->load->view('staff/header');
			//$this->load->view('staff/header-bottom');
			$this->load->view('sadministrator/'.$page, $data);
			$this->load->view('sadministrator/footer');
		}

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}

		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}
		
		public function delete($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function enable($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Desabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desable($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//new code for leads status
		public function enableleads($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enableleads($id,$table);       
			$this->session->set_flashdata('success', 'Desabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desableleads($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desableleads($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function enableoth($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enableoth($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desableoth($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desableoth($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//for stock availability
		public function enablestock($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enablestock($id,$table);       
			$this->session->set_flashdata('success', 'Stock Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desablestock($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desablestock($id,$table);       
			$this->session->set_flashdata('success', 'Stock Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		
		//new code for hotels
		public function enableothote($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enableothote($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desableothote($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desableothote($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		
		//new code for subscri
		//new code for status
		public function enableothsubscri($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enableothsubscri($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desableothsubscri($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desableothsubscri($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//recommended status
		//new code for status
		public function enablerec($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enablerec($id,$table);       
			$this->session->set_flashdata('success', 'Desabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function desablerec($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desablerec($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//recommended status

		public function get_admin_data(){
			$data['changePassword'] = $this->Sadministrator_Model->get_admin_data();
			$data['title'] = 'Change Password';

			$this->load->view('staff/header-script');
	 	 	 $this->load->view('staff/header');
	  		 $this->load->view('staff/header-bottom');
	   		 $this->load->view('staff/change-password', $data);
	  		$this->load->view('staff/footer');
		}

		public function change_password($page = 'change-password'){
			if (!file_exists(APPPATH.'views/staff/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Change password';

			//$data['add-user'] = $this->Sadministrator_Model->get_categories();

			$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
			$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottom');
		   		 $this->load->view('staff/'.$page, $data);
		  		 $this->load->view('staff/footer');
			}else{


				$this->Sadministrator_Model->change_password($this->input->post('new_password'));

				//Set Message
				$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
				redirect('staff/change-password');
			}
			
		}
		// Check user name exists
		public function match_old_password($old_password){
			
			$this->form_validation->set_message('match_old_password', 'Current Password Does not matched, Please Try Again.');
			$password = md5($old_password);
			$que = $this->Sadministrator_Model->match_old_password($password);
			if ($que) {
				return true; 
			}else{
				return false;
			}
		}

		public function update_admin_profile(){
			$data['user'] = $this->Sadministrator_Model->get_admin_data();
			$data['title'] = 'Update Profile';

			$this->load->view('staff/header-script');
	 	 	 $this->load->view('staff/header');
	  		 $this->load->view('staff/header-bottom');
	   		 $this->load->view('staff/update-profile', $data);
	  		$this->load->view('staff/footer');
		}

		public function update_admin_profile_data($page = 'update-profile'){
			if (!file_exists(APPPATH.'views/staff/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Update Profile';

			//$data['add-user'] = $this->Sadministrator_Model->get_categories();

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottom');
		   		 $this->load->view('staff/'.$page, $data);
		  		 $this->load->view('staff/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$id = $this->input->post('id');
					$data['img'] = $this->Sadministrator_Model->get_user($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Sadministrator_Model->update_user_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('staff/update-profile');
			}
			
		}
		//forget password functions start
		public function forget_password_mail(){
    		$this->load->library('form_validation');
    		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

            //check if email is in the database
        	$this->load->model('Sadministrator_Model');
        	if($this->Sadministrator_Model->email_exists()){
            	//$them_pass is the varible to be sent to the user's email
            	$temp_pass = md5(uniqid());
            	//send email with #temp_pass as a link
            	$this->load->library('email', array('mailtype'=>'html'));
            	$this->email->from('admin1234567@gmail.com', "Site");
            	$this->email->to($this->input->post('email'));
            	$this->email->subject("Reset your Password");

            	$message = "<p>This email has been sent as a request to reset our password</p>";
            	$message .= "<p><a href='".base_url()."staff/reset-password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
            	$this->email->message($message);

            	if($this->email->send()){
                	$this->load->model('Sadministrator_Model');
                	if($this->Sadministrator_Model->temp_reset_password($temp_pass)){
                    echo "check your email for instructions, thank you";
                	}
                }
            	else{
                echo "email was not sent, please contact your staff";
            	}

        	}else{
            echo "your email is not in our database";
        	}
		}

		public function reset_password($temp_pass){
    		$this->load->model('Sadministrator_Model');
    		if($this->Sadministrator_Model->is_temp_pass_valid($temp_pass)){

        		$this->load->view('reset-password');
       			//once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...

    		}else{
        		echo "the key is not valid";    
    		}

		}
		public function update_password(){
			$this->load->library('form_validation');
        	$this->form_validation->set_rules('password', 'Password', 'required|trim');
        	$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
            if($this->form_validation->run()){
            	echo "passwords match";
            }else{
            	echo "passwords do not match";  
            }
		}

		//Log login,dashbard,enable,delete,check

		//transactions
		public function transactions(){
		   
   			if(!$this->session->userdata('sadminlogin')) {
				redirect('sadministrator/index');
			}
		   $data['title'] = ucfirst("Hi Zaffran");
		   $this->load->view('sadministrator/header-script');
		   $this->load->view('sadministrator/header');
		   $this->load->view('sadministrator/header-bottommain');
		   $this->load->view('sadministrator/crm/transactions', $data);
		   $this->load->view('sadministrator/footer');
			
		}
		public function pendingtrans(){

		if(!$this->session->userdata('sadminlogin')) {
		redirect('sadministrator/index');
	}
$data['title'] = ucfirst("");
$this->load->view('sadministrator/header-script');
$this->load->view('sadministrator/header');
$this->load->view('sadministrator/header-bottommain');
$this->load->view('sadministrator/crm/pendingtrans', $data);
$this->load->view('sadministrator/footer');

}
public function settlements(){

if(!$this->session->userdata('sadminlogin')) {
redirect('sadministrator/index');
}
$data['title'] = ucfirst("");
$this->load->view('sadministrator/header-script');
$this->load->view('sadministrator/header');
$this->load->view('sadministrator/header-bottommain');
$this->load->view('sadministrator/crm/settlements', $data);
$this->load->view('sadministrator/footer');

}
public function statements(){

if(!$this->session->userdata('sadminlogin')) {
redirect('sadministrator/index');
}
$data['title'] = ucfirst("");
$this->load->view('sadministrator/header-script');
$this->load->view('sadministrator/header');
$this->load->view('sadministrator/header-bottommain');
$this->load->view('sadministrator/crm/statements', $data);
$this->load->view('sadministrator/footer');
}
		//transactions



		//code for menu starts here

		//MARKETING START

		//LEADS PROCESSING
		public function leads($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/leads/';
			$config['total_rows'] = $this->db->count_all('leads');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List Leads';
			$data['titlez'] = 'Manage Leads';
			
			$data['posts'] = $this->Sadministrator_Model->get_leads(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/leads', $data);
		  	$this->load->view('staff/footertable');
		}

		public function create_leads(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add Leads';
				//$id=24;	
			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);

			$this->form_validation->set_rules('name', 'Customer Name', 'required|xss_clean');
      		//$this->form_validation->set_rules('email', 'Customer Email', 'trim|required|valid_emails|is_unique[users.email]');

      		$this->form_validation->set_rules('email', 'Customer Email', 'trim|required|valid_emails');

      		$this->form_validation->set_rules('username', 'Customer Mobile Number', 'numeric|required|min_length[10]|max_length[10]');

      		$this->form_validation->set_rules('contact', 'Alternate Contact', 'numeric|required|min_length[10]|max_length[10]');
      		$this->form_validation->set_rules('address', 'Address', 'required');
      		$this->form_validation->set_rules('state', 'State', 'required');
      		$this->form_validation->set_rules('district', 'District', 'required');
      		$this->form_validation->set_rules('location', 'Location / Area', 'required');
      		$this->form_validation->set_rules('landmark', 'Landmark', 'required');
      		$this->form_validation->set_rules('zipcode','lang:zipcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
      		$this->form_validation->set_rules('referal', 'Customer Referred From', 'required');	
      		$this->form_validation->set_rules('handledby', 'Customer Handled By', 'required');	
      		$this->form_validation->set_rules('requiredfor', 'Required For', 'required');	
      		$this->form_validation->set_rules('totarea', 'Total Area Approximate','numeric|required|min_length[3]|max_length[6]');	
      		$this->form_validation->set_rules('csuggesttime', 'Customer Suggested Time', 'required');
      		$this->form_validation->set_rules('leadstatus', 'Leads Status', 'required');

      		$this->form_validation->set_rules('approachstatus', 'Approach Status', 'required');	
      		$this->form_validation->set_rules('pdate', 'Scheduled Date', 'required');	
      		$this->form_validation->set_rules('meetorganized', 'Meeting Organized', 'required');	
      		$this->form_validation->set_rules('custremarks', 'Customer Remarks', 'required');	
      		$this->form_validation->set_rules('leadcordremarks', 'Lead Coordinator Remarks', 'required');	
      		$this->form_validation->set_rules('inquiredfor', 'Inquired For', 'required');

			$this->form_validation->set_rules('category', 'Category', 'required');	
			$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
			$this->form_validation->set_rules('productid', 'Product_Id', 'required');
			$this->form_validation->set_rules('productname', 'Product Name', 'required');
			$this->form_validation->set_rules('inquiryassigned', 'Inquiry Assigned Level', 'required');
			$this->form_validation->set_rules('inquryassigneduser', 'Inquiry Assigned User', 'required');
			$this->form_validation->set_rules('executivename', 'Executive Name', 'required');
			$this->form_validation->set_rules('franchiseeremarks', 'Franchisee Remarks', 'required');
			$this->form_validation->set_rules('executivecontact', 'Executive Contact', 'required');

			//$this->form_validation->set_rules('totalarea','lang:totalarea','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			//$this->form_validation->set_rules('totalorg','lang:Amount','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			
			

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_leads', $data);
		  		 $this->load->view('staff/footeredit');
			} else {

			
			$this->Sadministrator_Model->create_leads();
			$this->session->set_flashdata('success', 'Leads Info has been Added Successfull.');
			redirect('staff/leads');
			}
			
		}

		public function process_leads($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			
			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$data['post'] = $this->Sadministrator_Model->get_leads($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Leads Information: Lead_ID - '.  $slug;
			$data['titlez'] = 'Leads Processing';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/process-leads', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function edit_leads($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			//$data['categories'] = $this->Sadministrator_Model->get_customers(FALSE);	
			//$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);


			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$data['post'] = $this->Sadministrator_Model->get_leads($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Leads Information: Lead_ID - '.  $slug;
			$data['titlez'] = 'Leads Processing';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_leads', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function update_leadsc(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			//update customer info in leads
			//update, insert cleadsuserassigned
			$this->form_validation->set_rules('name', 'Customer Name', 'required|xss_clean');
      		//$this->form_validation->set_rules('email', 'Customer Email', 'trim|required|valid_emails|is_unique[users.email]');

      		$this->form_validation->set_rules('email', 'Customer Email', 'trim|required|valid_emails');

      		$this->form_validation->set_rules('username', 'Customer Mobile Number', 'numeric|required|min_length[10]|max_length[10]');

      		$this->form_validation->set_rules('contact', 'Alternate Contact', 'numeric|required|min_length[10]|max_length[10]');
      		$this->form_validation->set_rules('address', 'Address', 'required');
      		$this->form_validation->set_rules('state', 'State', 'required');
      		$this->form_validation->set_rules('district', 'District', 'required');
      		$this->form_validation->set_rules('location', 'Location / Area', 'required');
      		$this->form_validation->set_rules('landmark', 'Landmark', 'required');
      		$this->form_validation->set_rules('zipcode','lang:zipcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
      		$this->form_validation->set_rules('referal', 'Customer Referred From', 'required');	
      		$this->form_validation->set_rules('handledby', 'Customer Handled By', 'required');	
      		$this->form_validation->set_rules('requiredfor', 'Required For', 'required');	
      		$this->form_validation->set_rules('totarea', 'Total Area Approximate','numeric|required|min_length[3]|max_length[6]');	
      		$this->form_validation->set_rules('csuggesttime', 'Customer Suggested Time', 'required');
      		$this->form_validation->set_rules('leadstatus', 'Leads Status', 'required');


      		$this->form_validation->set_rules('custremarks', 'Customer Remarks', 'required');
      		$this->form_validation->set_rules('category', 'Category', 'required');	
			$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
			$this->form_validation->set_rules('productid', 'Product_Id', 'required');
			$this->form_validation->set_rules('productname', 'Product Name', 'required');
			$this->form_validation->set_rules('inquryassigneduser', 'Inquiry Assigned User', 'required');
			$this->form_validation->set_rules('franchiseeremarks', 'Franchisee Remarks', 'required');
			if($this->form_validation->run() === FALSE){
				$this->edit_leads($this->input->post('id'));

			} 

			else {
				$this->Sadministrator_Model->update_leadsc();
				$this->session->set_flashdata('success', 'Leads Info has been updated.');
				//redirect('staff/leads');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
				
		}

		public function update_leadsp(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}


			$this->form_validation->set_rules('leadstatus', 'Leads Status', 'required');
      		$this->form_validation->set_rules('approachstatus', 'Approach Status', 'required');	
      		$this->form_validation->set_rules('pdate', 'Scheduled Date', 'required');				
			$this->form_validation->set_rules('executivename', 'Executive Name', 'required');
			$this->form_validation->set_rules('franchiseeremarks', 'Franchisee Remarks', 'required');
			$this->form_validation->set_rules('executivecontact', 'Executive Contact', 'required');

			if($this->form_validation->run() === FALSE){
				$this->process_leads($this->input->post('id'));

			} 

			else {
				$this->Sadministrator_Model->update_leadsp();
				$this->session->set_flashdata('success', 'Leads Info has been updated.');
				//redirect('staff/leads');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
				
		}

		public function meeting_tracker_add($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$data['post'] = $this->Sadministrator_Model->get_leads_meetingadd($slug);
			//$data['postm'] = $this->Sadministrator_Model->get_leads_meetingview($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Leads Information: Lead_ID - '.  $slug;
			$data['titlez'] = 'Leads Processing / Meeting';

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/meeting-tracker-add', $data);
		  	$this->load->view('staff/footeredit');

		}

		public function meeting_tracker_update(){

			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			//var_dump($this->input->post('executivenameid'));
			$this->form_validation->set_rules('mmeetingresult', 'Meeting Result', 'required');
      		$this->form_validation->set_rules('mprestatus', 'Presentation Status', 'required');	
      		$this->form_validation->set_rules('mccustremarks', 'CustomerCare Remarks', 'required');				
			$this->form_validation->set_rules('mcustremarks', 'Customer Remarks', 'required');
			$this->form_validation->set_rules('mcomments', 'Comments', 'required');
			$this->form_validation->set_rules('executivenamez', 'Executive Name', 'required');
			$this->form_validation->set_rules('executivenameid', 'Executive Namez', 'required');

			if($this->form_validation->run() === FALSE){
				$this->meeting_tracker_add($this->input->post('orderid'));

			} 

			else {
				$this->Sadministrator_Model->update_meeting_tracker();
				$this->session->set_flashdata('success', 'Meeting Info has been updated.');
				//redirect('staff/leads');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

		}

		public function get_meeting_tracker_single($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			
			//$data['post'] = $this->Sadministrator_Model->get_leads_meetingadd($slug);
			$data['posts'] = $this->Sadministrator_Model->get_leads_meetingview($slug);
			$data['postd'] = $slug;

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Meeting Track Information: Lead_ID - '.  $slug;
			$data['titlez'] = 'Leads Processing / Meeting';

			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/meetingstracker', $data);
		    $this->load->view('staff/footertable');
		}

		//meeting tracker

		//meeting view
		//meeting view

		//meeting Add
		//meeting Add

		//meeting tracker

		public function view_leads($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['leadsfollowups'] = $this->Sadministrator_Model->get_leadsfollowup($slug);	
			$data['post'] = $this->Sadministrator_Model->get_leads($slug);
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Leads Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/view_leads', $data);
		  		$this->load->view('staff/footeredit');
		}
		

		public function edit_leadsold($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			//$data['categories'] = $this->Sadministrator_Model->get_customers(FALSE);	
			//$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);


			$data['categories'] = $this->Sadministrator_Model->get_customers(FALSE);			
			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);	
			$data['post'] = $this->Sadministrator_Model->get_leads($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Leads Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_leads', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function update_leads(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
	
			$this->form_validation->set_rules('user_id', 'Customer', 'required');	
			$this->form_validation->set_rules('category', 'Category', 'required');	
			$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
			$this->form_validation->set_rules('productid', 'Product_Id', 'required');
			$this->form_validation->set_rules('productname', 'Product Name', 'required');
			$this->form_validation->set_rules('totalarea','lang:totalarea','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('totalorg','lang:Amount','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
		

			if($this->input->post('totalarea')==0 || $this->input->post('totalorg')==0 )
			{
				$this->edit_leads($this->input->post('id'));
			}
			
			if($this->form_validation->run() === FALSE){
				$this->edit_leads($this->input->post('id'));

			} 

			else {
			$this->Sadministrator_Model->update_leads();
			$this->session->set_flashdata('success', 'Leads Info has been updated.');
			redirect('staff/leads');
			}	
		}



		//LEADS PROCESSING
		//SERVICES

		public function leads_services($offset = 0){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$data['posts'] = $this->Sadministrator_Model->get_leads_services(FALSE);
			//$data['postm'] = $this->Sadministrator_Model->get_leads_meetingview($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Service Requests';
			$data['titlez'] = 'View Service Requests Information';

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/leads-services', $data);
		  	$this->load->view('staff/footertable');

		}
		public function edit_services($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			

			$data['post'] = $this->Sadministrator_Model->get_leads_services($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Service Requests Information: Request_ID - '.  $slug;
			$data['titlez'] = 'Service Requests';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_services', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function update_services(){

			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			//var_dump($this->input->post('status'));
			
			$this->form_validation->set_rules('remarks', 'Remarks', 'required');
			$this->form_validation->set_rules('servicecharge', 'Service Charge', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if($this->form_validation->run() === FALSE){
				$this->edit_services($this->input->post('id'));

			} 

			else {
				$this->Sadministrator_Model->update_services();
				$this->session->set_flashdata('success', ' Service Request has been updated.');
				//redirect('staff/leads');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

		}

		public function create_services(){

			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			$data['sales'] = $this->Sadministrator_Model->get_cleadssalesname(FALSE);

			$data['title'] = 'Create Service Requests';
			$data['titlez'] = 'Service Requests';


			$this->form_validation->set_rules('bill_no', 'Order ID/Bill No', 'required');
			$this->form_validation->set_rules('name', 'Customer Name', 'required');
			$this->form_validation->set_rules('service', 'Service Request', 'required');
			$this->form_validation->set_rules('servicemode', 'Service Mode', 'required');
			$this->form_validation->set_rules('servicecharge', 'Service Charge', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create-services', $data);
		  		 $this->load->view('staff/footeredit');
			} else {

			$this->Sadministrator_Model->create_services();
			$this->session->set_flashdata('success', 'Services Request has been Added Successfull.');
			redirect('staff/leads-services');
			}

			
		}

		public function get_cleadssalesna(){
        	$category_id = $this->input->post('id',TRUE);
        	
        	$data = $this->Sadministrator_Model->get_cleadssalesnamesin($category_id)->result();
        	
        	//echo json_encode($data['name']);
        	echo json_encode($data);
		}

		public function get_cleadssalesnamesingle(){
        	$category_id = $this->input->post('id',TRUE);
        	$data = $this->Sadministrator_Model->get_cleadssalesnamesingle($category_id);
        	echo json_encode($data);
		}

		//SERVICES
		//COMPLAINTS
		public function leads_complaints($offset = 0){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}


			$data['posts'] = $this->Sadministrator_Model->get_leads_complaints(FALSE);
			//$data['postm'] = $this->Sadministrator_Model->get_leads_meetingview($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Complaints Requests';
			$data['titlez'] = 'View Complaints Requests Information';

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/leads-complaints', $data);
		  	$this->load->view('staff/footertable');

		}

		public function edit_complaints($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			$data['post'] = $this->Sadministrator_Model->get_leads_complaints($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Complaint Requests Information: Request_ID - '.  $slug;
			$data['titlez'] = 'Complaint Requests';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_complaints', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function update_complaints(){

			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			
			$this->form_validation->set_rules('remarks', 'Remarks', 'required');
			$this->form_validation->set_rules('servicecharge', 'Service Charge', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			if($this->form_validation->run() === FALSE){
				$this->edit_services($this->input->post('id'));

			} 

			else {
				$this->Sadministrator_Model->update_complaints();
				$this->session->set_flashdata('success', ' Complaint Request has been updated.');
				//redirect('staff/leads');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

		}
		
		public function create_complaints(){

			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			$data['sales'] = $this->Sadministrator_Model->get_cleadssalesname(FALSE);

			$data['title'] = 'Create Complaint Requests';
			$data['titlez'] = 'Complaint Requests';


			$this->form_validation->set_rules('bill_no', 'Order ID/Bill No', 'required');
			$this->form_validation->set_rules('name', 'Customer Name', 'required');
			$this->form_validation->set_rules('service', 'Service Request', 'required');
			$this->form_validation->set_rules('servicemode', 'Service Mode', 'required');
			$this->form_validation->set_rules('servicecharge', 'Service Charge', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create-complaints', $data);
		  		 $this->load->view('staff/footeredit');
			} else {

			$this->Sadministrator_Model->create_complaints();
			$this->session->set_flashdata('success', 'Complaint Request has been Added Successfull.');
			redirect('staff/leads-complaints');
			}

			
		}

		

		//COMPLAINTS

		//MARKETING END

		
		//SALES STARTS
		
		public function leadquotes($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/leads-quotes/';
			$config['total_rows'] = $this->db->count_all('cleadssales');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List Customer Purchase Orders';
			$data['titlez'] = 'Manage Customer Purchase Orders';
			
			$data['posts'] = $this->Sadministrator_Model->leadquotes(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/leads-quotes', $data);
		  	$this->load->view('staff/footertable');
		}

		public function viewsales_quotespdf($slug){	
			// Pagination Config	
			//$config['base_url'] = base_url() . 'administrators/salesinvoice/';
		
			$data['user'] = $this->Sadministrator_Model->get_leads($slug);
			$data['posts'] = $this->Sadministrator_Model->cleadssalesdetails($slug);
			$data['postz'] = $this->Sadministrator_Model->leadquotesdeatilsprint($slug);
			//$this->load->view('staff/crm/viewsales-quotespdf', $data);
			$filenamez='Estimate'.$slug.'_'.date('d-m-Y_hi');

			$this->load->library('pdf');
         	$html = $this->load->view('staff/crm/viewsales-quotespdf', $data, true);
         	$this->pdf->createPDF($html, $filenamez, false);

		}

		public function editedquotes_process($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}


				$data['title'] = 'Customer Purchase Order- '.  $slug;
				$data['titlez'] = 'Customer Purchase Order - Edit';
				$data['postm'] = $this->Sadministrator_Model->leadquotesdeatils($slug);
				$data['post'] = $this->Sadministrator_Model->leadquotes($slug);
				$data['mainvendors'] = $this->Sadministrator_Model->get_vendors(FALSE);	
			
			

			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	//$this->load->view('staff/crm/democheck', $data);
		   	$this->load->view('staff/crm/editedquotes-process', $data);
		  	$this->load->view('staff/footeredit');

		}

		public function viewleadquotes_process($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

				$data['title'] = 'Customer Purchase Order- '.  $slug;
				$data['titlez'] = 'Customer Purchase Order - View';
				$data['postm'] = $this->Sadministrator_Model->leadquotesdeatilsprint($slug);
				$data['postd'] = $this->Sadministrator_Model->cleadssalesdetails($slug);
				$data['post'] = $this->Sadministrator_Model->leadquotes($slug);
				$data['mainvendors'] = $this->Sadministrator_Model->get_vendors(FALSE);	
			
			

			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	//$this->load->view('administrator/crm/democheck', $data);
		   	$this->load->view('staff/crm/viewleadquotes-process', $data);
		  	$this->load->view('staff/footeredit');

		}

		public function addquotes_process($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			//var_dump($slug);
			//var_dump($slug);

				$data['title'] = 'Customer Purchase Order- '.  $slug;
				$data['titlez'] = 'Customer Purchase Order - Add';
				$data['mainvendors'] = $this->Sadministrator_Model->get_vendors(FALSE);	
				$data['post'] = $this->Sadministrator_Model->get_leads($slug);
			

			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	//$this->load->view('staff/crm/democheck', $data);
		   	$this->load->view('staff/crm/addquotes_process', $data);
		  	$this->load->view('staff/footeredit');

		}

		public function viewleadquotes_processold($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$data['post'] = $this->Sadministrator_Model->get_leads_meetingadd($slug);
			//$data['postm'] = $this->Sadministrator_Model->get_leads_meetingview($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Leads Information: Lead_ID - '.  $slug;
			$data['titlez'] = 'Leads Processing / Meeting';

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/viewleadquotes-process', $data);
		  	$this->load->view('staff/footeredit');

		}

		public function update_leadquotes_process(){
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
		}

		//SALES ENDS
		//PURCHASE ORDER STARTS
		//PURCHASE FINISHED
		
		public function showroomrfp($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/leads/';
			$config['total_rows'] = $this->db->count_all('cleadssales');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Purchase Order -  Finished Goods';
			$data['titlez'] = 'Manage Purchase Orders -  Finished Goods';
			
			$data['posts'] = $this->Sadministrator_Model->showroomrfp(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/showroomrfp', $data);
		  	$this->load->view('staff/footertable');
		}
		public function showroomrfp_process($slug){
						// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['posts'] = $this->Sadministrator_Model->showroomrfp_process($slug);
			$data['postz'] = $this->Sadministrator_Model->showroomrfp_procesz(intval($slug));
			
			$data['title'] = 'Purchase Order Details -  Finished Goods';
			$data['titlez'] = 'For Customer Purchase Order ID - '.$slug;

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/showroomrfp-process', $data);
		  	$this->load->view('staff/footertable');
		}	
		//PURCHASE FINISHED
		//PURCHASE ROW
		
		public function showroomrfpw($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/showroomrfp/';
			$config['total_rows'] = $this->db->count_all('cleadssales');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Purchase Order - Raw Materials';
			$data['titlez'] = 'Manage Purchase Orders - Raw Materials';
			
			$data['posts'] = $this->Sadministrator_Model->showroomrfpw(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/showroomrfpw', $data);
		  	$this->load->view('staff/footertable');
		}
		//PURCHASE ROW
		//PURCHASE ORDER ENDS
		//ACCOUNTING STARTS
		//PURCHASE
		public function showpurchase($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/purchase/';
			$config['total_rows'] = $this->db->count_all('cleadssales');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Purchase';
			$data['titlez'] = 'Show Purchase Information';
			
			$data['posts'] = $this->Sadministrator_Model->showpurchase(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/purchase', $data);
		  	$this->load->view('staff/footertable');
		}
		
		public function viewpurchase_payments($slug1,$slug2){
						// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['postz']=$slug2;
			$data['posts'] = $this->Sadministrator_Model->viewpurchase_payments($slug1);
			
			$data['title'] = 'Payments For Purchase';
			$data['titlez'] = 'For Customer Purchase Bill ID - '.$slug1;

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/viewpurchase-payments', $data);
		  	$this->load->view('staff/footeredit');
		}
		public function update_purchasepayment(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}


				$new_image = time()."bill.".pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/purchaseg';
				$config['allowed_types'] = 'pdf|PDF';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['userfile']['tmp_name'];
        			$filepath ="./assets/images/purchaseg/";
					
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

			$upd=$this->Sadministrator_Model->update_purchasepayment($post_image);
			if($upd){
			$this->session->set_flashdata('success', 'Payment Info has been Added Successfull.');
        	$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        	}
			else
			{
			
				$this->session->set_flashdata('warning', 'Payment Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Form has been not submitted');
			}
 
        	echo json_encode($data);

			 //Set message
			//$this->session->set_flashdata('success', 'Payment info has been updated');

			//redirect('staff/products/categories');
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		
		public function create_purchasepayment(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			//var_dump($this->input->post('crbill_no'));

			$new_image = time()."bill.".pathinfo($_FILES['cruserfile']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/purchaseg';
				$config['allowed_types'] = 'pdf|PDF';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('cruserfile')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['cruserfile']['tmp_name'];
        			$filepath ="./assets/images/purchaseg/";
					
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

			$inser=$this->Sadministrator_Model->create_purchasepayment($post_image);
			if($inser){
			$this->session->set_flashdata('success', 'Payment Info has been Added Successfull.');
        	$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        	}
			else
			{
			
				$this->session->set_flashdata('warning', 'Payment Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Form has been not submitted');
			}
			//var_dump($data);
 
        	echo json_encode($data);

			 //Set message
			//$this->session->set_flashdata('success', 'Payment info has been updated');

			//redirect('staff/products/categories');
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//PURCHASE
		//PURCHASE INVOICE
		public function showpurchaseinvoice($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/purchaseinvoice/';
			$config['total_rows'] = $this->db->count_all('cleadssales');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Purchase Invoice';
			$data['titlez'] = 'Manage Purchase Invoice';
			
			$data['posts'] = $this->Sadministrator_Model->showpurchaseinvoice(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/purchaseinvoice', $data);
		  	$this->load->view('staff/footertable');
		}
		public function update_purcbill(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

				$new_image = time()."bill.".pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/purchase';
				$config['allowed_types'] = 'pdf|PDF';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['userfile']['tmp_name'];
        			$filepath ="./assets/images/purchase/";
					
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
				//$this->Sadministrator_Model->create_product($post_image);

			$upd=$this->Sadministrator_Model->update_purcbill($post_image);

			if($upd){
			$this->session->set_flashdata('success', 'Payment Info has been Added Successfull.');
        	$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        	}
			else
			{
			
				$this->session->set_flashdata('warning', 'Payment Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Form has been not submitted');
			}
 
        	echo json_encode($data);

			 //Set message
			//$this->session->set_flashdata('success', 'Payment info has been updated');

			//redirect('staff/products/categories');
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		//upload og bill
		//Download og bill
		//view generated purc invoice
		//Download generated purc invoice
		//PURCHASE INVOICE
		//SALES INVOICE
		public function showsalesinvoice($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/salesinvoice/';
			$config['total_rows'] = $this->db->count_all('cleadssales');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Sales Invoice';
			$data['titlez'] = 'Manage Sales Invoice';
			
			$data['posts'] = $this->Sadministrator_Model->showsalesinvoice(FALSE);
			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/salesinvoice', $data);
		  	$this->load->view('staff/footertable');
		}

		public function viewsales_invoice($slug){	
			
			$data['user'] = $this->Sadministrator_Model->get_leads($slug);
			$data['posts'] = $this->Sadministrator_Model->cleadssalesdetails($slug);
			$data['postz'] = $this->Sadministrator_Model->leadquotesdeatilsprint($slug);
			//$this->load->view('staff/crm/viewsales-invoice', $data);
			$filenamez='Invoice_'.$slug.'_'.date('d-m-Y_hi');

			$this->load->library('pdf');
        	$html = $this->load->view('staff/crm/viewsales-invoice', $data, true);
        	$this->pdf->createPDF($html, $filenamez, false);


		}


		public function viewsales_payments($slug1,$slug2){
						// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['postz']=$slug2;
			$data['posts'] = $this->Sadministrator_Model->viewsales_payments($slug1);
			
			$data['title'] = 'Payments From Customer';
			$data['titlez'] = 'For Customer Purchase Bill ID - '.$slug1;

			
			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/viewsales-payments', $data);
		  	$this->load->view('staff/footeredit');
		}

		public function update_salespayment(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$upd=$this->Sadministrator_Model->update_salespayment();
			if($upd){
			$this->session->set_flashdata('success', 'Payment Info has been Added Successfull.');
        	$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        	}
			else
			{
			
				$this->session->set_flashdata('warning', 'Payment Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Form has been not submitted');
			}
 
        	echo json_encode($data);

			 //Set message
			//$this->session->set_flashdata('success', 'Payment info has been updated');

			//redirect('staff/products/categories');
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function create_salespayment(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			//var_dump($this->input->post('crbill_no'));

			$inser=$this->Sadministrator_Model->create_salespayment();
			if($inser){
			$this->session->set_flashdata('success', 'Payment Info has been Added Successfull.');
        	$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        	}
			else
			{
			
				$this->session->set_flashdata('warning', 'Payment Info Not Added.');
				$data = array('success' => false, 'msg'=> 'Form has been not submitted');
			}
			//var_dump($data);
 
        	echo json_encode($data);

			 //Set message
			//$this->session->set_flashdata('success', 'Payment info has been updated');

			//redirect('staff/products/categories');
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function viewsales_paymentspdf($slug1,$slug2){	
			
			$data['user'] = $this->Sadministrator_Model->get_leadsfpayments($slug1);
			$data['posts'] = $this->Sadministrator_Model->viewsales_payments($slug1);
			$data['slugz'] = $slug1;
			//$this->load->view('staff/crm/viewsales-paymentspdf', $data);
			$filenamez='OrderPayment'.$slug1.'_'.date('d-m-Y_hi');

			$this->load->library('pdf');
        	$html = $this->load->view('staff/crm/viewsales-paymentspdf', $data, true);
        	$this->pdf->createPDF($html, $filenamez, false);

		}
			
		//SALES INVOICE
		//ACCOUNTING ENDS



		//INVENTORY STARTS
		//CUSTOMERS
		public function customers() {

			$data['posts'] = $this->Sadministrator_Model->get_leads(FALSE);
			$data['title'] = 'List Customers';
			$data['titlez'] = 'Manage Customers';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/customers', $data);
	  		$this->load->view('staff/footertable');
		}
		//CUSTOMERS
		//ADDRESS
		public function get_address(){
			$data['listBlogComments'] = $this->Sadministrator_Model->get_leads();
			$data['title'] = 'Customer Address';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		//$this->load->view('staff/header-bottom');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/address', $data);
	  		$this->load->view('staff/footertable');
		}
	   
		//ADDRESS
		//STAFFS
		public function staffs($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/staffs/';
			$config['total_rows'] = $this->db->count_all('staffs');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List Staffs';
			$data['titlez'] = 'Manage Staffs';
			
			$data['posts'] = $this->Sadministrator_Model->get_staffs(FALSE);
			
				$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/staffs', $data);
		  		$this->load->view('staff/footertable');
		}

		public function deletestaffs($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_staffs($id);

			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function edit_staffs($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['post'] = $this->Sadministrator_Model->get_staffs($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Staff Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_staffs', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function update_staffs(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->form_validation->set_rules('name', 'Name', 'required');
			//$id = $this->uri->segment(4);
			$id =$this->input->post('id');
		
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email','Email','required|valid_email|edit_unique[staffs.email.user_id.'.$id.']');
			$this->form_validation->set_rules('username', 'Mobile Number', 'required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[10]|edit_unique[staffs.username.user_id.'.$id.']');
			
			$this->form_validation->set_rules('dob', 'Joined Date to Your Firm (Approximate)', 'required');
			$this->form_validation->set_rules('zipcode','lang:zipcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('location', 'District', 'required');
			$this->form_validation->set_rules('taluk', 'Area', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('profession', 'Employee Type', 'required');
			/*$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');*/
					

			if($this->form_validation->run() === FALSE){
				$this->edit_staffs($this->input->post('id'));
			} else {
				
			$this->Sadministrator_Model->update_staffs();

			// Set message
			$this->session->set_flashdata('success', 'Staffs info has been updated');

			redirect('staff/staffs');
			}
	  	}

		public function create_staffs(){

			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add Staffs';

			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_emails|is_unique[staffs.email]');
			//$this->form_validation->set_rules('username', 'Mobile Number', 'numeric|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('username','Mobile Number','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[10]|is_unique[staffs.username]');	
			$this->form_validation->set_rules('dob', 'Started Date of Your Firm (Approximate)', 'required');
			//$this->form_validation->set_rules('zipcode', 'Zipcode/Pincode', 'numeric|required|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('zipcode','lang:zipcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('location', 'District', 'required');
			$this->form_validation->set_rules('taluk', 'Area', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('profession', 'Employee Type', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
				
				
				
				
			//$this->form_validation->set_rules('type', 'API/Id', 'required');
			//$this->form_validation->set_rules('address', 'Address', 'required');
				/*
			$this->form_validation->set_rules('status', 'Status', 'required');
			if (empty($_FILES['userfile']['name']))
					{
    		$this->form_validation->set_rules('userfile', 'Document', 'required');
						}
			    */
			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_staffs', $data);
		  		 $this->load->view('staff/footeredit');
			} else {
				
				
				$this->Sadministrator_Model->create_staffs();

				// Set message
			
				$this->session->set_flashdata('success', 'Staffs Account has been Added Successfull. Password will be encrypted one.');
				redirect('staff/staffs');
			}
		}
		//STAFFS

		//PRODUCTS		
		public function products($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/products/';
			$config['total_rows'] = $this->db->count_all('products');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List Products';
			$data['titlez'] = 'Manage Products';
			
			$data['posts'] = $this->Sadministrator_Model->get_products(FALSE);
			
				$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/products', $data);
		   		 //$this->load->view('staff/crm/products', $data);
		  		$this->load->view('staff/footertable');
		}

		public function deleteproducts($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_product($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function get_sub_categories(){
        	$category_id = $this->input->post('id',TRUE);
			//log_message('debug', 'Value of id is '+$this->input->post('id'));
        	//$data = $this->products_model->get_sellers($category_id)->result();
        	$data = $this->Sadministrator_Model->get_sub_category($category_id)->result();
        	//echo json_encode($data['subname']);
        	echo json_encode($data);
			}

		public function edit_products($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			
			$data['post'] = $this->Sadministrator_Model->get_products($slug);
			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);	
			$data['mainvendors'] = $this->Sadministrator_Model->get_vendors(FALSE);	
			

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Product Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 //$this->load->view('staff/crm/edit_products', $data);
		   		 $this->load->view('staff/crm/democheck', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function update_products(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			

			$this->form_validation->set_rules('name', 'Name', 'required');	
			$this->form_validation->set_rules('category', 'Category', 'required');	
			$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
			$this->form_validation->set_rules('prodtype', 'Product Type', 'required');
			$this->form_validation->set_rules('shownweb', 'Show In Website', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('unittype', 'Unit Type', 'required');	
			$this->form_validation->set_rules('unit', 'Units', 'required');	
			$this->form_validation->set_rules('seller_id', 'Vendor/Supplier', 'required');

			$this->form_validation->set_rules('ops','Stock Quantity',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('prate', 'Purchase Rate', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('cost', 'Cost', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('tax','Tax Rate','required');
			$this->form_validation->set_rules('mrp','MRP Rate',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('sellerper','Franchise Margin',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));

			$this->form_validation->set_rules('srate','Sales Rate',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));

			$this->form_validation->set_rules('description', 'Description', 'required');



			if($this->form_validation->run() === FALSE){
				$this->edit_products($this->input->post('id'));
			} else {
			// Upload Image
			
				$new_image = time()."img.".pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/products';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);
				
				
				if($_FILES['userfile']['error']==0) {
				
				//print("yes");

				$this->upload->initialize($config);
				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					//$originalImgName= uniqid().$_FILES['userfile']['name'];
        			$tempName= $_FILES['userfile']['tmp_name'];
        			$filepath ="./assets/images/products/";
					//$extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	    			//$originalImgName= $new_image;
        			//$url = "http://192.168.15.184/farmit/assets/images/posts/".$originalImgName; //update path as per your directory structure 
					//$image=$url;
        
        			if(move_uploaded_file($tempName,$filepath.$new_image)){
					$post_image =$new_image;
					}
					else{$post_image = $this->input->post('fu');}
						
				}
					
				else{
					
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $new_image;
							
					}
			
				}
				else
				{
					$post_image = $this->input->post('fu');
				}
				
			$this->Sadministrator_Model->update_products($post_image);
				
			
			$this->session->set_flashdata('success', 'Your Product has been updated.');
			redirect('staff/products');
			}
	  	}

	  	public function create_products(){
			// Check login
			//SELECT id, product_id, cat_id, subcat_id, name, image, description, datetime, status, stockstatus, shownweb, prodtype, vendor_id, vendorname, unittype, unit, purc, tax, cost, mrp, salesper, srater, modified_date FROM products
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add New Product';
				//$id=24;
			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);	
			$data['mainvendors'] = $this->Sadministrator_Model->get_vendors(FALSE);	
			

			$this->form_validation->set_rules('name', 'Name', 'required');	
			$this->form_validation->set_rules('category', 'Category', 'required');	
			$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
			$this->form_validation->set_rules('prodtype', 'Product Type', 'required');
			$this->form_validation->set_rules('shownweb', 'Show In Website', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('unittype', 'Unit Type', 'required');	
			$this->form_validation->set_rules('unit', 'Units', 'required');	
			$this->form_validation->set_rules('seller_id', 'Vendor/Supplier', 'required');

			$this->form_validation->set_rules('ops','Stock Quantity',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('prate', 'Purchase Rate', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('cost', 'Cost', array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('tax','Tax Rate','required');
			$this->form_validation->set_rules('mrp','MRP Rate',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));
			$this->form_validation->set_rules('sellerper','Franchise Margin',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));

			$this->form_validation->set_rules('srate','Sales Rate',array('trim','required','min_length[1]','regex_match[/(^\d+|^\d+[.]\d+)+$/]'));

			$this->form_validation->set_rules('description', 'Description', 'required');

			if (empty($_FILES['userfile']['name'])){	
    		$this->form_validation->set_rules('userfile', 'Main Image', 'required');
			}

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_products', $data);
		  		 $this->load->view('staff/footeredit');
			} else {
			    
				$new_image = time()."img.".pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$config['upload_path'] = './assets/images/products';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				$config['max_size'] = '10000000';
				$config['file_name'] = $new_image;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
        			$tempName= $_FILES['userfile']['tmp_name'];
        			$filepath ="./assets/images/products/";
					//$extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	    			//$originalImgName= $new_image;
        			//$url = "http://192.168.15.184/farmit/assets/images/posts/".$originalImgName; //update path as per your directory structure 
					//$image=$url;
        
        			if(move_uploaded_file($tempName,$filepath.$new_image)){
					$post_image =$new_image;
					}
					else{$post_image = 'noimage.jpg';}
						
				}
					
				else{
					
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $new_image;
							
					}
				$this->Sadministrator_Model->create_product($post_image);
				$this->session->set_flashdata('success', 'Product Info has been Added Successfull.');
				redirect('staff/products');
			}
			
	 	}
		//PRODUCTS

		//CATEGORY
		public function categories() {

			$data['posts'] = $this->Sadministrator_Model->get_categories(FALSE);
			$data['title'] = 'List Categories';
			$data['titlez'] = 'Manage Categories';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/categories', $data);
	  		$this->load->view('staff/footertable');
		}
		//CATEGORY

		//SUB CATEGORY
		public function subcategories(){
			$data['posts'] = $this->Sadministrator_Model->get_subcategories(FALSE);
			$data['title'] = 'List Sub Categories';
			$data['titlez'] = 'Manage Sub Categories';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/subcategories', $data);
	  		$this->load->view('staff/footertable');
		}

		public function deletesubcategories($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_subcategories($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function edit_subcategories($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['post'] = $this->Sadministrator_Model->get_subcategories($slug);
			$data['categories'] = $this->Sadministrator_Model->get_categories(FALSE);
			$data['title'] = 'Edit Sub Category';
			$data['titlez'] = 'Manage Sub Category';
			if(empty($data['post'])){
				//show_404();
			}

			$this->load->view('staff/header-script');
		 	$this->load->view('staff/header');
		  	$this->load->view('staff/header-bottommain');
		   	$this->load->view('staff/crm/edit_subcategories', $data);
		  	$this->load->view('staff/footeredit');
		}

		public function update_subcategories(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$id =$this->input->post('id');
			
			$this->form_validation->set_rules('name', ' Category Name', 'required');
			$this->form_validation->set_rules('subname', 'Sub Category Name','required|xss_clean|edit_unique[subcategories.subname.id.'.$id.']');			
			$this->form_validation->set_rules('status', 'Status', 'required');

			if($this->form_validation->run() === FALSE){
				$this->edit_subcategories($this->input->post('id'));
			}else {
				
			
			$this->Sadministrator_Model->update_subcategories();
			 //Set message
			$this->session->set_flashdata('success', 'Sub Category info has been updated');

			redirect('staff/subcategories');
			}
	  	}

		public function create_subcategories(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			
			$data['title'] = 'Add Sub Category';
			$data['titlez'] = 'Manage Sub Category';
			$data['categories'] = $this->Sadministrator_Model->get_categories(FALSE);
			$this->form_validation->set_rules('name', ' Category Name', 'required');
			$this->form_validation->set_rules('subname', 'Sub Category Name', 'required|xss_clean|is_unique[subcategories.subname]');
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			if($this->form_validation->run() === FALSE){
				$this->load->view('staff/header-script');
		 	 	$this->load->view('staff/header');
		  		$this->load->view('staff/header-bottommain');
		   		$this->load->view('staff/crm/create_subcategories', $data);
		  		$this->load->view('staff/footeredit');
			} else {
				//redirect(current_url());
				$this->Sadministrator_Model->create_subcategories();

				// Set message
			
				$this->session->set_flashdata('success', 'Sub Category Info has been Added Successfull.');
				redirect('staff/subcategories');
			}
		}
		//SUB CATEGORY

		//VENDORS
		public function vendors($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staff/vendors/';
			$config['total_rows'] = $this->db->count_all('vendors');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List Vendors';
			$data['titlez'] = 'Manage Vendors';
			
			$data['posts'] = $this->Sadministrator_Model->get_vendors(FALSE);
			
				$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/vendors', $data);
		  		$this->load->view('staff/footertable');
		}
		
		public function deletevendors($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_vendors($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		
		public function edit_vendors($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['post'] = $this->Sadministrator_Model->get_vendors($slug);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'Edit Vendors Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_vendors', $data);
		  		$this->load->view('staff/footeredit');
		}
		public function update_vendors(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			//$id = $this->uri->segment(4);
			$id =$this->input->post('id');
		
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email','Email','required|valid_email|edit_unique[vendors.email.user_id.'.$id.']');
			$this->form_validation->set_rules('username', 'Mobile Number', 'required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[10]|edit_unique[vendors.username.user_id.'.$id.']');
			
			
			$this->form_validation->set_rules('status', 'Status', 'required');
				/*$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');*/
					

			if($this->form_validation->run() === FALSE){
				$this->edit_vendors($this->input->post('id'));
			} else {
		
			$this->Sadministrator_Model->update_vendors($post_image);

			// Set message
			$this->session->set_flashdata('success', 'Vendors info has been updated');

			redirect('staff/vendors');
			}
	  	}
		
		public function create_vendors(){
				//$this->load->database();
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add Vendors';

			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_emails|is_unique[vendors.email]');
			//$this->form_validation->set_rules('username', 'Mobile Number', 'numeric|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('username','Mobile Number','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[10]|is_unique[vendors.username]');	
			
			$this->form_validation->set_rules('status', 'Status', 'required');
			
			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_vendors', $data);
		  		 $this->load->view('staff/footeredit');
			} else {
				
				
				$this->Sadministrator_Model->create_vendors($post_image);

				// Set message
			
				$this->session->set_flashdata('success', 'Vendors Account has been Added Successfull.');
				redirect('staff/vendors');
			}
		}
		//VENDORS

		//INVENTORY ENDS

		//FEEDBACK START
		public function feedback() {

			$data['posts'] = $this->Sadministrator_Model->get_feedback(FALSE);
			$data['title'] = 'List Feedback';
			$data['titlez'] = 'Manage Feedback';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/feedback', $data);
	  		$this->load->view('staff/footertable');
		}
		//FEEDBACK END


		//MENU ENDS



		

		// customers starts here
		public function customersold() {

			$data['posts'] = $this->Sadministrator_Model->get_customersold(FALSE);
			$data['title'] = 'List Customers';
			$data['titlez'] = 'Manage Customers';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/customers', $data);
	  		$this->load->view('staff/footertable');
		}

		public function deletecustomers($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_customers($id);
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function edit_customers($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			if($slug!=1)
			{
				$data['post'] = $this->Sadministrator_Model->get_customers($slug);

			if(empty($data['post'])){
				//show_404();
			}


			$data['title'] = 'Edit User Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_customers', $data);
		  		$this->load->view('staff/footeredit');
			}
			else
			{
				$this->session->set_flashdata('Danger', 'You are not authorised to do it.');
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
			
		}


		public function update_customers(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->form_validation->set_rules('name', 'Name', 'required');
			//$id = $this->uri->segment(4);
			$id =$this->input->post('id');
		
			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email','Email','required|valid_email|edit_unique[users.email.user_id.'.$id.']');
			$this->form_validation->set_rules('username', 'Mobile Number', 'required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[10]|edit_unique[users.username.user_id.'.$id.']');
			
			//$this->form_validation->set_rules('dob', 'Started Date of Your Firm (Approximate)', 'required');
			$this->form_validation->set_rules('zipcode','lang:zipcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');

			/*$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');*/
					

			if($this->form_validation->run() === FALSE){
				$this->edit_customers($this->input->post('id'));
			} else {
		
			$this->Sadministrator_Model->update_customers();

			// Set message
			$this->session->set_flashdata('success', 'Customer info has been updated');

			redirect('staff/customers');
		 }
	  	}


	   	public function create_customers() {
				
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add Customer';

			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_emails|is_unique[users.email]');
			//$this->form_validation->set_rules('username', 'Mobile Number', 'numeric|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('username','Mobile Number','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[10]|max_length[10]|is_unique[users.username]');

			$this->form_validation->set_rules('contact', 'Alternate contact', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('taluk', 'Location', 'required');

			$this->form_validation->set_rules('zipcode','lang:zipcode','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

			//$this->form_validation->set_rules('status', 'Status', 'required');
			 
			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_customers', $data);
		  		 $this->load->view('staff/footeredit');
			} else {
				
				
				$this->Sadministrator_Model->create_customers();

				// Set message
			
				$this->session->set_flashdata('success', 'Customer Account has been Added Successfull. Password will be encrypted one.');
				redirect('staff/customers');
			}
		}

		//customers ends here	

		/*products*/

		/*products*/
		/*leads*/

		public function create_purchase(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add Purchase';
				//$id=24;
			$data['categories'] = $this->products_model->get_sellers(FALSE);
			$data['maincategories'] = $this->products_model->get_categories(FALSE);	
			$data['mainvendors'] = $this->products_model->get_vendors(FALSE);
			$data['mainwarehouses'] = $this->products_model->get_warehouses(FALSE);
			$data['mainproducts'] = $this->products_model->get_purproducts(FALSE);
		
			$this->form_validation->set_rules('bill_no', 'Bill No', 'required');
			/*$billnoz=count($_POST['product_name']);
			if ($billnoz<0)
				{
    		$this->form_validation->set_rules('bill_np', 'Products Table', 'required');
				}	*/
			if($this->form_validation->run() === FALSE){
				
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottomproducts');
		   		 $this->load->view('staff/products/create_purchase', $data);
		  		 $this->load->view('staff/footeredit');
				
			}else {
				// Upload Image
				$billnoz=count($_POST['product_name']);
				for($i=0; $i < count($_POST['product_name']); $i++) {
					$order_desc = $_POST['product_name'][$i];
					//print_r($order_desc);
					
				}
				
				$insert=$this->products_model->create_purchase();
				if($insert){
					$this->session->set_flashdata('success', 'Purchase Info has been Added Successfull.');
        			$data = array('success' => true, 'msg'=> 'Form has been submitted successfully');
        		}else{
			
					$this->session->set_flashdata('warning', 'Purchase Info Not Added.');
					$data = array('success' => false, 'msg'=> 'Form has been not submitted');
				}
 
        		echo json_encode($data);

				/* echo json_encode(array(
				"statusCode"=>200
				));
				*/
			 	//echo 'success';
				//$pmessage ="success";
				//print_r($pmessage);
				//$this->session->set_flashdata('success', 'Purchase Info has been Added Successfull.');
		
				//redirect('staff/products/purchase');
			}
		}	
		
		public function create_leadsold(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['title'] = 'Add Leads';
				//$id=24;
			$data['categories'] = $this->Sadministrator_Model->get_customers(FALSE);	
			$data['maincategories'] = $this->Sadministrator_Model->get_categories(FALSE);
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);	
				
			$this->form_validation->set_rules('user_id', 'Customer', 'required');	
			$this->form_validation->set_rules('category', 'Category', 'required');	
			$this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
			$this->form_validation->set_rules('productid', 'Product_Id', 'required');
			$this->form_validation->set_rules('productname', 'Product Name', 'required');
			$this->form_validation->set_rules('totalarea','lang:totalarea','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('totalorg','lang:Amount','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			
			

			if($this->form_validation->run() === FALSE){
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_leads', $data);
		  		 $this->load->view('staff/footeredit');
			} else {

			
			$this->Sadministrator_Model->create_leads();

			$this->session->set_flashdata('success', 'Leads Info has been Added Successfull.');
			redirect('staff/leads');
			//if()
			}
			
		}

		public function get_sub_customers(){
        	$category_id = $this->input->post('id',TRUE);
			//log_message('debug', 'Value of id is '+$this->input->post('id'));
        	//$data = $this->products_model->get_sellers($category_id)->result();
        	$data = $this->Sadministrator_Model->get_sub_customers($category_id);
        	//echo json_encode($data['addressz']);
        	
        	echo json_encode($data);
		}

		public function get_staff_contact(){
        	$category_id = $this->input->post('id',TRUE);
			//log_message('debug', 'Value of id is '+$this->input->post('id'));
        	//$data = $this->Sadministrator_Model->get_staff_contact($category_id)->result();
        	$data = $this->Sadministrator_Model->get_staff_contact($category_id);
        	//echo json_encode($data['username']);
        	
        	echo json_encode($data);
		}

		public function get_sub_products(){

        	$cat_id = $this->input->post('cid',TRUE);
        	$subcat_id = $this->input->post('id',TRUE);
			
			//log_message('debug', 'Value of id is '+$this->input->post('id'));
        	//$data = $this->products_model->get_sellers($category_id)->result();
        	$data = $this->Sadministrator_Model->get_sub_products($cat_id,$subcat_id)->result();
        	//echo json_encode($data['subname']);
        	echo json_encode($data);
		}
			

		public function addtoorder($id){
		
			$cid='order_id';
			$cvalue=$id;
			$ctable='orders';
			$table1='leads';
			$table2='orders';
			$orderke='order_id';
			$ab=$this->Sadministrator_Model->check_id_exists($cid,$ctable,$cvalue);
			if($ab==true){
					
					//echo "Not Exists";
					$table = base64_decode($this->input->get('table'));
					$this->Sadministrator_Model->addtoorder($id,$table);
					$this->Sadministrator_Model->DuplicateMySQLRecord($table1,$table2,$orderke,$id);
					$this->session->set_flashdata('success', 'Added to Order Successfully.');
					redirect('staff/view_leads/'.$id);
					//$this->session->set_flashdata('success', 'Added to Order Successfully.');
					//header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

			else{
				//echo "Exists";
				$this->session->set_flashdata('danger', 'Already Order Exists.');
				redirect('staff/view_leads/'.$id);
			}	
		}

		public function add_leadsfollowups(){
				
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$groups=$data['staffs'];

			$id = $this->input->post('mpurcorder_id');
			//var_dump($id);
			$this->form_validation->set_rules('mpurcorder_id', 'OrderId', 'required|xss_clean');
			//$this->form_validation->set_rules('staff_id', 'StaffId', 'required|xss_clean');
			$this->form_validation->set_rules('staffname', 'staffName', 'required|xss_clean');
			$this->form_validation->set_rules('meeting', 'Meeting/Discussion', 'required|xss_clean');
			$this->form_validation->set_rules('online', 'Online/OffLine', 'required|xss_clean');
			$this->form_validation->set_rules('shstatus', 'Status', 'required');
			$this->form_validation->set_rules('start_date', 'Date_Time', 'required');
			
			if($this->form_validation->run() === FALSE){

		
				redirect('staff/view_leads/'.$id);

			} else {
				
				//echo "no error";
				$groupid = $this->input->post('staffname');
				$groupname;
				foreach ($groups as $category)
				{
					if($category['user_id']== $groupid)
					{
						$groupname=$category['name'];
					}
						
				}
				$this->Sadministrator_Model->add_leadsfollowups($groupname);

				// Set message
			
				$this->session->set_flashdata('success', 'FollowUps/Discussions has been Added Successfull.');
				redirect('staff/view_leads/'.$id);
			}
		}

		public function deleteleadsfollowup($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_leadsfollowup($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		/*leadsmeasurements*/
		public function view_leadsmeasurements($id = NULL){	
			// Pagination Config	

			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			
			$data['title'] = 'List Leads-Measurements';
			$data['titlez'] = 'Manage Leads-Measurements';
			$data['idm'] = $id;
			$data['posts'] = $this->Sadministrator_Model->get_leadsmeasurements($id);
			
			
			 $this->load->view('staff/header-script');
	 	 	 $this->load->view('staff/header');
	  		 $this->load->view('staff/header-bottommain');
	   		 $this->load->view('staff/crm/view-leadsmeasurements', $data);
	  		 $this->load->view('staff/footertable');
		}


	  	public function create_leadsmeasurements($id = NULL){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['idm'] = $id;	
			$data['title'] = 'Add Leads-Measurement';
				//$id=24;
			$data['products'] = $this->Sadministrator_Model->get_sub_products(FALSE);
			$data['posts'] = $this->Sadministrator_Model->get_leads($id);	
				
			$this->form_validation->set_rules('name', 'Name', 'required');	
			$this->form_validation->set_rules('resitype', 'Residential/Commercial', 'required');
			$this->form_validation->set_rules('roomtype', 'RoomType', 'required');
			$this->form_validation->set_rules('materialtype', 'Material Type', 'required');
			$this->form_validation->set_rules('materialname', 'Material Name', 'required');
			$this->form_validation->set_rules('width','Width Value','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('height','Height Value','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('sqft','Sq.Ft Value','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			

			if($this->form_validation->run() === FALSE){
				if($id!="")
				{
				
				 $this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/create_leadsmeasurements', $data);
		   		 //$this->create_leadsmeasurements($this->input->post('id'));
		  		 $this->load->view('staff/footeredit');
					

				}
				else
				{
				 $this->create_leadsmeasurements($this->input->post('id'));
				}
				 
			} else {			
					
				$this->Sadministrator_Model->create_leadsmeasurements();
				$this->session->set_flashdata('success', 'Measurement Info has been Added Successfull.');
				if($id!="")
				{
				redirect('staff/view_leadsmeasurements/'.$id);
				}
				else
				{
					redirect('staff/view_leadsmeasurements/'.$this->input->post('id'));
				}
			}
			
	 	}


	 	public function edit_leadsmeasurements($id){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['idm'] = $id;	
			$data['products'] = $this->Sadministrator_Model->get_sub_products(FALSE);
			$data['posts'] = $this->Sadministrator_Model->get_leadsmeasurement($id);
			//var_dump($data['posts'] );
			$data['title'] = 'Edit Leads-Measurement';
			$data['titlez'] = 'Manage Leads-Measurement';
			if(empty($data['post'])){
				//show_404();
			}

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/edit_leadsmeasurements', $data);
		  		$this->load->view('staff/footeredit');
		}
		public function update_leadsmeasurements(){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
	
			$this->form_validation->set_rules('name', 'Name', 'required');	
			$this->form_validation->set_rules('resitype', 'Residential/Commercial', 'required');
			$this->form_validation->set_rules('roomtype', 'RoomType', 'required');
			$this->form_validation->set_rules('materialtype', 'Material Type', 'required');
			$this->form_validation->set_rules('materialname', 'Material Name', 'required');
			$this->form_validation->set_rules('width','Width Value','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('height','Height Value','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
			$this->form_validation->set_rules('sqft','Sq.Ft Value','required|numeric|greater_than[0]|regex_match[/^[0-9,]+$/]');
		
			
			if($this->form_validation->run() === FALSE){
				$this->edit_leadsmeasurements($this->input->post('id'));

			} 

			else {
			$this->Sadministrator_Model->update_leadsmeasurements();
			$this->session->set_flashdata('success', 'Leads Measurements Info has been updated.');
			redirect('staff/view_leadsmeasurements/'.$this->input->post('order_id'));
			}
			
		}

		public function deleteleadsmeasurements($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_leadsmeasurements($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}


		/*leadsmeasurements*/

		/*leads*/

		/*Orders*/
		public function orders($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'staffs/orders/';
			$config['total_rows'] = $this->db->count_all('orders');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List Orders';
			$data['titlez'] = 'Manage Orders';
			
			$data['posts'] = $this->Sadministrator_Model->get_orders(FALSE);
			
				$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/orders', $data);
		  		$this->load->view('staff/footertable');
		}

		public function view_orders($slug){
			// Check login
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}

			$data['ordersfollowups'] = $this->Sadministrator_Model->get_ordersfollowup($slug);	
			$data['post'] = $this->Sadministrator_Model->get_orders($slug);
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);

			if(empty($data['post'])){
				//show_404();
			}

			$data['title'] = 'View Orders Information';

			$this->load->view('staff/header-script');
		 	 	 $this->load->view('staff/header');
		  		 $this->load->view('staff/header-bottommain');
		   		 $this->load->view('staff/crm/view_orders', $data);
		  		$this->load->view('staff/footeredit');
		}

		public function deleteordersfollowup($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_ordersfollowup($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function add_ordersfollowups(){
				
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$data['staffs'] = $this->Sadministrator_Model->get_staffs(FALSE);
			$groups=$data['staffs'];

			$id = $this->input->post('mpurcorder_id');
			//var_dump($id);
			$this->form_validation->set_rules('mpurcorder_id', 'OrderId', 'required|xss_clean');
			//$this->form_validation->set_rules('staff_id', 'StaffId', 'required|xss_clean');
			$this->form_validation->set_rules('staffname', 'staffName', 'required|xss_clean');
			$this->form_validation->set_rules('meeting', 'Meeting/Discussion', 'required|xss_clean');
			$this->form_validation->set_rules('online', 'Online/OffLine', 'required|xss_clean');
			$this->form_validation->set_rules('shstatus', 'Status', 'required');
			$this->form_validation->set_rules('start_date', 'Date_Time', 'required');
			
			if($this->form_validation->run() === FALSE){

		
				redirect('staff/view_orders/'.$id);

			} else {
				
				//echo "no error";
				$groupid = $this->input->post('staffname');
				$groupname;
				foreach ($groups as $category)
				{
					if($category['user_id']== $groupid)
					{
						$groupname=$category['name'];
					}
						
				}
				$this->Sadministrator_Model->add_ordersfollowups($groupname);

				// Set message
			
				$this->session->set_flashdata('success', 'Track Order - Implementation Proces has been Added Successfull.');
				redirect('staff/view_orders/'.$id);
			}
		}
		/*ordersfollowup*/
		/*Orders*/
		/*address*/

		public function get_addressold(){
			$data['listBlogComments'] = $this->Sadministrator_Model->get_address();
			$data['title'] = 'Customer Address';
			$this->load->view('staff/header-script');
	 	 	$this->load->view('staff/header');
	  		//$this->load->view('staff/header-bottom');
	  		$this->load->view('staff/header-bottommain');
			
	   		$this->load->view('staff/crm/address', $data);
	  		$this->load->view('staff/footertable');
		}		
		public function view_address_single($id = NULL){

			
			$config['base_url'] = base_url() . 'staffs/crm/view_address_single/'.$id;
			//$config['total_rows'] = $this->db->count_all('customer_addresses');
			$config['total_rows'] = $this->db->where('user_id',$id)->from("customer_addresses")->count_all_results();
			//print_r($config);
			$config['per_page'] = 6;
			$config['uri_segment'] = 5;
			//$config['attributes'] = array('class' => 'paginate-link');
	
	    	$config['full_tag_open'] = '<ul class="pagination justify-content-center m-0">';
        	$config['full_tag_close'] = '</ul>';
        	$config['num_tag_open'] = '<li class="page-item">';
        	$config['num_tag_close'] = '</li>';
        	$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        	$config['cur_tag_close'] = '</a></li>';
        	$config['next_tag_open'] = '<li class="page-item">';
        	$config['next_tagl_close'] = '</a></li>';
        	$config['prev_tag_open'] = '<li class="page-item">';
        	$config['prev_tagl_close'] = '</li>';
        	$config['first_tag_open'] = '<li class="page-item disabled">';
        	$config['first_tagl_close'] = '</li>';
        	$config['last_tag_open'] = '<li class="page-item">';
        	$config['last_tagl_close'] = '</a></li>';
        	$config['attributes'] = array('class' => 'page-link');
		
			// Init Pagination
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$data['viewBlogComments'] = $this->Sadministrator_Model->view_address_single($id,$config["per_page"], $page);
			$data['title'] = 'View Customer Address';

			$this->load->view('staff/header-script');
	 	 	 $this->load->view('staff/header');
	  		 $this->load->view('staff/header-bottommain');
	   		 $this->load->view('staff/crm/view-address-single', $data);
			// print_r($data);
			//'<pre>'.print_r($data['viewBlogComments'] ).'</pre>';
	  		$this->load->view('staff/footertable');
		}
		
		public function get_profile($id = NULL){

			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$data['viewBlogComments'] = $this->Sadministrator_Model->get_settings($id);
			$data['title'] = 'View Customer Profile';

			$this->load->view('staff/header-script');
	 	 	 $this->load->view('staff/header');
	  		 $this->load->view('staff/header-bottommain');
	   		 $this->load->view('staff/crm/view-profile', $data);
			
	  		$this->load->view('staff/footertable');
		}
		public function enableothadd($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->enableothadd($id,$table);       
			$this->session->set_flashdata('success', 'Address Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desableothadd($id){
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sadministrator_Model->desableothadd($id,$table);       
			$this->session->set_flashdata('success', 'Address Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		
		public function delete_address($id){
			
			if(!$this->session->userdata('stafflogin')) {
				redirect('staff/index');
			}
			$this->Sadministrator_Model->delete_address($id);

			
			
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		/*address*/
		

	}
		
