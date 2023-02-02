<?php

class C_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	//index
	public function index()
	{
		$data = array(
			'furniture' => $this->m_home->get_all_data(),
            'isi' => 'v_home'
        );

        $this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//menampilkan furniture berdasarkan kategori
	public function list_kategori($kf_id)
	{
		$data = array(
			'furniture' => $this->m_home->get_all_data_list_kategori($kf_id),
            'isi' => 'transaksi/home/v_list_kategori'
        );

        $this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//menampilkan furniture berdasarkan brand
	public function list_brand($bf_id)
	{
		$data = array(
			'furniture' => $this->m_home->get_all_data_list_brand($bf_id),
            'isi' => 'transaksi/home/v_list_brand'
        );

        $this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//menampilkan detail furniture
	public function detail_furniture($fn_id)
	{
		$data = array(
			'furniture' => $this->m_home->detail_furniture($fn_id),
            'isi' => 'transaksi/home/v_detail_furniture'
        );

        $this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//membuat akun pelanggan baru
	public function registrasi()
	{
		$kodeID = "PL";

		$this->form_validation->set_rules('pl_username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('pl_password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('pl_nama', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('pl_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('pl_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('pl_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
		//$this->form_validation->set_rules('pl_telepon', 'Telepon', array('max_length[13]' => '%s Maksimal 13 Angka!'));
		
		if ($this->form_validation->run() == TRUE) {
			$id = $this->m_home->autoID();

			$data = array(
				'pl_id'         => $kodeID.$id,
				'pl_username'   => $this->input->post('pl_username') ,
				'pl_password'   => $this->input->post('pl_password') ,
				'pl_nama'       => $this->input->post('pl_nama') ,
				'pl_telepon'    => $this->input->post('pl_telepon') ,
				'pl_email'      => $this->input->post('pl_email') ,
				'pl_alamat'     => $this->input->post('pl_alamat') ,
				'pl_status'     => 1
			);
			$this->m_home->add($data);
			//$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
			redirect('c_auth/login_pelanggan');
		}
		
		$this->load->view('transaksi/home/v_registrasi', FALSE);
	}

	//Update akun pelanggan
	public function update_akun()
	{
		$this->form_validation->set_rules('pl_username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_nama', 'Nama Pelanggan', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'pl_id'         => $this->session->userdata('pl_id'),
                'pl_username'   => $this->input->post('pl_username') ,
                'pl_password'   => $this->input->post('pl_password') ,
                'pl_nama'       => $this->input->post('pl_nama') ,
                'pl_telepon'    => $this->input->post('pl_telepon') ,
                'pl_email'      => $this->input->post('pl_email') ,
                'pl_alamat'     => $this->input->post('pl_alamat') ,
                'pl_status'     => 1
            );
            $this->m_home->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_home/update_akun');
        }

        $data = array(
            'pelanggan' => $this->m_home->get_data($this->session->userdata('pl_id')),
            'isi' => 'transaksi/home/v_update_akun'
        );

        $this->load->view('layout_home/v_wrapper', $data, FALSE);
	}
}

?>