<?php
	class Merchants_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		/*merchants*/
		public function get_active_merchants($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_merchants.id', 'DESC');
				$this->db->where('m_merchants.status  <>',2);
				$query = $this->db->get('m_merchants');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_merchants', array('id' => $slug));
			return $query->row_array();
		}
		public function get_closed_merchants($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_merchants.id', 'DESC');
				$this->db->where('m_merchants.status  =',2);
				$query = $this->db->get('m_merchants');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_merchants', array('id' => $slug));
			return $query->row_array();
		}
		public function get_all_merchants($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_merchants.id', 'DESC');
				$query = $this->db->get('m_merchants');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_merchants', array('id' => $slug));
			return $query->row_array();
		}
			

		public function exists_in_db_pgwaystring($payoutgateway){
			$pgwaystring = random_string('alnum', 30);
			$this->db->select('id');
     		$this->db->where('payoutgateway',$payoutgateway);
     		$query = $this->db->get('m_merchants');
     		$data = $query->row();
     			if($query->num_rows() == 1) {
         			return true;
     			} else {
         			return false;
     			}
		}

		public function rand_string(){
    		//$string = substr(md5(time()), 0, 5);
    		$string = random_string('alnum', 30);
    		if($this->exists_in_db_pgwaystring($string)) {
				// check in the db if exist, call again to this function
		 		$string  = rand_string();
			}
    		return $string ;
		}
		public function create($post_image){
			$next = $this->db->query("SHOW TABLE STATUS LIKE 'm_merchants'");
			$next = $next->row(0);
			$next->Auto_increment;
			$m_id=$next->Auto_increment+100;
			$mobile_otp = mt_rand(1000,9999);
			$this->load->helper('string');
			//$payoutgateway = random_string('alnum', 30);
			$secretcode = $this->rand_string();
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
					   		'merchantid' => $m_id,
					   		'msalutation' => $this->input->post('msalutation'),
					   		'mname' => $this->input->post('mname'), 
					   		'musername' => $this->input->post('musername'),
					   		'mpassword' => hash('sha256', $this->input->post('mpassword')),
					   		'mfpassword' => $this->input->post('mpassword'),
					   		'memail' => $this->input->post('memail'),
					   		'mcontact' => $this->input->post('mcontact'),
					   		'mgender' => $this->input->post('mgender'),
					   		'mdesignation' => $this->input->post('mdesignation'),
					   		'mimstype' => $this->input->post('mimstype'),
					   		'mimsid' => $this->input->post('mimsid'),
					   		'maddress' => $this->input->post('maddress'),
					   		'mcity' => $this->input->post('mcity'),
					   		'mstate' => $this->input->post('mstate'),
					   		'mzipcode' => $this->input->post('mzipcode'),
					   		'mcountry' => $this->input->post('mcountry'),
					   		'mprofilepic' => $this->input->post('mprofilepic'),
					   		'mkyc' => $post_image,
					   		'mcurrency' => $this->input->post('mcurrency'),
					   		'mstores' => 0,
					   		'payoutgateway' => 0,
					   		'logintoapp' => 1,
					   		'email_notifications' => 1,
					   		'secretcode' => $secretcode,
					   		'mobile_otp' => $mobile_otp,
					   		'role_id' => 2,
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => $this->input->post('status')
					   	);
			//var_dump($data);
			return $this->db->insert('m_merchants', $data);
		}
		public function update($post_image){
			
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
					   		'msalutation' => $this->input->post('msalutation'),
					   		'mname' => $this->input->post('mname'), 
					   		'musername' => $this->input->post('musername'),
					   		'mpassword' => hash('sha256', $this->input->post('mpassword')),
					   		'mfpassword' => $this->input->post('mpassword'),
					   		'memail' => $this->input->post('memail'),
					   		'mcontact' => $this->input->post('mcontact'),
					   		'mgender' => $this->input->post('mgender'),
					   		'mdesignation' => $this->input->post('mdesignation'),
					   		'mimstype' => $this->input->post('mimstype'),
					   		'mimsid' => $this->input->post('mimsid'),
					   		'maddress' => $this->input->post('maddress'),
					   		'mcity' => $this->input->post('mcity'),
					   		'mstate' => $this->input->post('mstate'),
					   		'mzipcode' => $this->input->post('mzipcode'),
					   		'mcountry' => $this->input->post('mcountry'),
					   		'mprofilepic' => $this->input->post('mprofilepic'),
					   		'mkyc' => $post_image,
					   		'mcurrency' => $this->input->post('mcurrency'),
					   		'mstores' => 0,
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => $this->input->post('status')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('m_merchants', $data);
		}
		/*merchants*/
		/*merchants business profile*/
		public function getbusiness_profile($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_mbusiness.id', 'DESC');
				$query = $this->db->get('m_mbusiness');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_mbusiness', array('id' => $slug));
			return $query->row_array();
		}
		public function create_business_profile($post_image){
			
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
				'merchantid' => $this->input->post('merchantid'),
				'mname' => $this->input->post('mname'),
				'mbname' => $this->input->post('mbname'),
				'mbcategory' => $this->input->post('mbcategory'),
				'mbsubcategory' => $this->input->post('mbsubcategory'),
				'mbwebsite' => $this->input->post('mbwebsite'),
				'mbcinno' => $this->input->post('mbcinno'),
				'mbcontact' => $this->input->post('mbcontact'),
				'mbdescri' => $this->input->post('mbdescri'),
				'mbaddress' => $this->input->post('mbaddress'),
				'mbcity' => $this->input->post('mbcity'),
				'mbstate' => $this->input->post('mbstate'),
				'mbzipcode' => $this->input->post('mbzipcode'),
				'mbcountry' => $this->input->post('mbcountry'),
				'mbimstype' => $this->input->post('mbimstype'),
				'mbimsid' => $this->input->post('mbimsid'),
				'mbprofilepic' => $this->input->post('mbprofilepic'),
				'mbdocumentype' => $this->input->post('mbdocumentype'),
				'mbdocumen' => $post_image,
				'mbwirefee' => $this->input->post('mbwirefee'),
				'mbmonthlyfee' => $this->input->post('mbmonthlyfee'),
				'mbfrozenbalance' => $this->input->post('mbfrozenbalance'),
				'mbwithdraw_minamt' => $this->input->post('mbwithdraw_minamt'),
				'mbwithdraw_maxamt' => $this->input->post('mbwithdraw_maxamt'),
				'requestfunds' => $this->input->post('requestfunds'),
				'mbmoto' => $this->input->post('mbmoto'),
				'mbpayoutgateway' => $this->input->post('mbpayoutgateway'),
				'mbcreated_date' => date("Y-m-d H:i:s"),
				'mbstatus' => $this->input->post('mbstatus')
			);
			//var_dump($data);
			return $this->db->insert('m_mbusiness', $data);
		}
		public function get_merchants($id= FALSE){
			if($id=== FALSE){
			$this->db->order_by('id');
			$query = $this->db->get('m_merchants');
			return $query->result_array();
			}	
			$query = $this->db->get_where('m_merchants', array('merchantid' => $id));
			return $query->row_array();
		}
		
		/*merchants business profile*/
		


}