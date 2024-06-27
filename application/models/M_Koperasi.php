<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Koperasi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list_invoice()
    {
        return $this->db->from('invoice_koperasi a')->join('user b', 'a.created_by = b.Id', 'left')->join('customer_koperasi c', 'a.id_customer = c.id', 'left')->order_by('no_invoice', 'DESC')->get()->result();
    }

    public function select_max()
    {
        return $this->db->select('max(no_invoice) as max')->get('invoice_koperasi')->row_array();
    }

    public function insert($invoice_data)
    {
        $this->db->insert('invoice_koperasi', $invoice_data);

        // Dapatkan ID invoice yang baru saja di-generate
        return $this->db->insert_id();
    }

    public function insert_batch($detail_data)
    {
        return $this->db->insert_batch('invoice_koperasi_details', $detail_data);
    }

    public function show($no_inv)
    {
        return $this->db->from('invoice_koperasi a')->join('customer_koperasi b', 'a.id_customer = b.id', 'left')->where('no_invoice', $no_inv)->get()->row_array();
    }

    public function item_list($id)
    {
        return $this->db->where('id_invoice', $id)->get('invoice_koperasi_details')->result();
    }

    public function report($from, $to)
    {
        return $this->db->from('invoice_koperasi a')->join('customer_koperasi b', 'a.id_customer = b.id', 'left')->where('tanggal_invoice >=', $from)->where('tanggal_invoice <=', $to)->get()->result();
    }

    public function delete_detail($id)
    {
        return $this->db->where('Id', $id)->delete('invoice_koperasi_details');
    }

    public function update_item($id, $data)
    {
        return $this->db->where('Id', $id)->update('invoice_koperasi_details', $data);
    }

    public function update_invoice($id_invoice, $data)
    {
        return $this->db->where('Id', $id_invoice)->update('invoice_koperasi', $data);
    }

    public function get_discount($id)
    {
        return $this->db->select('diskon')->where('Id', $id)->get('invoice_koperasi')->row_array();
    }

    public function sum_total($id_invoice)
    {
        return $this->db->select_sum('total')->where('id_invoice', $id_invoice)->get('invoice_koperasi_details')->row_array();
    }

    // Part Customer
    public function list_customer()
    {
        return $this->db->order_by('nama_customer', 'ASC')->get('customer_koperasi')->result();
    }

    public function insert_customer($data)
    {
        return $this->db->insert('customer_koperasi', $data);
    }

    public function update_customer($data, $old_slug)
    {
        $this->db->where('slug', $old_slug);
        return $this->db->update('customer_koperasi', $data);
    }

    public function show_customer($id)
    {
        return $this->db->where('slug', $id)->get('customer_koperasi')->row_array();
    }

    public function is_available_customer($id)
    {
        return $this->db->where('slug', $id)->get('customer_koperasi')->num_rows();
    }
}
