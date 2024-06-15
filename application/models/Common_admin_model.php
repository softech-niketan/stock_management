<?php

class Common_admin_model extends CI_Model
{

	//login
	public function login_user($mobile, $password)
	{

		$this->db->where(['email' => $mobile]);
		$this->db->where(['password' => $password]);
		$result = $this->db->get('user');

		if ($result->num_rows() == 1) {

			return $result->result();
		} else {
			return $result->num_rows();
		}
	}
	public function login_user_admin($mobile, $password)
	{

		$this->db->where(['user_email' => $mobile]);
		$this->db->where(['user_password' => $password]);
		$result = $this->db->get('admin_user');

		if ($result->num_rows() == 1) {

			return $result->result();
		} else {
			return $result->num_rows();
		}
	}


	public  function get_all_data($table_name)
	{
		if ($this->db->field_exists('priority', $table_name)) {
			$this->db->order_by("priority", "ASC");
		}
		if ($this->db->field_exists('deleted', $table_name)) {
			$this->db->where("deleted", 0);
		} else {
			$this->db->order_by("id", "desc");
		}

		return $this->db->get($table_name)->result();
	}
	public  function get_all_data_without_delete($table_name)
	{
		$this->db->order_by("id", "desc");

		return $this->db->get($table_name)->result();
	}
	public  function get_all_data_array($table_name)
	{
		$this->db->order_by("id", "desc");
		$this->db->where("deleted", 0);

		return $this->db->get($table_name)->result_array();
	}

	public function row_delete($column_name, $value, $table_name)
	{
		$this->db->where($column_name, $value);

		if ($this->db->delete($table_name)) {
			return true;
		} else {
			return false;
		}
	}


	public  function get_all_data_count($table_name)
	{
		$this->db->order_by("id", "desc");
		$this->db->where("deleted", 0);

		return $this->db->get($table_name)->num_rows();
	}
	public  function get_all_data_count_without_delete($table_name)
	{
		$this->db->order_by("id", "desc");

		return $this->db->get($table_name)->num_rows();
	}



	public function insert($table_name, $data)
	{
		if ($this->db->insert($table_name, $data)) {

			$insert_id = $this->db->insert_id();

			return  $insert_id;
		} else {
			return false;
		}
	}

	public function update($table_name, $data, $where_column, $where_id)
	{

		$this->db->where($where_column, $where_id);

		if ($this->db->update($table_name, $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_data_by_id_count($table_name, $id, $column_name)
	{
		if ($query = $this->db->get_where($table_name, array($column_name => $id))->num_rows()) {
			return $query;
		} else {
			return 0;
		}
	}
	// public function get_product_info_new($product_id)
	// {


	//     $this->db->select('*');
	//     $this->db->from('order_items q');
	//     $this->db->join('product p', 'q.product_id   = p.id', 'left');
	// 	$this->db->order_by('q.created_at','ASC');
	// 	$this->db->where('p.id', $product_id);

	//     $query = $this->db->get();
	//     return $query->result(); 




	// }


	public function get_product_info_new($product_id)
	{


		$this->db->select('*');
		$this->db->from('order_items q');
		$this->db->join('product p', 'q.product_id   = p.id', 'left');
		$this->db->order_by('q.created_at', 'ASC');
		$this->db->where('p.id', $product_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_data_by_id($table_name, $id, $column_name)
	{
		$this->db->order_by("id", "desc");

		if ($query = $this->db->get_where($table_name, array($column_name => $id))->result()) {
			return $query;
		} else {
			return false;
		}
	}

	public function get_data_by_idd($table_name, $id, $column_name)
	{
		if ($query = $this->db->get_where($table_name, array($column_name => $id))->result_array()) {
			return $query;
		} else {
			return false;
		}
	}

	public function get_data_by_id_multiple_condition($table_name, $array)
	{
		$this->db->order_by("id", "desc");

		if ($query = $this->db->get_where($table_name, $array)->result()) {
			return $query;
		} else {
			return false;
		}
	}

	public function get_data_by_full_outer_join($table_name1, $table_name2, $table_name1_id, $table_name2_id)
	{
		if ($query = $this->db->get_where($table_name, $array)->result()) {
			return $query;
		} else {
			return false;
		}
	}
	public function get_data_by_id_multiple_condition_count($table_name, $array)
	{
		if ($query = $this->db->get_where($table_name, $array)->num_rows()) {
			return $query;
		} else {
			return false;
		}
	}

	public function delete_user_by_id($table_name, $column_name, $id)
	{
		if ($this->db->delete($table_name, array($column_name => $id))) {
			return true;
		} else {
			return false;
		}
	}
}
