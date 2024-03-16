<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Invoice extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list_invoice()
    {
        return $this->db->from('invoice a')->join('user b', 'a.created_by = b.Id', 'left')->join('customer c', 'a.id_customer = c.id', 'left')->order_by('no_invoice', 'DESC')->get()->result();
    }

    public function select_max()
    {
        return $this->db->select('max(no_invoice) as max')->get('invoice')->row_array();
    }

    public function insert($invoice_data)
    {
        $this->db->insert('invoice', $invoice_data);

        // Dapatkan ID invoice yang baru saja di-generate
        return $this->db->insert_id();
    }

    public function insert_batch($detail_data)
    {
        return $this->db->insert_batch('invoice_details', $detail_data);
    }

    public function show($no_inv)
    {
        return $this->db->from('invoice a')->join('customer b', 'a.id_customer = b.id', 'left')->where('no_invoice', $no_inv)->get()->row_array();
    }

    public function item_list($id)
    {
        return $this->db->where('id_invoice', $id)->get('invoice_details')->result();
    }

    public function report($from, $to)
    {
        return $this->db->from('invoice a')->join('customer b', 'a.id_customer = b.id', 'left')->where('tanggal_invoice >=', $from)->where('tanggal_invoice <=', $to)->get()->result();
    }

    public function delete_detail($id)
    {
        return $this->db->where('Id', $id)->delete('invoice_details');
    }

    public function update_item($id, $data)
    {
        return $this->db->where('Id', $id)->update('invoice_details', $data);
    }

    public function update_invoice($id_invoice, $data)
    {
        return $this->db->where('Id', $id_invoice)->update('invoice', $data);
    }

    public function get_discount($id)
    {
        return $this->db->select('diskon')->where('Id', $id)->get('invoice')->row_array();
    }

    public function sum_total($id_invoice)
    {
        return $this->db->select_sum('total')->where('id_invoice', $id_invoice)->get('invoice_details')->row_array();
    }
}
