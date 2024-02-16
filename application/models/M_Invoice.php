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
        return $this->db->from('invoice a')->join('user b', 'a.created_by = b.Id', 'left')->order_by('no_invoice', 'DESC')->get()->result();
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
}
