<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{
    var $table = 'user';

    public function registration($data)
    {
        $this->db->insert('user', $data);

        $this->session->set_flashdata('success', 'You have successfully registered. Please login!');
        redirect('auth');
    }
}
