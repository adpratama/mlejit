<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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
        $this->load->library('pagination');
        $this->load->helper('string');
        $this->load->model('M_Villa');
        $this->load->helper('date');
    }

    public function index()
    {
        // $cart_content = $this->cart->contents();
        // $jml_item = 0;

        // foreach ($cart_content as $value) {
        //     $jml_item = $jml_item + $value['qty'];
        // }
        $data = [
            'title' => 'Home',
            'style' => 'villa/layouts/_style',
            'pages' => 'villa/pages/home/v_home',
            'script' => 'villa/layouts/_script',
            'villas' => $this->M_Villa->list_villa()
            // 'best' => $this->M_Product->best(),
            // 'testimonial' => $this->M_Home->testimonial(),
            // 'cart_content' => $cart_content,
            // 'jml_item' => $jml_item,
            // 'total' => number_format($this->cart->total())
        ];

        $this->load->view('villa/index', $data);
    }
}
