<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Auth');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() ==  false) {
			$data = [
				'title' => 'Login',
				'style' => 'dashboard/layouts/_style',
				'pages' => 'dashboard/pages/auth/v_login',
				'script' => 'dashboard/layouts/_script'
			];
			$this->load->view('dashboard/pages/auth/index', $data);
		} else {
			// validasinya sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			// usernya ada
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['Id'],
						'username' => $user['username'],
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'is_logged_in' => true
					];
					$this->session->set_userdata($data);

					redirect('admin/dashboard');
				} else {
					$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Wrong password.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Username has not been activated.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Username has not been registered.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'The email has already registered'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'The username has already registered'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() ==  false) {

			$data = [
				'title' => 'User Registration',
				'style' => 'dashboard/layouts/_style',
				'pages' => 'dashboard/pages/auth/v_registration',
				'script' => 'dashboard/layouts/_script'
			];

			$this->load->view('dashboard/pages/auth/index', $data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'username' => $this->input->post('username'),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => '2',
				'is_active' => '1',
				'date_created' => time()
			];

			$this->M_Auth->registration($data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		You have been logout.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
		redirect('auth');
	}
}
