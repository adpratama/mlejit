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
        $this->load->library(['form_validation', 'Api_Whatsapp']);
        $this->load->library('pagination');
        $this->load->helper('string');
        $this->load->model('M_Villa');
        $this->load->helper('date');
        $this->load->helper('form');
    }

    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'style' => 'villa/layouts/_style',
            'pages' => 'villa/pages/home/v_home',
            'script' => 'villa/layouts/_script',
            'villas' => $this->M_Villa->list_villa()
        ];

        $this->load->view('villa/index', $data);
    }

    public function booking()
    {
        $list_villa = $this->db->get('villa_list_transaksi')->result();
        $data = [
            'title' => 'Booking Villa',
            'style' => 'layouts/_style',
            'pages' => 'villa/pages/booking/v_booking',
            'script' => 'layouts/_script',
            'list_villa' => $list_villa
        ];

        $this->load->view('villa/index-2', $data);
    }

    public function save()
    {
        $nama = $this->input->post('name');
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');
        $contact = $this->input->post('contact');
        $villa = $this->input->post('villa');
        $message = $this->input->post('message');
        $notrx = "TRXVILLA" . time();


        $this->form_validation->set_rules(
            'name',
            'name',
            'required',
            array('required' => 'Please enter your %s!')
        );
        $this->form_validation->set_rules('start_date', 'start date', 'required');
        $this->form_validation->set_rules('end_date', 'end date', 'required');
        $this->form_validation->set_rules('contact', 'contact', 'required|numeric|min_length[10]');
        $this->form_validation->set_rules('villa', 'villa', 'required');
        $this->form_validation->set_rules('message', 'message', 'required|min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Booking error!');
            $list_villa = $this->db->get('villa_list_transaksi')->result();
            $data = [
                'title' => 'Catalog',
                'style' => 'layouts/_style',
                'pages' => 'villa/pages/booking/v_booking',
                'script' => 'layouts/_script',
                'list_villa' => $list_villa
            ];

            $this->load->view('villa/index-2', $data);
        } else {
            $data = [
                'nama' => $nama,
                'start_date' => $start,
                'end_date' => $end,
                'contact' => $contact,
                'villa' => $villa,
                'message' => $message,
                'no_transaksi' => $notrx,
            ];


            $data_villa = $this->db->get_where('villa_list_transaksi', ['Id' => $villa])->row();
            $msg_admin = "*New Order*\n\n*No. Transaksi: " . $notrx . "*\n*Message: " . $message . "*\n\n" . $nama . " membooking " . $data_villa->nama . " dari " . $this->format_indo($start) . " sampai " . $this->format_indo($end) . ".\n\nMohon untuk mengkonfirmasi dengan menghubungi no berikut: *" . $contact . "*";

            $msg_user = "*Infromation*\n\nTerimakasih sudah menghubungi *Mlejit Villa*, Pesanan anda sudah masuk dengan data sebagai berikut:\n\n*No.Transaksi: " . $notrx . "*\n*Nama: " . $nama . "*\nCheckin: " . $this->format_indo($start) . "\nCheckout: " . $this->format_indo($end) . "\n\nAdmin akan segera menghubungi anda. *Mohon untuk tidak membalas pesan ini, Terimakasih.*";

            $this->db->insert('villa_transaksi', $data);
            $this->api_whatsapp->wa_notif($msg_admin, '087888000208');
            $this->api_whatsapp->wa_notif($msg_user, $contact);
            $this->session->set_flashdata('success', 'Booking success!');
            redirect('villa/booking');
        }
    }

    public function camping()
    {
        $list_camping = $this->db->get('facility_camping')->result();
        $data = [
            'title' => 'Camping',
            'style' => 'layouts/_style',
            'pages' => 'villa/pages/home/v_camping',
            'script' => 'layouts/_script',
            'list_camping' => $list_camping
        ];

        $this->load->view('villa/index-2', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'style' => 'layouts/_style',
            'pages' => 'villa/pages/home/v_contact',
            'script' => 'layouts/_script',
        ];

        $this->load->view('villa/index-2', $data);
    }
}
