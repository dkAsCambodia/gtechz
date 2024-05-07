<?php
	class Sadministrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function sadminLogin($email, $encrypt_password){
			//Validate
			$this->db->where('email', $email);
			$this->db->where('password', $encrypt_password);

			$result = $this->db->get('m_minmad');

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
/*INVENTORY STARTS*/
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
			
			$this->db->SELECT("`products`.`id` AS `proid`, `products`.`product_id`, `products`.`cat_id`, `subcat_id`,`categories`.`name` as `catname`, `products`.`subcat_id`, `subcategories`.`subname` as `subname`, `products`.`name` as `prodname`,`products`.`image`, `products`.`description`, `products`.`datetime`, `products`.`status` as `prodstatus`, `products`.`hsn`, `products`.`stockstatus`, `products`.`shownweb`, `products`.`prodtype`, `products`.`seller_id`, `products`.`seller_name`, `products`. `unittype`, `products`.`unit`, `products`.`purc`, `products`.`tax`, `products`.`cost`, `products`.`mrp`, `products`.`sellerper`, `products`.`srater`, `products`.`modified_date`");
				$this->db->join('categories', 'products.cat_id = categories.id');
				$this->db->join('subcategories', 'products.subcat_id = subcategories.id');
				$this->db->where('products.id', $slug);

				//SELECT `products`.`id` AS `proid`, `products`.`product_id`, `products`.`cat_id`, `subcat_id`,`categories`.`name` as `catname`, `products`.`subcat_id`, `subcategories`.`subname` as `subname`, `products`.`name` as `prodname`,`products`.`image`, `products`.`description`, `products`.`datetime`, `products`.`status` as `prodstatus`, `products`.`hsn`, `products`.`stockstatus`, `products`.`shownweb`, `products`.`prodtype`, `products`.`seller_id`, `products`.`seller_name`, `products`. `unittype`, `products`.`unit`, `products`.`purc`, `products`.`tax`, `products`.`cost`, `products`.`mrp`, `products`.`sellerper`, `products`.`srater`, `products`.`modified_date` FROM `products` JOIN `categories` ON `products`.`cat_id` = `categories`.`id` JOIN `subcategories` ON `products`.`subcat_id` = `subcategories`.`id` WHERE `products`.`id` = '40' 
				$query = $this->db->get('products');
				//echo $this->db->last_query();
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

			       			//'product_id' =>'A'.$pro_id,
							'cat_id' => $this->input->post('category'),
					   		'subcat_id' => $this->input->post('subcategory'),
					   		'name' => $this->input->post('name'),
					   		'image' => $post_image,
					   		'description' => $this->input->post('description'),
					   		'datetime' => date("Y-m-d H:i:s"),
					   		'status' => $this->input->post('status'),
					   		'hsn' => $this->input->post('hsn'),
					   		'stockstatus' => $this->input->post('ops'),
					   		'shownweb' => $this->input->post('shownweb'),
					   		'prodtype' => $this->input->post('prodtype'),
					   		'seller_id' => $this->input->post('seller_id'),
					   		'seller_name' => $this->input->post('seller_name'),
					   		'unittype' => $this->input->post('unittype'),
					   		'unit' => $this->input->post('unit'),
					   		'purc' => $this->input->post('prate'),
					   		'tax' => $this->input->post('tax'),
					   		'cost' => $this->input->post('cost'),
					   		'mrp' => $this->input->post('mrp'),
					   		'sellerper' => $this->input->post('sellerper'),
					   		'srater' => $this->input->post('srate'),
						   	'modified_date' => date("Y-m-d H:i:s")
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
				//SELECT id, product_id, cat_id, subcat_id, name, image, description, datetime, status, stockstatus, shownweb, prodtype, vendor_id, vendorname, unittype, unit, purc, tax, cost, mrp, salesper, srater, modified_date FROM products
			       $data = array(

			       			'product_id' =>'A'.$pro_id,
							'cat_id' => $this->input->post('category'),
					   		'subcat_id' => $this->input->post('subcategory'),
					   		'name' => $this->input->post('name'),
					   		'image' => $post_image,
					   		'description' => $this->input->post('description'),
					   		'datetime' => date("Y-m-d H:i:s"),
					   		'status' => $this->input->post('status'),
					   		'hsn' => $this->input->post('hsn'),


					   		'stockstatus' => $this->input->post('ops'),
					   		'shownweb' => $this->input->post('shownweb'),
					   		'prodtype' => $this->input->post('prodtype'),
					   		'seller_id' => $this->input->post('seller_id'),
					   		'seller_name' => $this->input->post('seller_name'),
					   		'unittype' => $this->input->post('unittype'),
					   		'unit' => $this->input->post('unit'),
					   		'purc' => $this->input->post('prate'),
					   		'tax' => $this->input->post('tax'),
					   		'cost' => $this->input->post('cost'),
					   		'mrp' => $this->input->post('mrp'),
					   		'sellerper' => $this->input->post('sellerper'),
					   		'srater' => $this->input->post('srate'),
						   	'modified_date' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('products', $data);
		}
/*products*/
/*INVENTORY ENDS*/

/*leads*/
/*cleads*/
		public function get_leads($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$this->db->select('cleads.`order_id`, cleads.`name`, cleads.`email`, cleads.`username`, cleads.`contact`, cleads.`address`, cleads.`state`, cleads.`district`, cleads.`location`, cleads.`landmark`, cleads.`zipcode`, cleads.`referal`, cleads.`handledby`, cleads.`csuggesttime`, cleads.`leadstatus`, cleads.`approachstatus`, cleads.`pdate`, cleads.`meetorganiz`, cleads.`custremarks`, cleads.`leadcordremarks`, cleads.`inquiredfor`, cleads.`cat_id`, cleads.`categoryname`, cleads.`subcat_id`, cleads.`subcategoryname`, cleads.`product_id`, cleads.`product_name`, cleads.`inquiryassigned`, cleads.`inquryassigneduser`, cleads.`inquryassigneduserid`, cleads.`executivename`, cleads.`executivenameid`, cleads.`franchiseeremarks`, cleads.`executivecontact`, cleads.`created_date`, cleads.`status`, cleads.`password`, cleads.`fpassword`,cleadssales.id as cleadssalesid,cleadssales.authorise as authorise');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');
			$this->db->order_by('cleads.order_id', 'DESC');
			$query = $this->db->get();
			//echo $this->db->last_query();
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
			       	'requiredfor' => $this->input->post('requiredfor'),
			       	'totarea' => $this->input->post('totarea'),
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

			//return $this->db->insert('cleads', $data);
			$this->db->insert('cleads', $data);
			$insert_id= $this->db->insert_id();
			$datau = array(
					'order_id'=>$insert_id,
					'staff_id' => $this->input->post('inquryassigneduser'),
					'staff_name' => $this->input->post('inquryassignedusername'),
			       	'leadstatus' => $this->input->post('leadstatus'),
					'approachstatus' => $this->input->post('approachstatus'),
					'created_date' => $created_date,
					'status' => 1
			);
			$datae = array(
					'order_id'=>$insert_id,
					'staff_id' => $this->input->post('executivename'),
					'staff_name' => $this->input->post('executivenamez'),
			       	'leadstatus' => $this->input->post('leadstatus'),
					'approachstatus' => $this->input->post('approachstatus'),
					'created_date' => $created_date,
					'status' => 1
			);
			$this->db->insert('cleadsuserassigned', $datau);
			$this->db->insert('cleadsuserexecutive', $datae);

		}
		public function update_leadsc(){
			date_default_timezone_set('Asia/Kolkata');
			$created_date= date("Y-m-d H:i:s");

		    //$query = $this->db->query("SET character_set_connection=utf8mb4");
			//$query = $this->db->query("SET character_set_results=utf8mb4");

			$data = array(
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
			    'referal' => $this->input->post('referal'),
			    'handledby' => $this->input->post('handledby'),
			    'requiredfor' => $this->input->post('requiredfor'),
			    'totarea' => $this->input->post('totarea'),
			    'csuggesttime' => $this->input->post('csuggesttime'),
			    'leadstatus' => $this->input->post('leadstatus'),
			    'custremarks' => $this->input->post('custremarks'),
			    'cat_id' => $this->input->post('category'),
			    'categoryname' => $this->input->post('categoryname'),
				'subcat_id' => $this->input->post('subcategory'),
				'subcategoryname' => $this->input->post('subcategoryname'),
				'product_id' => $this->input->post('productid'),
				'product_name' => $this->input->post('productname'),
				'inquryassigneduser' => $this->input->post('inquryassignedusername'),
				'inquryassigneduserid' => $this->input->post('inquryassigneduser'),
				'franchiseeremarks' => $this->input->post('franchiseeremarks')
			);

			$datau = array(
					//'order_id'=>$this->input->post('id'),
					'staff_id' => $this->input->post('inquryassigneduser'),
					'staff_name' => $this->input->post('inquryassignedusername'),
			       	'leadstatus' => $this->input->post('leadstatus'),
					'approachstatus' => $this->input->post('approachstatus'),
					'status' => 1
			);
			$result =$this->db->where('order_id', $this->input->post('id'));
			$result =$this->db->update('cleads', $data);

   			if ($result){
      			//update cleadsuserassigned with info
      			$this->db->where('order_id', $this->input->post('id'));
      			//$this->db->update('cleadsuserassigned',$datau);
      			return $this->db->update('cleadsuserassigned', $datau);

   			}    
			
		}
		public function update_leadsp(){
			date_default_timezone_set('Asia/Kolkata');
			$created_date= date("Y-m-d H:i:s");

		    //$query = $this->db->query("SET character_set_connection=utf8mb4");
			//$query = $this->db->query("SET character_set_results=utf8mb4");

			$data = array(

				'leadstatus' => $this->input->post('leadstatus'),
			    'approachstatus' => $this->input->post('approachstatus'),
			    //'pdate' => $this->input->post('pdate'),
			    'pdate' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $this->input->post('pdate')))),
				'executivename' => $this->input->post('executivenamez'),
				'executivenameid' => $this->input->post('executivename'),
				'franchiseeremarks' => $this->input->post('franchiseeremarks'),
				'executivecontact' => $this->input->post('executivecontact')
			);

			$datae = array(

				'order_id' => $this->input->post('id'),
				'staff_id' => $this->input->post('executivename'),
				'staff_name' => $this->input->post('executivenamez'),
			    'leadstatus' => $this->input->post('leadstatus'),
				'approachstatus' => $this->input->post('approachstatus'),
				'created_date' => $created_date,
				'status' => 1
			);
			$datad = array(
				'status' => 0
			);
			$result =$this->db->where('order_id', $this->input->post('id'));
			$result =$this->db->update('cleads', $data);
   			
   			if ($result){
      			//update cleadsuserexecutive with info

      			$resultm = $this->db->where('order_id', $this->input->post('id'));
      			$resultm = $this->db->get('cleadsuserexecutive');

      			if ($resultm->num_rows() > 0) {
      			
					$this->db->update('cleadsuserexecutive', $datad);
					//update status to zero
					return $this->db->insert('cleadsuserexecutive', $datae);
      			}
      			else{

      			 	//insert new data
      			 	return $this->db->insert('cleadsuserexecutive', $datae);

      			}

      			//return $this->db->update('cleadsuserexecutive', $data);

   			}    
			
		}

		public function get_leads_meetingadd($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			//SELECT cleads.order_id,name,email,username,contact,address,state,district,location,landmark,zipcode,executivename,executivenameid,inquiredfor,product_id,product_name,meetorganiz,leadstatus,id,mmeetingresult,`mprestatus`, `mccustremarks`, `mcustremarks`, `mcomments`, `mstatus`, `mcreated_date`, `mmodified_date` FROM `cleads` left join cleadsmeetings on cleads.order_id=cleadsmeetings.order_id and cleads.executivenameid=cleadsmeetings.mstaff_id where cleads.order_id=23 order by cleadsmeetings.id desc ,cleadsmeetings.mcreated_date desc LIMIT 1

			$this->db->query("SET character_set_connection=utf8mb4");
			$this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, name, email, username, contact, address, state, district, location, landmark, zipcode, executivename, executivenameid, inquiredfor, product_id, product_name, meetorganiz, leadstatus,approachstatus,id, mmeetingresult, `mprestatus`, `mccustremarks`, `mcustremarks`, `mcomments`, `mstatus`,`mcreated_date`, `mmodified_date`');
			$this->db->from('cleads');
			$this->db->join('cleadsmeetings', 'cleads.order_id = cleadsmeetings.order_id AND cleads.executivenameid = cleadsmeetings.mstaff_id', 'left');
			//$this->db->join('cleadsmeetings', 'cleadsmeetings.executivenameid = cleads.mstaff_id', 'left');
			$this->db->where('cleads.order_id', $slug);
			$this->db->order_by('cleadsmeetings.id','desc');
			$this->db->order_by('cleadsmeetings.mcreated_date','desc');
    		$this->db->limit(1); 
			//$query = $this->db->get('cleads');
			$query = $this->db->get();
			return $query->row_array();
		}

		public function get_leads_meetingview($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->query("SET character_set_connection=utf8mb4");
			$this->db->query("SET character_set_results=utf8mb4");
			
			$this->db->where('cleadsmeetings.order_id', $slug);
			$this->db->order_by('cleadsmeetings.id','desc');
			$this->db->order_by('cleadsmeetings.mcreated_date','desc');
			$query = $this->db->get('cleadsmeetings');
			return $query->result_array();

		}

		public function update_meeting_tracker(){
			date_default_timezone_set('Asia/Kolkata');
			$created_date= date("Y-m-d H:i:s");
			$modified_date= date("Y-m-d H:i:s");

		    //$query = $this->db->query("SET character_set_connection=utf8mb4");
			//$query = $this->db->query("SET character_set_results=utf8mb4");

			if($this->input->post('id')!=""){
				//update
				   //`order_id`, `mstaff_id`, `mstaff_name`, `mmeetingresult`, `mprestatus`, `mccustremarks`, `mcustremarks`, `mcomments`, `mstatus`, `mcreated_date`, `mmodified_date` FROM `cleadsmeetings`
				$data = array(
					'order_id'=>$this->input->post('orderid'),
					'mstaff_id' => $this->input->post('executivenameid'),
					'mstaff_name' => $this->input->post('executivenamez'),
			       	'mmeetingresult' => $this->input->post('mmeetingresult'),
					'mprestatus' => $this->input->post('mprestatus'),
					'mccustremarks' => $this->input->post('mccustremarks'),
					'mcustremarks' => $this->input->post('mcustremarks'),
					'mcomments' => $this->input->post('mcomments'),
					//'mcreated_date' => $created_date,
					//'mstatus' => 1
					'mmodified_date' => $modified_date
					
				);

				$this->db->where('id', $this->input->post('id'));
				return $this->db->update('cleadsmeetings', $data);
			}
			else{
				//insert
				$data = array(
					'order_id'=>$this->input->post('orderid'),
					'mstaff_id' => $this->input->post('executivenameid'),
					'mstaff_name' => $this->input->post('executivenamez'),
			       	'mmeetingresult' => $this->input->post('mmeetingresult'),
					'mprestatus' => $this->input->post('mprestatus'),
					'mccustremarks' => $this->input->post('mccustremarks'),
					'mcustremarks' => $this->input->post('mcustremarks'),
					'mcomments' => $this->input->post('mcomments'),
					'mcreated_date' => $created_date,
					'mmodified_date' => $modified_date,
					'mstatus' => 1
				);
				return $this->db->insert('cleadsmeetings', $data);
			}
			
		}

		//services
		
		public function get_leads_services($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$this->db->order_by('cleadsservices.id', 'DESC');
			$query = $this->db->get('cleadsservices');
			return $query->result_array();
			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->where('cleadsservices.id', $slug);
			$query = $this->db->get('cleadsservices');
			return $query->row_array();
		}
		
		public function update_services(){
			date_default_timezone_set('Asia/Kolkata');
			//$created_date= date("Y-m-d H:i:s");
			$modified_date= date("Y-m-d H:i:s");

		    $query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");



			if($this->input->post('id')!=""){

				$data = array(
					'remarks' => $this->input->post('remarks'),
					'servicecharge' => $this->input->post('servicecharge'),
					'status' => $this->input->post('status'),
					'modified_date' => $modified_date
					
				);

				$this->db->where('id', $this->input->post('id'));
				return $this->db->update('cleadsservices', $data);
			
			}
		}

		public function create_services(){
				date_default_timezone_set('Asia/Kolkata');
				
				$created_date= date("Y-m-d H:i:s");
				$modified_date= date("Y-m-d H:i:s");
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
				$pwd="12345678";

			    $data = array(
			    	'bill_no' => $this->input->post('bill_no'),
			    	'name' => $this->input->post('name'),
			    	'user_id' => $this->input->post('user_id'),
			       	'service' => $this->input->post('service'),
			       	'servicemode' => $this->input->post('servicemode'),
			       	'remarks' => $this->input->post('remarks'),
			       	'servicecharge' => $this->input->post('servicecharge'),
					'created_date' => $created_date,
					'modified_date' => $created_date,
					'status' => 1
					   	
			);

			$this->db->insert('cleadsservices', $data);
		}
		//services
		public function get_cleadssalesnamesingle($id= FALSE){
			if($id=== FALSE)
			{
			$this->db->order_by('bill_no');
			$query = $this->db->get('cleadssales');
			return $query->result_array();
			
			}
			$this->db->select('cleads.name,cleads.order_id,cleadssales.bill_no');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id');
			$this->db->where('cleadssales.bill_no', intval($id));
			$query = $this->db->get();
			return $query->result();
			
		}
		//complaints
		
		public function get_leads_complaints($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$this->db->order_by('cleadscomplaints.id', 'DESC');
			$query = $this->db->get('cleadscomplaints');
			return $query->result_array();
			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->where('cleadscomplaints.id', $slug);
			$query = $this->db->get('cleadscomplaints');
			return $query->row_array();
		}

		public function update_complaints(){
			date_default_timezone_set('Asia/Kolkata');
			//$created_date= date("Y-m-d H:i:s");
			$modified_date= date("Y-m-d H:i:s");

		    $query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			if($this->input->post('id')!=""){

				$data = array(
					'remarks' => $this->input->post('remarks'),
					'servicecharge' => $this->input->post('servicecharge'),
					'status' => $this->input->post('status'),
					'modified_date' => $modified_date
					
				);

				$this->db->where('id', $this->input->post('id'));
				return $this->db->update('cleadscomplaints', $data);
			
			}
		}
		
		public function create_complaints(){
			date_default_timezone_set('Asia/Kolkata');
				
				$created_date= date("Y-m-d H:i:s");
				$modified_date= date("Y-m-d H:i:s");
		    	$query = $this->db->query("SET character_set_connection=utf8mb4");
				$query = $this->db->query("SET character_set_results=utf8mb4");
				$pwd="12345678";

			    $data = array(
			    	'bill_no' => $this->input->post('bill_no'),
			    	'name' => $this->input->post('name'),
			    	'user_id' => $this->input->post('user_id'),
			       	'service' => $this->input->post('service'),
			       	'servicemode' => $this->input->post('servicemode'),
			       	'remarks' => $this->input->post('remarks'),
			       	'servicecharge' => $this->input->post('servicecharge'),
					'created_date' => $created_date,
					'modified_date' => $created_date,
					'status' => 1
					   	
			);

			$this->db->insert('cleadscomplaints', $data);
		}
		//complaints


//cleads create ends 
/*cleads*/
/*SALES*/
		/*SALES BILL FOR SERVICE & COMPLAINTS*/

		public function get_cleadssalesname($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			if($slug === FALSE){

				//SELECT cleads.name,cleads.order_id,cleadssales.bill_no FROM `cleads` join cleadssales on cleadssales.order_id=cleads.order_id 
				$this->db->select('cleads.name,cleads.order_id,cleadssales.bill_no');
				$this->db->from('cleads');
				$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id');

				//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
				$this->db->order_by('cleads.order_id','desc');
				$query = $this->db->get();
				return $query->result_array();
			}

			//$query = $this->db->get_where('cleadssales', array('id' => $slug));
			//return $query->row_array();
			//return $query->result_array();

			$this->db->select('cleads.name,cleads.order_id,cleadssales.bill_no');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id');

			$this->db->get_where('cleads', array('order_id' => $slug));
				//$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			return $query->result_array();
		}

		/*SALES BILL FOR SERVICE & COMPLAINTS*/


		public function leadquotes($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			//SELECT * FROM `cleads` left join cleadssales ON cleads.order_id=cleadssales.order_id where leadstatus in ('CPO Approval Pending','Order Created') 
			$lcpoa='CPO Approval Pending';
			$lcpod='Order Created';
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, cleads.name,  cleads.username, cleads.contact, cleads.address, cleads.state, cleads.district, cleads.location, cleads.landmark, cleads.zipcode, cleads.leadstatus, cleadssales.id,cleadssales.bill_no, cleadssales.dispatch_date, cleadssales.modified_date, cleadssales.authorise');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');

			$this->db->where('cleads.leadstatus', $lcpoa);
			$this->db->or_where('cleads.leadstatus', $lcpod);

			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			return $query->result_array();
			}

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			//SELECT * FROM `cleads` left join cleadssales on cleads.order_id=cleadssales.order_id where cleads.order_id=23 

			$this->db->select('*');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleads.order_id = cleadssales.order_id','left');
			$this->db->where('cleads.order_id', $slug);
			$query = $this->db->get();
			return $query->row_array();


		}

		public function leadquotesdeatils($slug = FALSE, $limit = FALSE, $offset = FALSE){
			
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, cleads.name,  cleads.username, cleads.contact, cleads.address, cleads.state, cleads.district, cleads.location, cleads.landmark, cleads.zipcode, cleads.leadstatus, cleadssales.id,cleadssales.bill_no, cleadssales.dispatch_date, cleadssales.modified_date, cleadssales.authorise');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');

			$this->db->where('cleads.leadstatus', $lcpoa);
			$this->db->or_where('cleads.leadstatus', $lcpod);

			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			return $query->result_array();
			}

		}

		public function leadquotesdeatilsprint($slug = FALSE, $limit = FALSE, $offset = FALSE){
			
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($slug === FALSE){
			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('`id`, `order_id`, `created_at`, `modified_date`, `authorise`, `vendor_id`, `bill_no`, `qnty`, `custype`, `cusshipping`, `ordertakenby`, `entitycateg`, `entityaffili`, `salestype`, `firmname`, `firmaddress`, `dispatch_date`, `taxable_amt`, `purc_totamt`, `purc_totamtax`, `tax`, `amount`, `discount`, `grandtotal`, `packing`, `commission`, `freight`, `freighttax`, `freightot`, `cusotmcost`, `othercost`, `totdiscount`, `roudoffamt`, `netamount`, `warehouse_id`');
			$this->db->from('cleadssales');
			$this->db->where('cleadssales.order_id', $slug);
			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$query = $this->db->get();

			//echo $this->db->last_query();
			return $query->row_array();

		}

		public function cleadssalesdetails($slug = FALSE, $limit = FALSE, $offset = FALSE){
			
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($slug === FALSE){
			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('c1.`pid`, c1.`sales_id`, c1.`pro_id`, c1.`prod_name`, c1.`hsn`, c1.`bill_no`, c1.`qnty`, c1.`prodwidth`, c1.`prodheight`, c1.`prodsize`, c1.`prodsizetotal`, c1.`middle_input`, c1.`sales_rate`, c1.`purc`, c1.`tax_per`, c1.`tax_amount`, c1.`dis_per`, c1.`additional`, c1.`total_amt`, c1.`netamount`, c1.`frametype`, c1.`framecolor`,c1.`meshtype`, c1.`meshcolor`, c1.`remarks`, sum(c2.qnty) as totqnty, sum(c2.prodsizetotal) as totprodsizetotal, sum(c2.total_amt) as tottotal,sum(c2.additional) as totaddi, sum(c2.netamount) as totnet');
			$this->db->from('cleadssales_details AS c1');
			$this->db->join('cleadssales_details AS c2', 'c2.sales_id = c1.sales_id', 'left');
			
			$this->db->where('c1.sales_id', $slug);
			$this->db->group_by('c1.pid'); 
			//$this->db->limit(24);
			$query = $this->db->get();

			//echo $this->db->last_query();
			return $query->result_array();

		}
/*SALES*/
/*PURCHASE ORDERS*/

		public function showroomrfp($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			//SELECT * FROM `cleads` left join cleadssales ON cleads.order_id=cleadssales.order_id where leadstatus in ('CPO Approval Pending','Order Created') 
			$lcpoa='CPO Approval Pending';
			$lcpod='Order Created';
			$lcauth=1;
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, cleads.name,  cleads.username, cleads.contact, cleads.address, cleads.state, cleads.district, cleads.location, cleads.landmark, cleads.zipcode, cleads.leadstatus, cleadssales.id,cleadssales.bill_no, cleadssales.dispatch_date, cleadssales.modified_date, cleadssales.authorise');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');
			$where = "cleadssales.authorise=1 AND cleads.leadstatus='CPO Approval Pending'  OR cleads.leadstatus='Order Created'";

			$this->db->where($where);

			//$this->db->where('cleadssales.authorise', $lcauth);
			//$this->db->where('cleads.leadstatus', $lcpoa);
			//$this->db->or_where('cleads.leadstatus', $lcpod);

			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
			}
		}
		public function showroomrfp_process($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug == FALSE)
			{

			}
			$this->db->select('c1.`pid`, c1.`sales_id`, c1.`pro_id`, c1.`prod_name`, c1.`hsn`, c1.`bill_no`, c1.`qnty`, c1.`prodwidth`, c1.`prodheight`, c1.`prodsize`, c1.`prodsizetotal`, c1.`middle_input`, c1.`sales_rate`, c1.`purc`, c1.`tax_per`, c1.`tax_amount`, c1.`dis_per`, c1.`additional`, c1.`total_amt`, c1.`netamount`, c1.`frametype`, c1.`framecolor`,(c1.prodsizetotal)*(c1.purc) as `purctotal_amt`, (`c1`.`prodsizetotal`) * (`c1`.`purc`+(`c1`.`purc`*`c1`.`tax_per`/100)) AS purcnetamount,
				 c1.`meshtype`, c1.`meshcolor`, c1.`remarks`,sum(c2.qnty) as totqnty,sum(c2.additional) as totaddi,sum((c2.prodsizetotal)*(c2.purc)) as tottoal,sum((`c2`.`prodsizetotal`) * (`c2`.`purc`+(`c2`.`purc`*`c2`.`tax_per`/100))) as totnet');
			$this->db->from('cleadssales_details AS c1');
			$this->db->join('cleadssales_details AS c2', 'c2.bill_no = c1.bill_no', 'left');
			
			$this->db->where('c1.bill_no', $slug);
			$this->db->group_by('c1.prod_name'); 
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
		}

		public function showroomrfp_procesz($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug == FALSE)
			{

			}
			$query = $this->db->get_where('cleadssales', array('bill_no' => $slug));
			//echo $this->db->last_query();
			return $query->row_array();
		}
		public function showroomrfpw($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			//SELECT * FROM `cleads` left join cleadssales ON cleads.order_id=cleadssales.order_id where leadstatus in ('CPO Approval Pending','Order Created') 
			$lcpoa='CPO Approval Pending';
			$lcpod='Order Created';
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, cleads.name,  cleads.username, cleads.contact, cleads.address, cleads.state, cleads.district, cleads.location, cleads.landmark, cleads.zipcode, cleads.leadstatus, cleadssales.id,cleadssales.bill_no, cleadssales.dispatch_date, cleadssales.modified_date, cleadssales.authorise');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');

			$this->db->where('cleads.leadstatus', $lcpoa);
			$this->db->or_where('cleads.leadstatus', $lcpod);

			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			return $query->result_array();
			}
		}
/*PURCHASE ORDERS*/
/*ACCOUNTING*/
		public function showpurchase($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			
			$lcpoa='CPO Approval Pending';
			$lcpod='Order Created';
			$lcauth=1;
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleadssales.order_id, cleadssales.bill_no, cleadssales.created_at, cleadssales.netamount,cleadssales.purc_totamtax,vendors.name as vendorname, cleadspurcpaymentm.id,cleadspurcpaymentm.credit_amt,cleadspurcpaymentm.credit_date,cleadspurcpaymentm.paidamount,cleadspurcpaymentm.paymode,cleadspurcpaymentm.balance_amt,cleadspurcpaymentm.created_date,cleadssales.id as cleadssalesid');
			$this->db->from('cleadssales');
			$this->db->join('cleadspurcpaymentm', 'cleadspurcpaymentm.bill_no = cleadssales.bill_no', 'left');
			$where = "cleadssales.authorise=1";
			$this->db->join('vendors', 'vendors.user_id = cleadssales.vendor_id', 'left');			

			//SELECT cleadssales.order_id, cleadssales.bill_no, cleadssales.created_at, cleadssales.purc_totamtax,vendors.name as vendorname, cleadspurcpaymentm.credit_amt,cleadspurcpaymentm.credit_date,cleadspurcpaymentm.paidamount,cleadspurcpaymentm.paymode,cleadspurcpaymentm.balance_amt,cleadspurcpaymentm.created_date FROM `cleadssales` left join cleadspurcpaymentm on cleadspurcpaymentm.bill_no=cleadssales.bill_no left join vendors on vendors.user_id = cleadssales.vendor_id where cleadssales.authorise=1 


			$this->db->where($where);
			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleadssales.order_id','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
			}

		}
		
		public function viewpurchase_payments($slug1 = FALSE,$slug2 = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug1 == FALSE || $slug2 == FALSE)
			{

			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$sql='select cleadspurcpayments.`id`, cleadssales.`bill_no`,cleadssales.`order_id`, vendors.`name`, cleadspurcpayments.`paymode`,`cleadspurcpayments`.`remitbank`, cleadspurcpayments.`paidamount`, cleadspurcpayments.`remarks`, cleadspurcpayments.image, cleadspurcpayments.`created_date`, cleadspurcpayments.`modified_date`, cleadspurcpayments.`status`, (select sum(paidamount) from cleadspurcpayments WHERE bill_no=?) as totpaid, cleadssales.purc_totamtax, cleadspurcpaymentm.credit_amt, cleadspurcpaymentm.credit_date from cleadssales left join cleadspurcpayments on cleadspurcpayments.bill_no=cleadssales.bill_no join vendors on vendors.user_id=cleadssales.vendor_id left join cleadspurcpaymentm on cleadspurcpaymentm.bill_no=cleadssales.bill_no WHERE cleadssales.bill_no=?';
			
   			$query=$this->db->query($sql, array(intval($slug1),intval($slug1) ));
			//echo $this->db->last_query();
			return $query->result_array();

		}

		
		public function update_purchasepayment($post_image){

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		'paymode' => $this->input->post('paymode'),
					   		'remitbank' => $this->input->post('remitbank'),
					   		'paidamount' => $this->input->post('paidamount'), 
					   		'remarks' => $this->input->post('remarks'),
					   		'modified_date' => date("Y-m-d H:i:s"),
					   		'image'=>$post_image 
					   	);

			$totalamount=$this->input->post('netamount');
			$opaidamount=$this->input->post('opaidamount');
			$paidamount=$this->input->post('paidamount');
			$totpaidall=$this->input->post('totpaid');
			$totpaidz=round($this->input->post('totpaid') - $this->input->post('opaidamount'),2);
			$totpaid=round($this->input->post('paidamount'),2)+$totpaidz;
			$pendingamt=$totalamount-$totpaid;

			$datae = array(
							
					   		'paymode' => $this->input->post('paymode'),
					   		'paidamount' => $totpaid,
					   		'credit_amt' => $this->input->post('credit_amt'),
					   		'balance_amt' => $pendingamt, 
					   		'remarks' => $this->input->post('remarks'),
					   		'credit_date' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $this->input->post('pdate'))))
					   		
					   	);


			$this->db->where('bill_no', $this->input->post('bill_no'));
			$this->db->update('cleadspurcpaymentm', $datae);

			$this->db->where('id', $this->input->post('mpid'));
			return $this->db->update('cleadspurcpayments', $data);
			//$result=$this->db->update('products');
        	//return $result;

		}


		public function create_purchasepayment($post_image){

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		'order_id' => $this->input->post('mrpid'),
					   		'bill_no' => $this->input->post('crbill_no'),
					   		'paymode' => $this->input->post('crpaymode'),
					   		'remitbank' => $this->input->post('crremitbank'),
					   		'paidamount' => $this->input->post('crpaidamount'), 
					   		'remarks' => $this->input->post('crremarks'),
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'modified_date' => date("Y-m-d H:i:s"),
					   		'status' => 1,
					   		'image'=>$post_image 
					   	);

			//insert or update 
			$totalamount=$this->input->post('crnetamount');
			$totpaid=round($this->input->post('crtotpaid') + $this->input->post('crpaidamount'),2);
			$pendingamt=$totalamount-$totpaid;
			$pendingamte=round($totalamount-$this->input->post('crpaidamount'),2);

			$datau = array(
							
					   		'paymode' => $this->input->post('crpaymode'),
					   		'paidamount' => $totpaid,
					   		'credit_amt' => $this->input->post('crcredit_amt'),
					   		'balance_amt' => $pendingamt, 
					   		'remarks' => $this->input->post('crremarks'),
					   		'credit_date' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $this->input->post('pdatez'))))
					   		
					   	);
			$datae = array(
							
					   		'order_id' => $this->input->post('mrpid'),
					   		'bill_no' => $this->input->post('crbill_no'),
					   		'paymode' => $this->input->post('crpaymode'),
					   		'paidamount' => $this->input->post('crpaidamount'),
					   		'credit_amt' => $this->input->post('crcredit_amt'),
					   		'balance_amt' => $pendingamte,  
					   		'remarks' => $this->input->post('crremarks'),
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'credit_date' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $this->input->post('pdatez')))),
					   		'status' => 1
					   	);


			//$this->db->where('bill_no', $this->input->post('bill_no'));
			//$this->db->update('cleadspurcpaymentm', $datae);
			$result =$this->db->where('bill_no', $this->input->post('crbill_no'));
   		    $result = $this->db->get('cleadspurcpaymentm');

   				  if ($result->num_rows() == 1){
    				
      				$this->db->where('bill_no', $this->input->post('crbill_no'));
      				$this->db->update('cleadspurcpaymentm',$datau);
   					}

   					else
   					{
   						$this->db->insert('cleadspurcpaymentm',$datae);
   					}
			
			return $this->db->insert('cleadspurcpayments', $data);			

		}
		

		public function showpurchaseinvoice($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$lcpoa='CPO Approval Pending';
			$lcpod='Order Created';
			$lcauth=1;
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, cleadssales.bill_no, cleads.name, vendors.name as vendorname,cleadssales.qnty, cleads.leadstatus, cleadssales.id, cleadssales.modified_date, cleadssales.authorise,cleadspurcogbills.image,cleadspurcogbills.id',);
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');
			$where = "cleadssales.authorise=1 AND cleads.leadstatus='Order Created'";
			$this->db->join('vendors', 'vendors.user_id = cleadssales.vendor_id', 'left');
			$this->db->join('cleadspurcogbills', 'cleadspurcogbills.order_id = cleadssales.order_id', 'left');
			//$where = "cleadssales.authorise=1 AND cleads.leadstatus='CPO Approval Pending'  OR cleads.leadstatus='Order Created'";

			$this->db->where($where);


			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
			}
		}

		public function update_purcbill($post_image){

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			if($this->input->post('mpid')!="")
			{

				$data = array(
							
					   		'order_id' => $this->input->post('order_id'),
					   		'bill_no' => $this->input->post('bill_no'),
					   		'image' => $post_image,
					   		'modified_date' => date("Y-m-d H:i:s")
					   	);
				$this->db->where('id', $this->input->post('mpid'));
				return $this->db->update('cleadspurcogbills', $data);				

			}
			else
			{

				$data = array(
							
					   		'order_id' => $this->input->post('order_id'),
					   		'bill_no' => $this->input->post('bill_no'),
					   		'image' => $post_image,
					   		'modified_date' => date("Y-m-d H:i:s")
					   	);

				return $this->db->insert('cleadspurcogbills', $data);
				
			}
			
			//var_dump($data);

			//$this->db->where('id', $this->input->post('mpid'));
			//return $this->db->insert('cleadspurcogbills', $data);
			

		}

		public function showsalesinvoice($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$lcpoa='CPO Approval Pending';
			$lcpod='Order Created';
			$lcauth=1;
			if($slug === FALSE){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			$this->db->select('cleads.order_id, cleadssales.bill_no, cleads.name, vendors.name as vendorname,cleadssales.qnty, cleads.leadstatus, cleadssales.id, cleadssales.modified_date, cleadssales.authorise,cleadspurcogbills.image');
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');
			$where = "cleadssales.authorise=1 AND cleads.leadstatus='Order Created'";
			$this->db->join('vendors', 'vendors.user_id = cleadssales.vendor_id', 'left');
			$this->db->join('cleadspurcogbills', 'cleadspurcogbills.order_id = cleadssales.order_id', 'left');
			//$where = "cleadssales.authorise=1 AND cleads.leadstatus='CPO Approval Pending'  OR cleads.leadstatus='Order Created'";

			$this->db->where($where);
			//$this->db->get_where('cleads', array('leadstatus' => $lcpoa or'leadstatus' => $lcpod));
			$this->db->order_by('cleads.order_id','desc');
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();
			}
		}

		public function get_leadsfpayments($slug = FALSE){

			if($slug == FALSE)
			{

			}

			$this->db->select('cleads.name, cleads.username, cleads.address, cleads.location, cleads.landmark, cleads.district, cleads.zipcode,cleads.username, cleads.email');

			//SELECT cleads.name, cleads.username FROM `cleads` left join cleadssales on cleads.order_id = cleadssales.order_id WHERE cleadssales.bill_no='100000000001' 
			
			$this->db->from('cleads');
			$this->db->join('cleadssales', 'cleadssales.order_id = cleads.order_id', 'left');	
			$this->db->where('cleadssales.bill_no', intval($slug));
			$query = $this->db->get();
			//echo $this->db->last_query();
			return $query->result_array();

		}


		public function viewsales_payments($slug1 = FALSE,$slug2 = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug1 == FALSE || $slug2 == FALSE)
			{

			}
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");

			/*$sql='select cleadssalespayments.`id`, cleadssalespayments.`bill_no`, cleads.`name`, cleadssalespayments.`paymode`, cleadssalespayments.`paidamount`, cleadssalespayments.`remarks`, cleadssalespayments.`created_date`, cleadssalespayments.`modified_date`, cleadssalespayments.`status`, (select sum(paidamount) from cleadssalespayments WHERE bill_no=?) as totpaid, cleadssales.netamount from cleadssales left join cleadssalespayments on cleadssalespayments.bill_no=cleadssales.bill_no join cleads on cleads.order_id=cleadssales.order_id WHERE cleadssales.bill_no=?';*/

			$sql='select cleadssalespayments.`id`, cleadssalespayments.`bill_no`, cleads.`name`, cleads.`order_id`,cleads.`created_date` as leadsdate,  cleadssalespayments.`paymode`, cleadssalespayments.`paidamount`, cleadssalespayments.`remarks`, cleadssalespayments.`created_date`, cleadssalespayments.`modified_date`, cleadssalespayments.`status`, (select sum(paidamount) from cleadssalespayments WHERE bill_no=?) as totpaid, cleadssales.netamount from cleadssales left join cleadssalespayments on cleadssalespayments.bill_no=cleadssales.bill_no join cleads on cleads.order_id=cleadssales.order_id WHERE cleadssales.bill_no=?';



			
   			$query=$this->db->query($sql, array(intval($slug1),intval($slug1) ));
			//echo $this->db->last_query();
			return $query->result_array();

		}

			
		public function update_salespayment(){

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		'paymode' => $this->input->post('paymode'),
					   		'paidamount' => $this->input->post('paidamount'), 
					   		'remarks' => $this->input->post('remarks'),
					   		'modified_date' => date("Y-m-d H:i:s")
					   	);

			$this->db->where('id', $this->input->post('mpid'));
			return $this->db->update('cleadssalespayments', $data);
			//$result=$this->db->update('products');
        	//return $result;

		}
		
		public function create_salespayment(){

			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		'bill_no' => $this->input->post('crbill_no'),
					   		'paymode' => $this->input->post('crpaymode'),
					   		'paidamount' => $this->input->post('crpaidamount'), 
					   		'remarks' => $this->input->post('crremarks'),
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'modified_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);

			//var_dump($data);

			//$this->db->where('id', $this->input->post('mpid'));
			return $this->db->insert('cleadssalespayments', $data);
			//$result=$this->db->insert('cleadssalespayments', $data);
			//echo $this->db->last_query();
        	//return $result;

		}

/*ACCOUNTING*/

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