<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if (!$this->session->userdata('is_logged_in')) {

            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			You have to login first.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'User Page',
            'style' => 'dashboard/layouts/_style',
            'pages' => 'dashboard/pages/user/v_user',
            'script' => 'dashboard/layouts/_script',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('dashboard/index', $data);
    }
}
