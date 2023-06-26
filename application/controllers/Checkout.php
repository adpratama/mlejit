<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->model('M_Home');
		$this->load->model('M_Product');
		$this->load->helper('date');
	}
	public function index()
	{
		$data = [
			'title' => 'Home',
			'style' => 'layouts/_style',
			'pages' => 'pages/home/v_home',
			'script' => 'layouts/_script',
            'best' => $this->M_Product->best()
			// 'best' => $this->db->order_by('menu_jual', 'DESC')->order_by('menu_nama', 'ASC')->limit(3)->get('v_menu')->result()
		];

		$this->load->view('index', $data);
	}

    public function send()
    {
        $cart = $this->cart->contents();

        $data = array(
            'nama'      => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'address'   => $this->input->post('address'),
            'phone'     => $this->input->post('phone'),
            'bill'      => $this->input->post('bill'),
        );

        foreach ($cart as $c) {
            $a[] = $c['qty'] . ' ' . $c['name'];
        }

        $subtotal = $this->cart->total();
        $ppn = $subtotal * 0.1;
        $total = $subtotal + $ppn;
        $b = json_encode($a, true);

        $no_whatsapp = "085240719210";

        $msg = '*New Order* <br> Nama pemesan: ' . $data['nama'] . '<br> Email: ' . $data['email'] . '<br> Alamat: ' . $data['address'] . '<br> Phone: ' . $data['phone'] . '<br> Notes: ' . $data['bill'] . '<br><br> Pesanan: <br>' . $b . '<br><br>Subtotal: Rp' . number_format($subtotal, 2, ',', '.') . '<br><br>PPn 10%: Rp' . number_format($ppn, 2, ',', '.') . '<br><br>Total: Rp*' . number_format($total, 2, ',', '.') . '*';

        $this->api_whatsapp->wa_notif($msg,$no_whatsapp);

        print_r($msg);
        exit;
    }
}
