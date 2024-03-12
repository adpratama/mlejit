<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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
			'title' => 'Settings',
			'pages' => 'dashboard/pages/setting/v_setting',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('dashboard/index', $data);
	}
}
