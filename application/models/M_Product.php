<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{
	var $table = 'v_menu';
	var $column_order = array(null, 'menu_nama');
	var $column_search = array(null, 'menu_nama');
	var $order = array('id' => 'asc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) {
					$this->db->group_end();
				}
				$i++;
			}


			if (isset($_POST['order'])) // here order processing
			{
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} else if (isset($this->order)) {
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_published_count()
	{
		$query = $this->db->order_by('menu_nama', 'ASC')->get('v_menu');
		return $query->num_rows();
	}

	public function get($limit = null, $from = null)
	{
		$query = $this->db->get($this->table, $limit, $from);
		return $query->result();
	}

	public function list_product()
	{
		$query = $this->db->order_by('menu_nama', 'ASC')->get('v_menu')->result();
		return $query;
	}

	public function list_product_limit($limit, $from)
	{
		$query = $this->db->order_by('menu_nama', 'ASC')->get('v_menu', $limit, $from)->result();
		return $query;
	}

	public function add_product($data)
	{
		$this->db->select('count(menu_id) as id');
		$this->db->where('menu_seo', $data["menu_seo"]);
		$query_check = $this->db->get('menu')->row_array();

		$hasil = $query_check["id"];

		if ($hasil > 0) {
			$this->session->set_flashdata('message_name', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			The menu is already available.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('admin/product/add');
		} else {

			$config = array(
				'upload_path' => 'assets/img/menu_folder/',
				'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
				'overwrite' => TRUE,
				'max_size' => "99999999999",
				'max_height' => "800",
				'max_width' => "1500",
				'file_name' => $data["menu_foto"]
			);

			// var_dump($config);exit;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('product_photo')) {
				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				The photo has not been uploaded yet. Error message: ' . $this->upload->display_errors() . '.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				// After that you need to used redirect function instead of load view such as 
				redirect("admin/product/add", $error);
			} else {

				$this->db->insert('menu', $data);
				$this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				The menu inserted successfully.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				// After that you need to used redirect function instead of load view such as 
				redirect("admin/product/add");
			}
		}
	}

	public function update_product($data, $old_slug)
	{
		$this->db->where('menu_seo', $old_slug);
		$this->db->update('menu', $data);
		$this->session->set_flashdata('message_name', 'The menu updated successfully.');
		// After that you need to used redirect function instead of load view such as 
		redirect("admin/product");
	}

	public function best()
	{
		$query = $this->db->order_by('menu_jual', 'DESC')->order_by('menu_nama', 'ASC')->limit(3)->get('v_menu')->result();
		return $query;
	}

	public function detail_product($id)
	{
		$query = $this->db->where('menu_seo', $id)->get('v_menu')->row_array();
		return $query;
	}

	public function product_image($id_gambar)
	{
		$query = $this->db->select('menu_foto')->where('menu_id', $id_gambar)->get('v_menu')->row();
		return $query;
	}

	public function max_number()
	{
		$this->db->select_max('menu_kode');
		$query = $this->db->get('menu')->row_array();

		return $query;
	}

	public function check_qty($id)
	{
		$this->db->select('menu_jual')->where('menu_id', $id);
		$query = $this->db->get('menu')->row_array();

		return $query;
	}

	public function update_menu_jual($qty, $id)
	{
		$this->db->where('menu_id', $id);
		$query = $this->db->update('menu', $qty);

		return $query;
	}

	public function delete_product($id)
	{
		$query = $this->db->where('menu_seo', $id)->get('v_menu')->row_array();

		$foto = $query["menu_foto"];
		$path = "assets/img/menu_folder/" . $foto;
		if (file_exists($path)) {
			unlink($path);
			$this->db->where('menu_seo', $id);
			$this->db->delete('menu');
			$this->session->set_flashdata('message_name', 'dihapus');
			// After that you need to used redirect function instead of load view such as 
			redirect("admin/product");
		} else {
			echo "foto tidak ada";
		}
	}

	public function update_photo($data, $menu_seo)
	{
		$query = $this->db->where('menu_seo', $menu_seo)->get('v_menu')->row_array();

		$foto = $query["menu_foto"];
		$path = "assets/img/menu_folder/" . $foto;

		// var_dump($path);exit;

		if (file_exists($path)) {
			unlink($path);
		}

		$config = array(
			'upload_path' => 'assets/img/menu_folder/',
			'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
			'overwrite' => TRUE,
			'max_size' => "99999999999",
			'max_height' => "",
			'max_width' => "",
			'file_name' => $data["menu_foto"]
		);

		// var_dump($config);exit;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('product_photo')) {
			$error = array('error' => $this->upload->display_errors());

			$this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			The photo has not been uploaded yet.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// After that you need to used redirect function instead of load view such as 
			redirect("admin/product/edit/" . $menu_seo, $error);
		} else {
			$this->db->where('menu_seo', $menu_seo);
			$this->db->update('menu', $data);
			$this->session->set_flashdata('message_name', 'The photo has been successfully modified.');
			// After that you need to used redirect function instead of load view such as 
			redirect("admin/product/edit/" . $menu_seo);
		}
	}
}
