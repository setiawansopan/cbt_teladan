<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_mod extends CI_Model {
	//navigasi
	public function nav($tabel, $where, $order)
	{
		return $this->db->select('*')
				->from($tabel)
				->where($where)
				->order_by($order)
				->limit('1')
				->get();
	}
	//select where custom query
	public function select_where($query, $tabel, $where)
	{
		return $this->db->select($query)
				->from($tabel)
				->where($where)
				->get();
	}
	//select order by dan group by
	public function select_og($tabel, $query, $order, $group)
	{
		return $this->db->select($query)
				->from($tabel)
				->order_by($order)
				->group_by($group)
				->get();
	}
	//select order by
	public function select_order($tabel, $query, $order)
	{
		return $this->db->select($query)
				->from($tabel)
				->order_by($order)
				->get();
	}
	//select limit order
	public function select_limit_order($tabel, $query, $limit, $order)
	{
		return $this->db->select($query)
				->from($tabel)
				->limit($limit)
				->order_by($order)
				->get();
	}
	//select order by where
	public function select_ow($tabel, $order, $where)
	{
		return $this->db->select('*')
				->from($tabel)
				->order_by($order)
				->where($where)
				->get();
	}

	public function select_ow2($tabel, $query, $order, $where)
	{
		return $this->db->select($query)
				->from($tabel)
				->order_by($order)
				->where($where)
				->get();
	}
	//select group by
	public function select_gw($tabel, $query, $where, $group)
	{
		return $this->db->select($query)
				->from($tabel)
				->where($where)
				->group_by($group)
				->get();
	}
	//select group by
	public function select_group($tabel, $query, $group)
	{
		return $this->db->select($query)
				->from($tabel)
				->group_by($group)
				->get();
	}
	//like data
	public function select_like($tabel, $array)
	{
		return $this->db->like($array)->get($tabel);
	}
	public function select_or_like($tabel, $array)
	{
		return $this->db->or_like($array)->get($tabel);
	}
	public function select_not_like($tabel, $array)
	{
		return $this->db->not_like($array)->get($tabel);
	}
	public function select_or_not_like($tabel, $array)
	{
		return $this->db->or_not_like($array)->get($tabel);
	}

	//select all data
	public function get_all($tabel)
	{
		return $this->db->get($tabel);
	}
	//select where data
	public function get_where($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);
	}
	//select where limit
	public function get_wl($tabel, $where, $limit)
	{
		return $this->db->get_where($tabel, $where, $limit);
	}
	//select where limit
	public function get_limit($tabel, $limit)
	{
		return $this->db->get_where($tabel, $limit);
	}
	//having data
	public function get_having($tabel, $data)
	{
		return $this->db->having($data)->get($tabel);
	}
	// or having
	public function get_or_having($tabel, $data)
	{
		return $this->db->or_having($data)->get($tabel);
	}
	//insert data
	public function insert($tabel, $data)
	{
		return $this->db->insert($tabel, $data);
	}
	//insert batch data
	public function insert_batch($tabel, $data)
	{
		return $this->db->insert_batch($tabel, $data);
	}
	//update data
	public function update($tabel, $where, $data)
	{
		return $this->db->where($where)->update($tabel, $data);
	}
	//delete data
	public function delete($tabel, $where)
	{
		return $this->db->where($where)->delete($tabel);
	}
}
