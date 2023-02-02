<?php

class C_manager extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ps_id') != 'PS00002'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
			Anda Belum Melakukan Login!
			</div>');
			redirect('c_auth/login_karyawan');
		}
	}

	public function index()
	{
		$data = array(
            'isi' => 'v_manager'
        );

        $this->load->view('layout_manager/v_wrapper', $data, FALSE);
	}
}

?>