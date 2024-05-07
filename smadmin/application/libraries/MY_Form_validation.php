<?php
class MY_Form_validation extends CI_Form_validation
{

	public function edit_unique($str, $field)
    {
		$this->set_message('edit_unique', "This %s is already in use!");
        sscanf($field, '%[^.].%[^.].%[^.].%[^.]', $table, $field, $columnIdName, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, $columnIdName .'!=' => $id))->num_rows() === 0)
            : FALSE;
    }

}
?>