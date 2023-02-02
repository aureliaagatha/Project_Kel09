<?php

class C_kurir extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ps_id') != 'PS00003'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
			Anda Belum Melakukan Login!
			</div>');
			redirect('c_auth/login_karyawan');
		}
		$this->load->model('m_kurir');
	}

	public function index()
	{
		$data = array(
            'isi' => 'v_kurir'
        );

        $this->load->view('layout_kurir/v_wrapper', $data, FALSE);
	}

	//data pesanan di admin
	public function pengiriman()
	{
		$data = array(
			'kirim' => $this->m_kurir->kirim(),
			'selesai' => $this->m_kurir->selesai(),
			'isi' => 'transaksi/jual/v_kurir'
		);

		$this->load->view('layout_kurir/v_wrapper', $data, FALSE);
	}

	public function selesai($tj_id)
	{
		$data = array(
			'tj_id' => $tj_id,
			'tj_status' => '5'			
		);
		$this->m_kurir->update_pengiriman($data);
		$this->session->set_flashdata('pesan', 'Pesanan Segera Dikirim !');

		redirect('c_kurir/pengiriman');
	}
}

?>