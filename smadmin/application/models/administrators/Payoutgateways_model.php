<?php
	class Payoutgateways_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		/*Payment-Gateways*/
		public function get_payoutgateways($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('m_smpayout_saltmanagement.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('m_smpayout_saltmanagement');
				return $query->result_array();
			}

			$query = $this->db->get_where('m_smpayout_saltmanagement', array('id' => $slug));
			return $query->row_array();
		}


}