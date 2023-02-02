<?php

class C_tr_beli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tr_beli');
		$this->load->model('m_master_vendor');
	}

	//index
	public function index()
	{
		$data = array(
			'furniture' => $this->m_tr_beli->get_all_data(),
            'isi' => 'transaksi/beli/v_tr_beli'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
	}

	//menampilkan detail furniture
	public function detail_furniture($fn_id)
	{
		$data = array(
			'furniture' => $this->m_tr_beli->detail_furniture($fn_id),
            'isi' => 'transaksi/beli/v_detail_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
	}

	//melihat keranjang
	public function view_keranjang()
	{
		if (empty($this->cart->contents())){
			redirect('c_tr_beli');
		}
		$data = array(
            'isi' => 'transaksi/beli/v_keranjang'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
	}

	//menambahkan furniture ke keranjang
	public function add_keranjang()
	{
		$redirect_page =  $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);
		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}

	//menghapus furniture dari keranjang
	public function delete_keranjang($rowid)
	{
		$this->cart->remove($rowid);
		redirect('c_tr_beli/view_keranjang');
	}

	//mengupdate furniture dari keranjang
	public function update_keranjang()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i.'[qty]')
			);
			$this->cart->update($data); 
			$i++;
		}
		redirect('c_tr_beli/view_keranjang');
	}

	//menghapus semua furniture dari keranjang
	public function delete_all_keranjang()
	{
		$this->cart->destroy();
		redirect('c_tr_beli');
	}

	//checkout keranjang ke database
	public function view_checkout()
	{
		// Set ddl fk dari database
		$vn_nama = $this->m_tr_beli->getAllVendor();
		$data['vn_nama'] = $vn_nama;

		$data = array(
			'vendor' => $this->m_master_vendor->get_all_data(),
			'isi' => 'transaksi/beli/v_checkout'
		);

		$this->load->view('layout_admin/v_wrapper', $data, FALSE);
	}

	//checkout keranjang ke database
	public function checkout()
	{
		$kodeID = "TB";

		// Set ddl fk dari database
		$vn_nama = $this->m_tr_beli->getAllVendor();
		$data['vn_nama'] = $vn_nama;

			$id = $this->m_tr_beli->autoID();

			//simpan ke tabel transaksi
			$data = array(
                'tb_id'         => $kodeID.$id,
                'ky_id'       	=> $this->input->post('ky_id'),
                'vn_id'       	=> $this->input->post('vn_id'),
				'tb_tanggal'    => date('Y-m-d'),
				'tb_total'     	=> $this->input->post('tb_total')
            );
			$this->m_tr_beli->simpan_transaksi($data);
			//$this->session->set_flashdata('pesan', 'Transaksi pembelian berhasil!');

			//simpan ke tabel detail transaksi
			$i = 1;
			$j = 1;
			foreach ($this->cart->contents() as $items) {
				$detail = array( 
					'tb_id'         => $kodeID.$id,
					'fn_id'         => $items['id'],
					'tb_jumlah'   	=> $this->input->post('qty'.$i++),
					'tb_subtotal'   => $this->input->post('subtotal'.$j++),
				);
				$this->m_tr_beli->stok_transaksi($detail['tb_jumlah'],$detail['fn_id']);
				$this->m_tr_beli->simpan_detail_transaksi($detail);
			}

			$this->cart->destroy();
			redirect('c_tr_beli');
	}
}

?>