<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Order extends CI_Model
{
	public function add($data)
	{
		$query = $this->cart->insert($data);;

		return $query;
	}

	public function max_number()
	{		
		$this->db->select_max('no_invoice');
		$query = $this->db->get('transaction')->row_array();

		return $query;
	}

	public function add_transaction($data)
	{
		$query = $this->db->insert('transaction', $data);

		return $query;
	}

	public function add_transaction_detail($b)
	{
		$query = $this->db->insert('transaction_detail', $b);

		return $query;
	}
}
