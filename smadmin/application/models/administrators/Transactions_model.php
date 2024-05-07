<?php
	class Transactions_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		/*Payment-Gateways*/
		public function get_m_payin($slug1,$slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			
			if($slug === FALSE){
			    $query = $this->db->query("SET character_set_connection=utf8mb4");
			    $query = $this->db->query("SET character_set_results=utf8mb4");
				$this->db->order_by('m_payin.id', 'DESC');
				$query = $this->db->get_where('m_payin', array('source_type' => $slug1));
				//$query = $this->db->get('m_payin');
				return $query->result_array();
			}
            $query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$query = $this->db->get_where('m_payin', array('id' => $slug));
			return $query->row_array();
		}
		public function get_m_payinothers($slug1 = FALSE, $slug2 = FALSE,  $slug3 = FALSE,  $slug4 = FALSE,  $limit = FALSE, $offset = FALSE){
			$testsource='source10';
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($slug3 !== FALSE){
				$query = $this->db->query("SET character_set_connection=utf8mb4");
			    $query = $this->db->query("SET character_set_results=utf8mb4");
				$this->db->order_by('m_payin.id', 'DESC');
				$query = $this->db->get_where('m_payin', array('source_type <>' => $slug4));
				return $query->result_array();
			}
			else{
				
				if($slug1 !== FALSE && $slug2 !== FALSE && $slug4 === 'source1' ){
					$query = $this->db->query("SET character_set_connection=utf8mb4");
			        $query = $this->db->query("SET character_set_results=utf8mb4");
					// $this->db->where("m_payin.source_type <>",$slug4);
					$this->db->where("m_payin.source_type <>",$testsource);
					$this->db->where ("DATE(m_payin.created_date) <= ",$slug2);
					$this->db->where ("DATE(m_payin.created_date) >= ",$slug1);
					$query = $this->db->get('m_payin');
					/*var_dump($this->db ->last_query());
					exit();*/
					return $query->result_array();
				}
				elseif($slug1 === FALSE && $slug2 === FALSE && $slug4 === 'source1' ){
					$query = $this->db->query("SET character_set_connection=utf8mb4");
			        $query = $this->db->query("SET character_set_results=utf8mb4");
					date_default_timezone_set('Asia/Phnom_Penh');
					$slugz1 = date("Y-m-d");
					$slugz2 = $slugz1;
					// $this->db->where("m_payin.source_type <>",$slug4);
					$this->db->where("m_payin.source_type <>",$testsource);
					$this->db->where ("DATE(m_payin.created_date) <= ",$slugz2);
					$this->db->where ("DATE(m_payin.created_date) >= ",$slugz1);
					$query = $this->db->get('m_payin');
					return $query->result_array();
				}
				
				else{
                    $query = $this->db->query("SET character_set_connection=utf8mb4");
			        $query = $this->db->query("SET character_set_results=utf8mb4");
					date_default_timezone_set('Asia/Phnom_Penh');
					$slugz1 = date("Y-m-d");
					$slugz2 = $slugz1;
					// $this->db->where("m_payin.source_type <>",$slug4);
					$this->db->where("m_payin.source_type <>",$testsource);
					$this->db->where ("DATE(m_payin.created_date) <= ",$slugz2);
					$this->db->where ("DATE(m_payin.created_date) >= ",$slugz1);
					$query = $this->db->get('m_payin');
					return $query->result_array();
				}
			}
            $query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$query = $this->db->get_where('m_payin', array('id' => $slug3));
			return $query->row_array();
		}


		public function get_m_cashcounts($slug1 = FALSE, $slug2 = FALSE,  $slug3 = FALSE,  $slug4 = FALSE,  $limit = FALSE, $offset = FALSE){

			$testsource='source4';
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug3 !== FALSE){
					
                $query = $this->db->query("SET character_set_connection=utf8mb4");
			    $query = $this->db->query("SET character_set_results=utf8mb4");
				//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
				$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
				$this->db->from('m_payin');
				$this->db->where('source_type', 'source2');
				$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
				$this->db->where('vstore_id', 'GZ-108');
				$query1 = $this->db->get_compiled_select();
				$this->db->reset_query();

				//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
				$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
				$this->db->from('m_payin');
				$this->db->where('source_type', 'source2');
				$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
				$this->db->where('vstore_id', 'GZ-108');
				$query2 = $this->db->get_compiled_select();
				$this->db->reset_query();

				//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
				$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
				$this->db->from('m_payout');
				$this->db->where('source_type', 'psource1');
				$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
				$this->db->where('vstore_id', 'GZ-108');
				$query3 = $this->db->get_compiled_select();
				$this->db->reset_query();

				//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
				$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
				$this->db->from('m_payout');
				$this->db->where('source_type', 'psource1');
				//$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
				$this->db->where_in('trim(orderstatus)', array('Rejected','Cancelld'));
				$this->db->where('vstore_id', 'GZ-108');
				$query4 = $this->db->get_compiled_select();
				$this->db->reset_query();

				$query = $this->db->query($query1 . ' UNION ' . $query2. ' UNION ' . $query3. ' UNION ' . $query4);
				return $query->result_array();
				/*print_r($this->db ->last_query());
				exit();*/

			}
			else{
				
				if($slug1 !== FALSE && $slug2 !== FALSE && $slug4 === 'source1' ){
					$query = $this->db->query("SET character_set_connection=utf8mb4");
			        $query = $this->db->query("SET character_set_results=utf8mb4");
					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payin');
					$this->db->where('source_type', 'source2');
					$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slug2);
					$this->db->where ("DATE(created_date) >= ",$slug1);
					$query1 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payin');
					$this->db->where('source_type', 'source2');
					$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slug2);
					$this->db->where ("DATE(created_date) >= ",$slug1);
					$query2 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payout');
					$this->db->where('source_type', 'psource1');
					$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slug2);
					$this->db->where ("DATE(created_date) >= ",$slug1);
					$query3 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payout');
					$this->db->where('source_type', 'psource1');
					//$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
					$this->db->where_in('trim(orderstatus)', array('Rejected','Cancelld'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slug2);
					$this->db->where ("DATE(created_date) >= ",$slug1);
					$query4 = $this->db->get_compiled_select();
					$this->db->reset_query();

					$query = $this->db->query($query1 . ' UNION ' . $query2. ' UNION ' . $query3. ' UNION ' . $query4);
					return $query->result_array();
				}
				elseif($slug1 === FALSE && $slug2 === FALSE && $slug4 === 'source1' ){
					$query = $this->db->query("SET character_set_connection=utf8mb4");
			        $query = $this->db->query("SET character_set_results=utf8mb4");
					date_default_timezone_set('Asia/Phnom_Penh');
					$slugz1 = date("Y-m-d");
					$slugz2 = $slugz1;/*
					$this->db->where("m_payin.source_type <>",$slug4);
					$this->db->where("m_payin.source_type <>",$testsource);
					$this->db->where ("DATE(m_payin.created_date) <= ",$slugz2);
					$this->db->where ("DATE(m_payin.created_date) >= ",$slugz1);
					$query = $this->db->get('m_payin');
					return $query->result_array();*/
					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payin');
					$this->db->where('source_type', 'source2');
					$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query1 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payin');
					$this->db->where('source_type', 'source2');
					$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query2 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payout');
					$this->db->where('source_type', 'psource1');
					$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query3 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payout');
					$this->db->where('source_type', 'psource1');
					//$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
					$this->db->where_in('trim(orderstatus)', array('Rejected','Cancelld'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query4 = $this->db->get_compiled_select();
					$this->db->reset_query();

					$query = $this->db->query($query1 . ' UNION ' . $query2. ' UNION ' . $query3. ' UNION ' . $query4);
					return $query->result_array();
					/*print_r($this->db ->last_query());
					exit();*/
				}
				else {
					$query = $this->db->query("SET character_set_connection=utf8mb4");
			        $query = $this->db->query("SET character_set_results=utf8mb4");
					date_default_timezone_set('Asia/Phnom_Penh');
					$slugz1 = date("Y-m-d");
					$slugz2 = $slugz1;
					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payin');
					$this->db->where('source_type', 'source2');
					$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query1 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payin');
					$this->db->where('source_type', 'source2');
					$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query2 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payout');
					$this->db->where('source_type', 'psource1');
					$this->db->where_in('trim(orderstatus)', array('Approved','Success'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query3 = $this->db->get_compiled_select();
					$this->db->reset_query();

					//$this->db->select('SUM(price) as totpricee, COUNT(id) as totcount');
					$this->db->select('COALESCE(SUM(price), 0) as totprice, COALESCE(COUNT(id), 0) as totcount');
					//$this->db->select('COALESCE(SUM(price), 0) as totpricee,COALESCE(COUNT(id), 0) as totcount');
					$this->db->from('m_payout');
					$this->db->where('source_type', 'psource1');
					//$this->db->where_in('trim(orderstatus)', array('pending','Pending'));
					$this->db->where_in('trim(orderstatus)', array('Rejected','Cancelld'));
					$this->db->where('vstore_id', 'GZ-108');
					$this->db->where ("DATE(created_date) <= ",$slugz2);
					$this->db->where ("DATE(created_date) >= ",$slugz1);
					$query4 = $this->db->get_compiled_select();
					$this->db->reset_query();

					$query = $this->db->query($query1 . ' UNION ' . $query2. ' UNION ' . $query3. ' UNION ' . $query4);
					/*var_dump($this->db ->last_query());
					exit();*/
					return $query->result_array();
					

				}
				
			}

		}

		public function get_m_payinotherz($slug1,$slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			    $query = $this->db->query("SET character_set_connection=utf8mb4");
			    $query = $this->db->query("SET character_set_results=utf8mb4");
				$this->db->order_by('m_payin.id', 'DESC');
				$query = $this->db->get_where('m_payin', array('source_type <>' => $slug1));
				//$query = $this->db->where_not_in(array('source_type' => $slug1));
				//var_dump($query);
				/*var_dump($this->db ->last_query());
				exit();*/
				return $query->result_array();
			}
            $query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$query = $this->db->get_where('m_payin', array('id' => $slug));
			return $query->row_array();
		}
		
		public function get_m_payout_others($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
			    $query = $this->db->query("SET character_set_connection=utf8mb4");
			    $query = $this->db->query("SET character_set_results=utf8mb4");
				$this->db->order_by('m_payout.id', 'DESC');
				$query = $this->db->get_where('m_payout');
				//$query = $this->db->get('m_payin');
				return $query->result_array();
			}
            $query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			$query = $this->db->get_where('m_payout', array('id' => $slug));
			return $query->row_array();
		}
		
		/*update_trnz*/
		public function update_trnz($post_image){
			$query = $this->db->query("SET character_set_connection=utf8mb4");
			$query = $this->db->query("SET character_set_results=utf8mb4");
			date_default_timezone_set('Asia/Kolkata');
			$data = array(
							
					   		/*'documen' => $post_image*/
					   		'documen' => $post_image,
					   		'orderstatus' => "Approved"
					   	);
			$this->db->where('id', $this->input->post('zedtrnzid'));
			return $this->db->update('m_payin', $data);
		}



}