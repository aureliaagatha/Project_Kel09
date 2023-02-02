<?php

class C_lap_beli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lap_beli');
	}

	//index
	public function index()
	{
		$data = array(
            'isi' => 'laporan/beli/v_lap_beli_filter'
        );

        $this->load->view('layout_manager/v_wrapper', $data, FALSE);
	}

	public function filter_lap_beli()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'lap_beli' => $this->m_lap_beli->get_data($bulan, $tahun),
            'isi' => 'laporan/beli/v_lap_beli'
        );

        $this->load->view('layout_manager/v_wrapper', $data, FALSE);
	}
}

?>