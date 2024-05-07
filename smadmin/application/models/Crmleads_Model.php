<?php
	class Administrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function adminLogin($email, $encrypt_password){
			//Validate
			$this->db->where('email', $email);
			$this->db->where('password', $encrypt_password);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->row(0);
			}else{
				return false;
			}
		}	

		
	public function delete($id,$table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
		}
		
	public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('user_id', $id);
			return $this->db->update($table, $data);
		}

	public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('user_id', $id);
			return $this->db->update($table, $data);
		}

	public function enableleads($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('order_id', $id);
			return $this->db->update($table, $data);
		}

	public function desableleads($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('order_id', $id);
			return $this->db->update($table, $data);
		}

	public function enableoth($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

	public function desableoth($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

	public function enablestock($id,$table){
			$data = array(
				'stockstatus' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

	public function desablestock($id,$table){
			$data = array(
				'stockstatus' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

		//new code for hotel	
	public function enableothote($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('hotel_id', $id);
			return $this->db->update($table, $data);
		}
	public function desableothote($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('hotel_id', $id);
			return $this->db->update($table, $data);
		}
	//new code for ssubscri
	public function enableothsubscri($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('subs_id', $id);
			return $this->db->update($table, $data);
		}
		
	public function desableothsubscri($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('subs_id', $id);
			return $this->db->update($table, $data);
		}
		
		//new code for recostatus
	public function enablerec($id,$table){
			$data = array(
				'recstatus' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
	public function desablerec($id,$table){
			$data = array(
				'recstatus' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

	public function get_admin_data()
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

	public function change_password($new_password){

			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('id', $this->session->userdata('user_id'));
			return $this->db->update('users', $data);
		}

	public function match_old_password($password)
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('password' => $password));
			return $query->row_array();

		}

	// function start for forget password

	public function email_exists(){
    $email = $this->input->post('email');
    $query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
}
	public function temp_reset_password($temp_pass){
    $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$temp_pass);
                $email = $data['email'];

    if($data){
        $this->db->where('email', $email);
        $this->db->update('users', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}
public function is_temp_pass_valid($temp_pass){
    $this->db->where('reset_pass', $temp_pass);
    $query = $this->db->get('users');
    if($query->num_rows() == 1){
        return TRUE;
    }
    else return FALSE;
}

//update_siteconfiguration
		public function update_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

//Categories starts here
		public function get_categories($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('categories.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('categories');
				return $query->result_array();
			}

			$query = $this->db->get_where('categories', array('id' => $slug));
			return $query->row_array();
		}
//Categories ends here
//Sub_Categories starts here
		public function get_subcategories($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->SELECT("categories.`id` as cat_id, categories.`name`,subcategories.`id` , subcategories.`subname` ,subcategories.status as subcatstatus ");
				
				
				$this->db->join('categories', 'categories.id = subcategories.cat_id');
				$this->db->order_by('subcategories.id', 'DESC');
				$query = $this->db->get('subcategories');
				
				return $query->result_array();
			}

			
			
			$this->db->SELECT("categories.`id` as cat_id, categories.`name`, subcategories.`id` ,subcategories.`subname` ,subcategories.status as subcatstatus ");
				
				$this->db->join('categories', 'categories.id = subcategories.cat_id');
				$this->db->where('subcategories.id', $slug);
				$query = $this->db->get('subcategories');
				
				return $query->row_array();
		
		}
		public function delete_subcategories($id){
			
			
			$this->db->where('id', $id);
			$this->db->delete('subcategories');
			return true;
		}
		public function update_subcategories(){
				
		
				$data = array(
				'cat_id' => $this->input->post('name'),
				'subname' => $this->input->post('subname'),
				'status' => $this->input->post('status')
			 
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('subcategories', $data);
	
		
	}
		public function create_subcategories(){
			$data = array(
				'cat_id' => $this->input->post('name'),
				'subname' => $this->input->post('subname'),
				'status' => $this->input->post('status')
				
			    );

			return $this->db->insert('subcategories', $data);
		}
	//Sub Categories ends here
	//feedback starts here
		public function get_feedback($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('contact.id', 'DESC');
				$query = $this->db->get('contact');
				return $query->result_array();
			}

			$query = $this->db->get_where('contact', array('id' => $slug));
			return $query->row_array();
		}
//feedback ends here


/*staffs*/
		public function get_staffs($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('staffs.user_id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('staffs');
				return $query->result_array();
			}

			$query = $this->db->get_where('staffs', array('user_id' => $slug));
			return $query->row_array();
		}
		
		public function delete_staffs($id){
			
			
			$this->db->where('user_id', $id);
			$this->db->delete('staffs');
			return true;
		}
		public function update_staffs(){
			
			
				date_default_timezone_set('Asia/Kolkata');
				$data = array(
							'username' => $this->input->post('username'),
					   		'email' => $this->input->post('email'), 
					   		'name' => $this->input->post('name'), 
					   		'address' => $this->input->post('address'),
					   		'taluk' => $this->input->post('taluk'),
					   		'zipcode' => $this->input->post('zipcode'),
							'dob' => $this->input->post('dob'),
					   		'profession' => $this->input->post('profession'),
					   		'education' => $this->input->post('education'),
							'location' => $this->input->post('location'),
					   		'created_date' => date("Y-m-d H:i:s"),
							'status'=>$this->input->post('status')
			
			   	
			    );
			
			
			$this->db->where('user_id', $this->input->post('id'));
			return $this->db->update('staffs', $data);
		}
		
		
		public function create_staffs(){
			
			
			date_default_timezone_set('Asia/Kolkata');
			       $data = array(
					   
					   		'username' => $this->input->post('username'),		
					   		'fpassword' =>$this->input->post('password'),
					   		'password' =>hash('sha256', $this->input->post('password')),
					   		'email' => $this->input->post('email'), 
					   		'name' => $this->input->post('name'), 
					   		'address' => $this->input->post('address'),
					   		'taluk' => $this->input->post('taluk'),
					   		'zipcode' => $this->input->post('zipcode'),
							'dob' => $this->input->post('dob'),
					   		'profession' => $this->input->post('profession'),
					   		'education' => $this->input->post('education'),
							'location' => $this->input->post('location'),
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status'=>$this->input->post('status')
					   );
			
			return $this->db->insert('staffs', $data);
		}
/*staffs*/

/*vendors*/
		public function get_vendors($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('vendors.user_id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('vendors');
				return $query->result_array();
			}

			$query = $this->db->get_where('vendors', array('user_id' => $slug));
			return $query->row_array();
		}
		public function delete_vendors($id){
			
			
			$this->db->where('user_id', $id);
			$this->db->delete('vendors');
			return true;
		}
		public function update_vendors($post_image){
			
				date_default_timezone_set('Asia/Kolkata');
				$data = array(
							'username' => $this->input->post('username'),
					   		'email' => $this->input->post('email'), 
					   		'name' => $this->input->post('name'), 
					   		'address' => $this->input->post('address'),
					   		'state' => $this->input->post('state'),
					   		'district' => $this->input->post('district'),
							'gstn' => $this->input->post('gstn'),
					   		'created_date' => date("Y-m-d H:i:s"),
							'status'=>$this->input->post('status')
			);
			   	
			  
			$this->db->where('user_id', $this->input->post('id'));
			return $this->db->update('vendors', $data);
		}
				
		public function create_vendors($post_image)
		{
			
			
			date_default_timezone_set('Asia/Kolkata');
			       $data = array(
					   
					   		'username' => $this->input->post('username'),
					   		'email' => $this->input->post('email'), 
					   		'name' => $this->input->post('name'), 
					   		'address' => $this->input->post('address'),
					   		'state' => $this->input->post('state'),
					   		'district' => $this->input->post('district'),
							'gstn' => $this->input->post('gstn'),
					   		'created_date' => date("Y-m-d H:i:s"),
							'status'=>$this->input->post('status')
					   );
			
			return $this->db->insert('vendors', $data);
		}
/*vendors*/
/*products*/
		public function get_products($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$this->db->SELECT("products.id AS proid, `products.product_id`,products.cat_id,categories.name as catname, products.subcat_id,subcategories.subname as  subname, products.name as prodname, products.`srater`, products.`image`, products.`description`, products.`datetime`, products.status as prodstatus, products.stockstatus");
				$this->db->join('categories', 'products.cat_id = categories.id');
				$this->db->join('subcategories', 'products.subcat_id = subcategories.id');
				$this->db->order_by('products.id', 'DESC');
				$query = $this->db->get('products');
				//$query = $this->db->get('products');
				return $query->result_array();
			}

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			
			$this->db->SELECT("products.id AS proid, `products.product_id`,products.cat_id,categories.name as catname, products.subcat_id,subcategories.subname as  subname, products.name as prodname, products.`srater`, products.`image`, products.`description`, products.`datetime`, products.status as prodstatus");
				$this->db->join('categories', 'products.cat_id = categories.id');
				$this->db->join('subcategories', 'products.subcat_id = subcategories.id');
				$this->db->where('products.id', $slug);
				$query = $this->db->get('products');
				return $query->row_array();
		}

		public function delete_product($id){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			
			$this->db->where('id', $id);
			$this->db->delete('products');
			return true;
		}

		public function get_sub_category($id= FALSE){
			if($id=== FALSE)
			{
			$this->db->order_by('id');
			$query = $this->db->get('subcategories');
			return $query->result_array();
			
			}

			$query = $this->db->get_where('subcategories', array('cat_id' => $id));
			//return $query->row_array();
			return $query;
		}

		public function get_sub_products($cid= FALSE,$id= FALSE){
			if($id=== FALSE)
			{
			$this->db->order_by('id');
			$query = $this->db->get('products');
			return $query->result_array();
			
			}

			$query = $this->db->get_where('products', array('cat_id' => $cid,'subcat_id' => $id));
			//return $query->row_array();
			return $query;
		}

		public function get_blocks($id= FALSE,$idz= FALSE){
			if($id=== FALSE)
			{
			$this->db->order_by('district');
			$query = $this->db->get('locations');
			return $query->result_array();
			
			}
			
			
			$query = $this->db->get_where('locations', array('district' => $id,'type' => $idz));
			return $query;
		}

		public function update_products($post_image){
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
				date_default_timezone_set('Asia/Kolkata');
				// 'datetime' => date("Y-m-d H:i:s")	
				$data = array(
							
					   		'cat_id' => $this->input->post('category'),
					   		'subcat_id' => $this->input->post('subcategory'),
					   		'name' => $this->input->post('name'), 
					   		'srater' => $this->input->post('price'),
					   		'image' => $post_image,
							'description' => $this->input->post('description'),
					   		'status' => $this->input->post('status'),
						   	'datetime' => date("Y-m-d H:i:s")
			   	
			    );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('products', $data);
		}

		public function create_product($post_image){

			 $next = $this->db->query("SHOW TABLE STATUS LIKE 'products'");
			 $next = $next->row(0);
			 $next->Auto_increment;
			 $pro_id=$next->Auto_increment+100;

				date_default_timezone_set('Asia/Kolkata');
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
			       $data = array(

			       			'product_id' =>'A'.$pro_id,
							'cat_id' => $this->input->post('category'),
					   		'subcat_id' => $this->input->post('subcategory'),
					   		'name' => $this->input->post('name'), 
					   		'srater' => $this->input->post('price'),
					   		'image' => $post_image,
							'description' => $this->input->post('description'),
					   		'status' => $this->input->post('status'),
						   	'datetime' => date("Y-m-d H:i:s")
						);
			//$this->db->insert('products', $data);
			 //return  $insert_id = $this->db->insert_id();
			return $this->db->insert('products', $data);
		}
/*products*/

/*leads*/
/*cleads*/
		public function get_leads($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$this->db->order_by('cleads.order_id', 'DESC');
			$query = $this->db->get('cleads');
			return $query->result_array();
			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->where('cleads.order_id', $slug);
			$query = $this->db->get('cleads');
			return $query->row_array();
		}

// cleads create starts
		public function create_leads(){
				date_default_timezone_set('Asia/Kolkata');
				$created_date= date("Y-m-d H:i:s");
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
				$pwd="12345678";

					   			//SELECT `order_id`, `user_id`, `name`, `email`, `username`, `contact`, `address`, `state`, `district`, `location`, `landmark`, `zipcode`, `address_id`, `referal`, `handledby`, `csuggesttime`, `leadstatus`, `approachstatus`, `pdate`, `meetorganiz`, `custremarks`, `leadcordremarks`, `inquiredfor`, `cat_id`, `categoryname`, `subcat_id`, `subcategoryname`, `product_id`, `product_name`, `inquiryassigned`, `inquryassigneduser`, `inquryassigneduserid`, `executivename`, `executivenameid`, `franchiseeremarks`, `executivecontact`, `created_date`, `status`, `password` FROM `cleads` WHERE 1 password' =>hash('sha256', $this->input->post('password')),
			       $data = array(

			       			//'user_id' => $this->input->post('user_id'),
			       			'name' => $this->input->post('name'),
			       			'email' => $this->input->post('email'),
			       			'username' => $this->input->post('username'),
			       			'contact' => $this->input->post('contact'),
			       			'address' => $this->input->post('address'),
			       			'state' => $this->input->post('state'),
			       			'district' => $this->input->post('district'),
			       			'location' => $this->input->post('location'),
			       			'landmark' => $this->input->post('landmark'),
			       			'zipcode' => $this->input->post('zipcode'),
			       			//'address_id' => $this->input->post('address_id'),
			       			'referal' => $this->input->post('referal'),
			       			'handledby' => $this->input->post('handledby'),
			       			'csuggesttime' => $this->input->post('csuggesttime'),
			       			'leadstatus' => $this->input->post('leadstatus'),
			       			'approachstatus' => $this->input->post('approachstatus'),
			       			//'pdate' => $this->input->post('pdate'),
			       			'pdate' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $this->input->post('pdate')))),
			       			'meetorganiz' => $this->input->post('meetorganized'),
			       			'custremarks' => $this->input->post('custremarks'),
			       			'leadcordremarks' => $this->input->post('leadcordremarks'),
			       			'inquiredfor' => $this->input->post('inquiredfor'),
							'cat_id' => $this->input->post('category'),
							'categoryname' => $this->input->post('categoryname'),
					   		'subcat_id' => $this->input->post('subcategory'),
					   		'subcategoryname' => $this->input->post('subcategoryname'),
					   		'product_id' => $this->input->post('productid'),
					   		'product_name' => $this->input->post('productname'),
					   		'inquiryassigned' => $this->input->post('inquiryassigned'),
					   		'inquryassigneduser' => $this->input->post('inquryassignedusername'),
					   		'inquryassigneduserid' => $this->input->post('inquryassigneduser'),
					   		'executivename' => $this->input->post('executivenamez'),
					   		'executivenameid' => $this->input->post('executivename'),
					   		'franchiseeremarks' => $this->input->post('franchiseeremarks'),
					   		'executivecontact' => $this->input->post('executivecontact'),
					   		'password' =>hash('sha256', $pwd),
					   		'fpassword' =>$pwd,

					   		'created_date' => $created_date,
					   		'status' => 0
					   		

						);
			return $this->db->insert('cleads', $data);
		}
//cleads create ends 
/*cleads*/


		public function get_sub_customers($id= FALSE){
			if($id=== FALSE)
			{
			$this->db->order_by('user_id');
			$query = $this->db->get('users');
			return $query->result_array();
			
			}
			$this->db->select('customer_addresses.door_no, customer_addresses.user_address,customer_addresses.landmark, customer_addresses.address_id, customer_addresses.address_name, customer_addresses.pincode, users.taluk,users.username, users.contact');
			$this->db->from('customer_addresses');
			$this->db->join('users', 'users.user_id = customer_addresses.user_id', 'left');
			$this->db->where("users.role_id  <>",3);
			$this->db->where('users.user_id', $id);
			$query = $this->db->get();
			return $query->result();
			
		}

		public function get_staff_contact($id= FALSE){
			if($id=== FALSE)
			{
			$this->db->order_by('user_id');
			$query = $this->db->get('staffs');
			return $query->result_array();
			
			}

			$query = $this->db->get_where('staffs', array('user_id' => $id));
			return $query->result();
			//return $query;
		}


		public function update_leads(){
				date_default_timezone_set('Asia/Kolkata');
				$created_date= date("Y-m-d H:i:s");

		    	//$query = $this->db->query("SET character_set_connection=utf8mb4");
				//$query = $this->db->query("SET character_set_results=utf8mb4");

			       $data = array(

			       			'user_id' => $this->input->post('user_id'),
			       			'address_id' => $this->input->post('address_id'),
							'cat_id' => $this->input->post('category'),
					   		'subcat_id' => $this->input->post('subcategory'),
					   		'product_id' => $this->input->post('productid'),
					   		'product_name' => $this->input->post('productname'), 
					   		'totalarea' => $this->input->post('totalarea'), 
					   		'totalorg' => $this->input->post('totalorg'),
					   		'created_date' => $created_date
						);

			       $result =$this->db->where('order_id', $this->input->post('id'));
   				   $result = $this->db->get('orders');

   				  if ($result->num_rows() == 1)
    				{
      				$this->db->where('order_id', $this->input->post('id'));
      				$this->db->update('orders',$data);
   					}
			     
					$this->db->where('order_id', $this->input->post('id'));
					return $this->db->update('leads', $data);
		}

		/*leadsfollowup*/
		public function get_leadsfollowup($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('leadsfollowup.order_id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('leadsfollowup');
				return $query->result_array();
			}

			$query = $this->db->get_where('leadsfollowup', array('order_id' => $slug));
			//return $query->row_array();
			return $query->result_array();
		}
		/*leadsfollowup*/

		//Check id and table value exists
		 public function check_id_exists($cid,$ctable,$cvalue){
		 	//$query = $this->db->get_where('products', array('sku' => $sku));
		 	$query = $this->db->get_where($ctable, array($cid => $cvalue));

		 	if(empty($query->row_array())){
		 		return true;
		 	}else{
		 		return false;
		 	}
		 }

		public function addtoorder($id,$table){
		date_default_timezone_set('Asia/Kolkata');
			$data = array(
				'workstatus' => 1,
				'work_date' => date("Y-m-d H:i:s")
			    );
			$this->db->where('order_id', $id);
			return $this->db->update($table, $data);
		}

	/*leadsfollowup*/



		public function DuplicateMySQLRecord ($table1,$table2, $primary_key_field, $primary_key_val) 
			{
   				/* generate the select query */
   				$this->db->where($primary_key_field, $primary_key_val); 
   				$query = $this->db->get($table1);
  	
    				foreach ($query->result() as $row){   
       					foreach($row as $key=>$val){        
          					//if($key != $primary_key_field){ 
          					/* $this->db->set can be used instead of passing a data array directly to the insert or update functions */
          						$this->db->set($key, $val);               
          						//}//endif              
       					}//endforeach
    				}//endforeach

    				/* insert the new record into table*/
    			return $this->db->insert($table2); 
			}


	public function add_leadsfollowups($groupname)
		{

				date_default_timezone_set('Asia/Kolkata');
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
			      $data = array(

			       			'order_id' =>$this->input->post('mpurcorder_id'),
							'staff_id' => $this->input->post('staffname'),
					   		'staff_name' =>  $groupname,
					   		'meeting' => $this->input->post('meeting'), 
					   		'online' => $this->input->post('online'),
					   		'status' => $this->input->post('shstatus'),
						   	'created_date' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('leadsfollowup', $data);
		}

		public function delete_leadsfollowup($id){
			
			
			$this->db->where('id', $id);
			$this->db->delete('leadsfollowup');
			return true;
		}


		/*leadsmeasurements*/
		public function get_leadsmeasurements($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}

			$query = $this->db->get_where('leadsmeasure', array('order_id' => $slug));
			//return $query->row_array();
			return $query->result_array();
			
		}

		public function create_leadsmeasurements()
		{
			//SELECT `id`, `order_id`, `cust_id`, `cust_name`, `resitype`, `roomtype`, `materialtype`, `materialname`, `width`, `hight`, `sqft`, `status`, `created_date` FROM `leadsmeasure` WHERE 1
			
			date_default_timezone_set('Asia/Kolkata');
			       $data = array(
					   
					   		'order_id' => $this->input->post('id'),
					   		'cust_id' => $this->input->post('cid'), 
					   		'cust_name' => $this->input->post('name'), 
					   		'resitype' => $this->input->post('resitype'),
					   		'roomtype' => $this->input->post('roomtype'),
					   		'materialtype' => $this->input->post('materialtype'),
							'materialname' => $this->input->post('materialname'),
							'width' => $this->input->post('width'),
							'hight' => $this->input->post('height'),
							'sqft' => $this->input->post('sqft'),
					   		'created_date' => date("Y-m-d H:i:s"),
							'status'=>1
					   );
			
			return $this->db->insert('leadsmeasure', $data);
		}

		public function get_leadsmeasurement($slug = FALSE, $limit = FALSE, $offset = FALSE)
		{

			if($limit){
				$this->db->limit($limit, $offset);
			}

			$query = $this->db->get_where('leadsmeasure', array('id' => $slug));
			return $query->row_array();
			//return $query->result_array();


		}
		
		public function update_leadsmeasurements()
		{
				date_default_timezone_set('Asia/Kolkata');
				$created_date= date("Y-m-d H:i:s");

		    	//$query = $this->db->query("SET character_set_connection=utf8mb4");
				//$query = $this->db->query("SET character_set_results=utf8mb4");

			       $data = array(

			       			'order_id' => $this->input->post('order_id'),
					   		'cust_id' => $this->input->post('cid'), 
					   		'cust_name' => $this->input->post('name'), 
					   		'resitype' => $this->input->post('resitype'),
					   		'roomtype' => $this->input->post('roomtype'),
					   		'materialtype' => $this->input->post('materialtype'),
							'materialname' => $this->input->post('materialname'),
							'width' => $this->input->post('width'),
							'hight' => $this->input->post('height'),
							'sqft' => $this->input->post('sqft'),
					   		'created_date' => date("Y-m-d H:i:s"),
							'status'=>1
						);

					$this->db->where('id', $this->input->post('id'));
					return $this->db->update('leadsmeasure', $data);
		}


		public function delete_leadsmeasurements($id){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			
			$this->db->where('id', $id);
			$this->db->delete('leadsmeasure');
			return true;
		}


		/*leadsmeasurements*/
		/*leads*/
		/*orders*/
		public function get_orders($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$this->db->SELECT("orders.`orders_id`, orders.`order_id`,users.name, users.username, customer_addresses.door_no, customer_addresses.landmark,customer_addresses.address_name, customer_addresses.user_address, customer_addresses.pincode, orders.`created_date`, orders.`workstatus`,  orders.`work_date`");
				$this->db->join('users', 'users.user_id = orders.user_id');
				$this->db->join('customer_addresses', 'customer_addresses.address_id = orders.address_id');
				$this->db->order_by('orders.orders_id', 'DESC');

				$query = $this->db->get('orders');
				//$query = $this->db->get('products');
				return $query->result_array();
			}

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			
			$this->db->SELECT("orders.`orders_id`,orders.`order_id`, orders.`user_id`,users.name,users.username,users.email, orders.`address_id`,  categories.name as catname, subcategories.subname as subname,orders.product_id, orders.product_name, customer_addresses.door_no, customer_addresses.landmark, customer_addresses.address_name, customer_addresses.user_address,customer_addresses.pincode, orders.`totalarea`, orders.`totalorg`, orders.`created_date`, orders.`workstatus`, orders.`work_date`, orders.`staff_id`, orders.`staff_date`, orders.`payment_id`, orders.`payment_method`, orders.`transaction_id`, orders.`payment_status`, orders.`created_date`,orders.`status`");
				$this->db->join('users', 'users.user_id = orders.user_id');
				$this->db->join('customer_addresses', 'customer_addresses.address_id = orders.address_id');
				$this->db->join('categories', 'categories.id = orders.cat_id');
				$this->db->join('subcategories', 'subcategories.id = orders.subcat_id');
				$this->db->where('orders.orders_id', $slug);
				$query = $this->db->get('orders');
				return $query->row_array();
		}
		/*ordersfollowup*/
		public function get_ordersfollowup($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('ordersfollowup.order_id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('ordersfollowup');
				return $query->result_array();
			}

			$query = $this->db->get_where('ordersfollowup', array('order_id' => $slug));
			//return $query->row_array();
			return $query->result_array();
		}

		public function delete_ordersfollowup($id){
			
			
			$this->db->where('id', $id);
			$this->db->delete('ordersfollowup');
			return true;
		}

			public function add_ordersfollowups($groupname)
		{

				date_default_timezone_set('Asia/Kolkata');
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
			      $data = array(

			       			'order_id' =>$this->input->post('mpurcorder_id'),
							'staff_id' => $this->input->post('staffname'),
					   		'staff_name' =>$groupname,
					   		'meeting' => $this->input->post('meeting'), 
					   		'online' => $this->input->post('online'),
					   		'status' => $this->input->post('shstatus'),
						   	'created_date' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('ordersfollowup', $data);
		}
		/*ordersfollowup*/

		/*orders*/
		/*address*/
		public function get_address()
		{
			/*$this->db->order_by('users.id', 'DESC');
			$this->db->join('customer_addresses', 'customer_addresses.user_id = users.user_id');
			$query = $this->db->get('customer_addresses');
			//
			return $query->result_array(); */
			$this->db->select('customer_addresses.door_no, customer_addresses.user_address, customer_addresses.address_id as addressId, customer_addresses.user_id as commentId, customer_addresses.created_date as createdAt, customer_addresses.status as addressStatus, users.name as cname');
			$this->db->from('customer_addresses');
			$this->db->join('users', 'users.user_id = customer_addresses.user_id', 'left');
			$this->db->where("users.role_id  <>",3);
			//$this->db->where('comments.comment_type', 'blog');

			$query=$this->db->get();
			return $data=$query->result_array();
				
		}
		public function enableothadd($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('address_id', $id);
			return $this->db->update($table, $data);
			
		}
		public function desableothadd($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('address_id', $id);
			return $this->db->update($table, $data);
			
		}
		public function view_address_single($id = FALSE, $limit = FALSE, $offset = FALSE)
		{

			/*if($id === FALSE){
				$query = $this->db->get('customer_addresses');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('customer_addresses', array('address_id' => $id));
			return $query->row_array();*/
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($id === FALSE){
				$this->db->select('customer_addresses.door_no, customer_addresses.user_address,  customer_addresses.landmark, customer_addresses.user_latlng,  customer_addresses.address_name, customer_addresses.address_id as addressId, customer_addresses.user_id as commentId, customer_addresses.created_date as createdAt, customer_addresses.status as addressStatus, users.name as cname, users.username as contact, users.email as email' );
			$this->db->from('customer_addresses');
			$this->db->join('users', 'users.user_id = customer_addresses.user_id', 'left');
			$this->db->where("users.role_id  <>",3);
			//$this->db->where('comments.comment_type', 'blog');

			$query=$this->db->get();
			return $query->row_array();
				//return false;
			}
            

			
			$this->db->select('customer_addresses.door_no, customer_addresses.user_address, customer_addresses.landmark, customer_addresses.user_latlng, customer_addresses.address_name,  customer_addresses.address_id as addressId, customer_addresses.user_id as commentId, customer_addresses.created_date as createdAt, customer_addresses.status as addressStatus, users.name as cname, users.username as contact, users.email as email');
			$this->db->from('customer_addresses');
			$this->db->join('users', 'users.user_id = customer_addresses.user_id', 'left');
			$this->db->where('customer_addresses.user_id  =',$id);
		
			//$this->db->where('comments.comment_type', 'blog');

			$query=$this->db->get();
		
			return $query->result_array();

			
		}
		public function delete_address($id){
			
			$this->db->where('address_id', $id);
			$this->db->delete('customer_addresses');
			return true;
		}
		/*address*/
		
	

	}

?>