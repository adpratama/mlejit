<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Villa extends CI_Model
{

    public function list_villa()
    {
        $query = $this->db->order_by('name', 'ASC')->get('villa_menu')->result();
        return $query;
    }

    public function list_floor($id)
    {
        $query = $this->db->where('menu_id', $id)->order_by('Id', 'ASC')->get('villa_floor')->result();
        return $query;
    }

    public function list_facility($id)
    {
        $query = $this->db->where('parent_id', $id)->order_by('Id', 'ASC')->limit(3)->get('villa_facility_detail')->result();
        return $query;
    }

    public function list_facility_all($id)
    {
        $query = $this->db->where('parent_id', $id)->order_by('Id', 'ASC')->get('villa_facility_detail')->result();
        return $query;
    }

    public function detail_villa($id)
    {
        $query = $this->db->where('slug', $id)->get('villa_menu')->row_array();

        return $query;
    }

    public function list_photo($id)
    {
        $query = $this->db->where('villa_id', $id)->order_by('Id', 'ASC')->get('villa_photo')->result();
        return $query;
    }
}
