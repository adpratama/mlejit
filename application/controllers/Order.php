<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('Api_Whatsapp');
        $this->load->helper('string');
        $this->load->model('M_Order');
        $this->load->model('M_Product');
        $this->load->helper('date');
        $this->load->helper('form');
    }

    public function index()
    {
        $cart_content = $this->cart->contents();

        if (empty($cart_content)) {
            redirect('home');
        }

        $jml_item = 0;

        foreach ($cart_content as $key => $value) {
            $jml_item = $jml_item + $value['qty'];
        }

        $subtotal = $this->cart->total();
        $ppn = $subtotal * 0.1;
        $grandtotal = $subtotal + $ppn;

        $data = [
            'title' => 'Cart',
            'style' => 'layouts/_style',
            'pages' => 'pages/order/v_cart',
            'script' => 'layouts/_script',
            'cart_content' => $cart_content,
            'jml_item' => $jml_item,
            'subtotal' => $subtotal,
            'total' => number_format($subtotal),
            'ppn' => $ppn,
            'grandtotal' => $grandtotal
        ];

        $this->load->view('index', $data);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');

        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name')
        );

        $this->M_Order->add($data);

        $this->session->set_flashdata('success', 'Added successfully');
        redirect($redirect_page, 'refresh');
    }

    public function update()
    {
        $items = $this->cart->contents();
        $i = 1;
        foreach ($items as $item) {
            $data = array(
                'rowid' => $item['rowid'],
                'qty' => $this->input->post($i . '[qty]')
            );

            $this->cart->update($data);
            $i++;
        }

        redirect('order');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('order');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('order');
    }

    public function checkout()
    {
        $cart_content = $this->cart->contents();

        if (empty($cart_content)) {
            redirect('home');
        }

        $jml_item = 0;

        foreach ($cart_content as $key => $value) {
            $jml_item = $jml_item + $value['qty'];
        }

        $subtotal = $this->cart->total();
        $ppn = $subtotal * 0.1;
        $grandtotal = $subtotal + $ppn;

        $data = [
            'title' => 'Cart',
            'style' => 'layouts/_style',
            'pages' => 'pages/order/v_checkout',
            'script' => 'layouts/_script',
            'cart_content' => $cart_content,
            'jml_item' => $jml_item,
            'subtotal' => $subtotal,
            'total' => number_format($subtotal, 2, ',', '.'),
            'ppn' => number_format($ppn, 2, ',', '.'),
            'grandtotal' => number_format($grandtotal, 2, ',', '.')
        ];

        $this->load->view('index', $data);
    }

    public function send_order()
    {
        // ambil nilai menu_kode terbesar
        $query = $this->M_Order->max_number();

        $new_code = $query["no_invoice"] + 1;

        $cart = $this->cart->contents();

        $subtotal = $this->cart->total();

        $total_item  = $this->cart->total_items();
        $ppn = $subtotal * 0.1;
        $total = $subtotal + $ppn;

        $now = date('Y-m-d H:i:s');

        $data = array(
            'no_invoice' => $new_code,
            'nama_pemesan' => $this->input->post('nama'),
            'email_pemesan' => $this->input->post('email'),
            'alamat_pemesan' => $this->input->post('address'),
            'telepon_pemesan' => $this->input->post('phone'),
            'notes' => $this->input->post('notes'),
            'total_item' => $total_item,
            'subtotal' => $subtotal,
            'ppn' => $ppn,
            'grand_total' => $total,
            'order_time' => $now
        );

        $this->M_Order->add_transaction($data);

        $no = 1;
        foreach ($cart as $c) {
            // ambil menu_jual sebelumnya sesuai id product
            $item_jual = $this->M_Product->check_qty($c['id']);

            // tambahkan menu_jual sebelumnya dengan qty yang dipesan
            $new_qty = $item_jual['menu_jual'] + $c['qty'];

            $update_qty = array(
                'menu_jual' => $new_qty
            );

            $this->M_Product->update_menu_jual($update_qty, $c['id']);
            
            $a[] = $no . '. ' . $c['qty'] . ' ' . $c['name'] . ' @ Rp' . number_format($c['price']) . ',- : Rp' . number_format($c['subtotal']) . ',-';
            $no++;
            $b = array(
                'id_transaction' => $new_code,
                'id_product' => $c["id"],
                'jumlah' => $c["qty"],
                'harga_satuan' => $c["price"],
                'subtotal' => $c["subtotal"],
                'created_at' => $now,
            );
            $this->M_Order->add_transaction_detail($b);
        }
        
        $b = implode('%0a', $a);

        $no_whatsapp = "08170107303";
        $no_whatsapp2 = "085240719210";
        $wa_pemesan = $data["telepon_pemesan"];

        // message with PPN 10%
        // $msg = '*New Order* %0aNama pemesan: ' . $data['nama_pemesan'] . '%0aEmail: ' . $data['email_pemesan'] . '%0aAlamat: ' . $data['alamat_pemesan'] . '%0aPhone: ' . $data['telepon_pemesan'] . '%0aNotes: ' . $data['notes'] . '%0a%0aPesanan: %0a' . $b . '%0a%0aSubotal: Rp' . number_format($subtotal) . ',-' . '%0a%0aPPn 10%: Rp' . number_format($ppn) . ',-' . '%0a%0a*Total: Rp' . number_format($total) . ',-*';
        
        // $msg2 = 'Halo, kak *' . $data['nama_pemesan'] . '*. Terima kasih sudah order ke Mlejit. Ini daftar pesanan yang Kamu buat:%0a%0aPesanan: %0a' . $b . '%0a%0aSubotal: Rp' . number_format($subtotal) . ',-' . '%0a%0aPPn 10%: Rp' . number_format($ppn) . ',-' . '%0a%0a*Total: Rp' . number_format($total) . ',-*' . '*%0a%0aNotes: ' . $data['notes'] . '%0a%0aPesanan akan segera datang. Mohon ditunggu ya.';

        $msg = '*New Order* %0aNama pemesan: ' . $data['nama_pemesan'] . '%0aEmail: ' . $data['email_pemesan'] . '%0aAlamat: ' . $data['alamat_pemesan'] . '%0aPhone: ' . $data['telepon_pemesan'] . '%0aNotes: ' . $data['notes'] . '%0a%0aPesanan: %0a' . $b . '%0a%0a*Subtotal: Rp' . number_format($subtotal) . ',-*';

        $msg2 = 'Halo, kak *' . $data['nama_pemesan'] . '*. Terima kasih sudah order ke Mlejit. Ini daftar pesanan yang Kamu buat:%0a%0aPesanan: %0a' . $b . '%0a%0a*Subtotal: Rp' . number_format($subtotal) . ',-*' . '*%0a%0aNotes: ' . $data['notes'] . '%0a%0aPesanan akan segera datang. Mohon ditunggu ya.';

        $this->api_whatsapp->wa_notif($msg, $no_whatsapp);
        $this->api_whatsapp->wa_notif($msg, $no_whatsapp2);
        $this->api_whatsapp->wa_notif($msg2, $wa_pemesan);

        $this->cart->destroy();
        redirect('order');
    }
}
