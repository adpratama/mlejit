<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_Invoice', 'M_Customer']);
		$this->load->helper(['string', 'url', 'date', 'number']);
		$this->load->library(['session', 'pagination', 'pdfgenerator']);

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
			'title' => 'Invoice',
			'style' => 'dashboard/layouts/_style',
			'pages' => 'dashboard/pages/invoice/v_invoice',
			'invoices' => $this->M_Invoice->list_invoice(),
			'script' => 'dashboard/layouts/_script',
			'customers' => $this->M_Customer->list_customer(),
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];
		$this->load->view('dashboard/index', $data);
	}

	public function add()
	{
		$customer = $this->M_Customer->show($this->input->post('customer'));
		$max_num = $this->M_Invoice->select_max();

		if (!$max_num) {
			$bilangan = 20; // Nilai Proses
		} else {
			$bilangan = $max_num['max'] + 1;
		}

		$no_inv = sprintf("%06d", $bilangan);

		$data = [
			'title' => 'Create Invoice',
			'style' => 'dashboard/layouts/_style',
			'pages' => 'dashboard/pages/invoice/v_add_invoice',
			'script' => 'dashboard/layouts/_script',
			'no_invoice' => $no_inv,
			'customers' => $this->M_Customer->list_customer(),
			'customer' => $customer,
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		$this->load->view('dashboard/index', $data);
	}

	public function store()
	{
		$menus = $this->input->post('menu');
		$qtys = $this->input->post('qty');
		$hargas = $this->input->post('harga');
		$totals = $this->input->post('total');

		$id_user = $this->session->userdata('id_user');
		$diskon = $this->input->post('diskon');
		$nominal = preg_replace('/[^a-zA-Z0-9\']/', '', $this->input->post('nominal'));
		$besaran_diskon = preg_replace('/[^a-zA-Z0-9\']/', '', $this->input->post('besaran_diskon'));
		$grandtotal = preg_replace('/[^a-zA-Z0-9\']/', '', $this->input->post('grandtotal'));

		$no_inv = $this->input->post('no_invoice');

		// Insert ke tabel invoice
		$invoice_data = [
			'no_invoice' => $no_inv,
			'tanggal_invoice' => $this->input->post('tgl_invoice'),
			'created_by' => $id_user,
			'keterangan' => $this->input->post('keterangan'),
			'id_customer' => $this->input->post('customer'),
			'subtotal' => $nominal,
			'diskon' => $diskon,
			'besaran_diskon' => $besaran_diskon,
			'total_invoice' => $grandtotal,
		];

		$id_invoice = $this->M_Invoice->insert($invoice_data);

		$detail_data = [];

		if (is_array($menus)) {
			for ($i = 0; $i < count($menus); $i++) {
				$menu = $menus[$i];
				$qty = preg_replace('/[^a-zA-Z0-9\']/', '', $qtys[$i]);
				$harga = preg_replace('/[^a-zA-Z0-9\']/', '', $hargas[$i]);
				$total = preg_replace('/[^a-zA-Z0-9\']/', '', $totals[$i]);

				$detail_data[] = [
					'id_invoice' => $id_invoice,
					'menu' => $menu,
					'qty' => $qty,
					'harga' => $harga,
					'total' => $total,
					'created_by' => $id_user
				];
			}
		}

		if (!empty($detail_data)) {
			$insert = $this->M_Invoice->insert_batch($detail_data);

			if ($insert) {
				$this->session->set_flashdata('message_name', 'The invoice has been successfully created. ' . $no_inv);
				// After that you need to used redirect function instead of load view such as 
				redirect("admin/invoice");
			}
		}
	}

	public function edit($id)
	{
		$id = $this->uri->segment(4);

		$data = [
			'title' => 'Edit Category',
			'style' => 'dashboard/layouts/_style',
			'pages' => 'dashboard/pages/category/v_add_category',
			'category' => $this->M_Invoice->detail_category($id),
			'script' => 'dashboard/layouts/_script',
			'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		];

		$this->load->view('dashboard/index', $data);
	}

	public function print($no_inv)
	{
		$inv =  $this->M_Invoice->show($no_inv);
		$data = [
			'title_pdf' => 'Invoice No. ' . $no_inv,
			'invoice' => $inv,
			'details' => $this->M_Invoice->item_list($inv['Id']),
		];

		// filename dari pdf ketika didownload
		$file_pdf = 'Invoice No. ' . $no_inv;

		// setting paper
		$paper = 'A4';

		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('dashboard/pages/invoice/v_invoice_pdf', $data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
