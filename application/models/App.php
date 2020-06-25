<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function insert($table = '', $data= '')
	{
		return $this->db->insert($table, $data);
	}
	
	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		return $this->db->update($table, $data, $where);
	}
	
	function delete($table = null, $where = null) 
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
	function get_like($table = null, $field = null, $like = null)
	{
		$this->db->from($table);
		$this->db->like($field, $like, 'both');
		return $this->db->get();
	}
}