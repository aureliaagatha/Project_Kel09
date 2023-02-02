<?php

class C_admin extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ps_id') != 'PS00001'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
			Anda Belum Melakukan Login!
			</div>');
			redirect('c_auth/login_karyawan');
		}

		$this->load->model('m_pesanan_masuk');
		$this->load->model('m_master_karyawan');
	}

	public function index()
	{
		$data = array(
            'isi' => 'v_admin'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
	}

	//data pesanan di admin
	public function pesanan_masuk()
	{
		$ky_nama = $this->m_pesanan_masuk->getAllKaryawan();
		$data['ky_nama'] = $ky_nama;

		$data = array(
			'karyawan' => $this->m_pesanan_masuk->get_all_data(),
			'pesanan' => $this->m_pesanan_masuk->pesanan(),
			'diproses' => $this->m_pesanan_masuk->diproses(),
			'dikirim' => $this->m_pesanan_masuk->dikirim(),
			'selesai' => $this->m_pesanan_masuk->selesai(),
			'isi' => 'transaksi/jual/v_pesanan_masuk'
		);

		$this->load->view('layout_admin/v_wrapper', $data, FALSE);
	}

	public function proses($tj_id)
	{
		$data = array(
			'tj_id' => $tj_id,
			'tj_status' => '3'			
		);
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Akan Dikemas !');

		redirect('c_admin/pesanan_masuk');
	}

	public function kirim($tj_id)
	{
		$kodeID = "RS";

		$ky_nama = $this->m_pesanan_masuk->getAllKaryawan();
		$data['ky_nama'] = $ky_nama;

		$tj_resi = $this->m_pesanan_masuk->autoID();

		$data = array(
			'tj_id' => $tj_id,
			'tj_resi' => $kodeID.$tj_resi,
			'tj_kurir' => $this->input->post('tj_kurir'),
			'tj_status' => '4'			
		);
		$this->m_pesanan_masuk->update_kirim($data);
		$this->session->set_flashdata('pesan', 'Pesanan Segera Dikirim !');

		redirect('c_admin/pesanan_masuk');
	}
}

?>