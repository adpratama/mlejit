<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('string');
		$this->load->helper('url');
		$this->load->model('M_Product');
		$this->load->model('M_Category');
		$this->load->helper('date');

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
			'title' => 'Product',
			'pages' => 'dashboard/pages/products/v_product',
			'products' => $this->M_Product->list_product(),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('dashboard/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Add Product',
			'pages' => 'dashboard/pages/products/v_add_product',
			'categories' => $this->M_Category->list_category(),
			'products' => $this->M_Product->list_product(),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		if (empty($data["categories"])) {
			$this->session->set_flashdata('message_name', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Category list not available. Please add first
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
			redirect('admin/category/add');
		}

		$this->load->view('dashboard/index', $data);
	}

	public function store()
	{
		// ambil nilai menu_kode terbesar
		$query = $this->M_Product->max_number();

		$new_code = $query["menu_kode"] + 1;

		$product_name = $this->input->post('product_name');

		// pembuatan slug dari nama produk
		$out = explode(" ", $product_name);
		$slug = preg_replace("/[^A-Za-z0-9\-]/", "", strtolower(implode("-", $out)));

		$now = date('Y-m-d H:i:s');

		$old_slug = $this->uri->segment(4);

		if ($old_slug == true) {

			$data = array(
				'menu_nama' => $product_name,
				'kategori_id' => $this->input->post('product_category'),
				'menu_seo' => $slug,
				'menu_deskripsi' => $this->input->post('product_description'),
				'menu_harga' => $this->input->post('product_price'),
				'menu_update' => $now
			);

			$this->M_Product->update_product($data, $old_slug);
		} else {

			$data = array(
				'menu_nama' => $product_name,
				'kategori_id' => $this->input->post('product_category'),
				'menu_kode' => $new_code,
				'menu_seo' => $slug,
				'menu_deskripsi' => $this->input->post('product_description'),
				'menu_harga' => $this->input->post('product_price'),
				'menu_foto' => $_FILES["product_photo"]["name"],
				'menu_create' => $now
			);
			// var_dump($data);exit;

			$this->M_Product->add_product($data);
		}
	}

	public function edit($id)
	{
		$id = $this->uri->segment(4);

		$data = [
			'title' => 'Edit Product',
			'pages' => 'dashboard/pages/products/v_add_product',
			'categories' => $this->M_Category->list_category(),
			'products' => $this->M_Product->detail_product($id),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		$this->load->view('dashboard/index', $data);
	}

	public function delete($id)
	{
		$this->M_Product->delete_product($id);
	}

	public function update_photo($menu_seo)
	{

		$now = date('Y-m-d H:i:s');

		$data = array(
			'menu_foto' => $_FILES["product_photo"]["name"],
			'menu_update' => $now
		);

		// var_dump($data);exit;

		$this->M_Product->update_photo($data, $menu_seo);
	}
}
