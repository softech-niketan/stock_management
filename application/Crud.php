<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Model
{


    public function update_data($table_name, $array, $id)
    {
        $this->db->where("id", $id);
        if ($this->db->update($table_name, $array)) {
            return true;
        } else {
            return false;
        }
    }
    public function update_data_new($table_name, $array, $id, $column_name)
    {
        $this->db->where($column_name, $id);
        if ($this->db->update($table_name, $array)) {
            return true;
        } else {
            return false;
        }
    }
    public function insert_data($table_name, $array)
    {
        if ($this->db->insert($table_name, $array)) {
            $insert_id = $this->db->insert_id();

            return  $insert_id;
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
    public function read_data($table_name)
    {
        $this->db->order_by("id", "desc");
        $query_data = $this->db->get($table_name)->result();
        if ($query_data) {
            return $query_data;
        } else {
            return false;
        }
        // $data['machine_list'] = $this->db->get("machine")->result();
    }
    public function read_data_num($table_name)
    {
        $query_data = $this->db->get($table_name)->num_rows();
        if ($query_data) {
            return $query_data;
        } else {
            return false;
        }
        // $data['machine_list'] = $this->db->get("machine")->result();
    }
    public function read_data_where($table_name, $data)
    {
        $query_data = $this->db->get_where($table_name, $data)->num_rows();
        if ($query_data) {
            return $query_data;
        } else {
            return false;
        }
    }
    public function read_data_where_result($table_name, $data)
    {
        $query_data = $this->db->get_where($table_name, $data);
        if ($query_data) {
            return $query_data;
        } else {
            return false;
        }
    }
    public function delete_data($table_name, $array)
    {
        $this->db->where($array);
        $query_delete = $this->db->delete($table_name, $array);
        if ($query_delete) {
            return true;
        } else {
            return false;
        }
    }
    public function get_data_by_id($table_name, $id, $column_name, $is_join = false)
    {
        if ($is_join === true) {
            $this->db->order_by("packing.id", "desc");
            $this->db->select('*');
            $this->db->from('packing');
            $this->db->join('parts', 'parts.id = packing.part_id');
            $this->db->where('packing.id', $id);
            $query = $this->db->get();
            if ($query) {
                return $query->result();
            }
            return false;
        }
        if ($query = $this->db->get_where($table_name, array($column_name => $id))->result()) {
            return $query;
        } else {
            return false;
        }
    }

    public function get_parts_packing_data($part_id)
    {
        $this->db->select("*");
        $this->db->from('packing');
        $this->db->join('parts', 'parts.id = packing.part_id');
        $this->db->where('packing.part_id', $part_id);
        $query = $this->db->get();
        if (is_array($query->result()) && count($query->result()) > 0) {
            return $query->result()[1];
        }
        return false;
    }




    public function get_data_by_id_multiple($table_name, $array)
    {
        $query = $this->db->get_where($table_name, $array);
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
}
