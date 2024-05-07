<?php
	class Accounts_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		/*zaffran-bank accounts*/
		public function get_zaffranbanks($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_banks.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('m_banks');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_banks', array('id' => $slug));
			return $query->row_array();
		}
		public function create($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		'ac_name' => $this->input->post('adbname'),
					   		'ac_address' => $this->input->post('adbaddress'),
					   		'ac_number' => $this->input->post('adbaccno'), 
					   		'bank_ifsc' => $this->input->post('adbaccifsc'),
					   		'bank_swiftcode' => $this->input->post('adbaccswift'),
					   		'bank_name' => $this->input->post('adbbankname'),
					   		'branch_name' => $this->input->post('adbbankaddress'),
					   		'currency' => $this->input->post('adbcurrency'),
					   		'withdrafee' => $this->input->post('adbfee'),
					   		'description' => $this->input->post('adbadditional'),
					   		'documen' => $post_image,
					   		'nickname' => $this->input->post('adbnickname'),
					   		'defaul' => $this->input->post('adbdefault'),
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);
			return $this->db->insert('m_banks', $data);
		}
		public function update($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		'ac_name' => $this->input->post('edbname'),
					   		'ac_address' => $this->input->post('edbaddress'),
					   		'ac_number' => $this->input->post('edbaccno'), 
					   		'bank_ifsc' => $this->input->post('edbaccifsc'),
					   		'bank_swiftcode' => $this->input->post('edbaccswift'),
					   		'bank_name' => $this->input->post('edbbankname'),
					   		'branch_name' => $this->input->post('edbbankaddress'),
					   		'currency' => $this->input->post('edbcurrency'),
					   		'withdrafee' => $this->input->post('edbfee'),
					   		'description' => $this->input->post('edbadditional'),
					   		'documen' => $post_image,
					   		'nickname' => $this->input->post('edbnickname'),
					   		'defaul' => $this->input->post('edbdefault'),
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);
			$this->db->where('id', $this->input->post('zedbankid'));
			return $this->db->update('m_banks', $data);
		}
		/*zaffran-bank accounts*/
		/*zaffran-crypto accounts*/
		public function get_zaffran_crypto($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_cryptos.id', 'DESC');
				$query = $this->db->get('m_cryptos');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_cryptos', array('id' => $slug));
			return $query->row_array();
		}
		public function create_zaffran_crypto($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
					   		'ac_name' => $this->input->post('adc_name'),
					   		'ac_coins' => $this->input->post('adccoins'),
					   		'ac_network' => $this->input->post('adcnetworks'), 
					   		'ac_address' => $this->input->post('adc_address'),
					   		'wallet_provider' => $this->input->post('adcwallet_provider'),
					   		'currency' => $this->input->post('adccurrency'),
					   		'withdrafee' => $this->input->post('adcfee'),
					   		'nickname' => $this->input->post('adcnickname'),
					   		'documen' => $post_image,
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);
			return $this->db->insert('m_cryptos', $data);
		}
		public function update_zaffran_crypto($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							'ac_name' => $this->input->post('edcname'),
					   		'ac_coins' => $this->input->post('edccoins'),
					   		'ac_network' => $this->input->post('edcnetworks'), 
					   		'ac_address' => $this->input->post('edcaddress'),
					   		'wallet_provider' => $this->input->post('edcwallet_provider'),
					   		'currency' => $this->input->post('edccurrency'),
					   		'withdrafee' => $this->input->post('edcfee'),
					   		'nickname' => $this->input->post('edcnickname'),
					   		'documen' => $post_image,
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);
			$this->db->where('id', $this->input->post('zedcryptoid'));
			return $this->db->update('m_cryptos', $data);
		}
		/*zaffran-crypto accounts*/
		/*zaffran-wallets accounts*/
		public function get_zaffran_wallets($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_wallets.id', 'DESC');
				$query = $this->db->get('m_wallets');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_wallets', array('id' => $slug));
			return $query->row_array();
		}
		public function create_zaffran_wallets($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
					   		'ac_name' => $this->input->post('adw_name'),
					   		'ac_network' => $this->input->post('adwnetworks'), 
					   		'ac_address' => $this->input->post('adw_address'),
					   		'wallet_provider' => $this->input->post('adwwallet_provider'),
					   		'currency' => $this->input->post('adwcurrency'),
					   		'withdrafee' => $this->input->post('adwfee'),
					   		'nickname' => $this->input->post('adwnickname'),
					   		'documen' => $post_image,
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);
			return $this->db->insert('m_wallets', $data);
		}
		public function update_zaffran_wallets($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							'ac_name' => $this->input->post('edwname'),
					   		'ac_network' => $this->input->post('edwnetwork'), 
					   		'ac_address' => $this->input->post('edwaddress'),
					   		'wallet_provider' => $this->input->post('edwwallet_provider'),
					   		'currency' => $this->input->post('edwcurrency'),
					   		'withdrafee' => $this->input->post('edwfee'),
					   		'nickname' => $this->input->post('edwnickname'),
					   		'documen' => $post_image,
					   		'created_date' => date("Y-m-d H:i:s"),
					   		'status' => 1
					   	);
			$this->db->where('id', $this->input->post('zedwalletid'));
			return $this->db->update('m_wallets', $data);
		}
		
		/*zaffran-wallets accounts*/
		/*Merchants-Bank accounts*/
		public function get_merchants_banks($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('mm_banks.id', 'DESC');
				$query = $this->db->get('mm_banks');
				return $query->result_array();
			}

			$query = $this->db->get_where('mm_banks', array('id' => $slug));
			return $query->row_array();
		}
		/*Merchants-Bank accounts*/
		/*Merchants-crypto accounts*/
		public function get_merchants_crypto($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('mm_cryptos.id', 'DESC');
				$query = $this->db->get('mm_cryptos');
				return $query->result_array();
			}

			$query = $this->db->get_where('mm_cryptos', array('id' => $slug));
			return $query->row_array();
		}
		/*Merchants-mm_crypto accounts*/
		/*Merchants-Wallet accounts*/
		public function get_merchants_wallets($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('mm_wallets.id', 'DESC');
				$query = $this->db->get('mm_wallets');
				return $query->result_array();
			}

			$query = $this->db->get_where('mm_wallets', array('id' => $slug));
			return $query->row_array();
		}
		/*Merchants-Wallet accounts*/


}