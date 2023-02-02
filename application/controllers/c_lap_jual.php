<?php

class C_lap_jual extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lap_jual');
	}

	//index
	public function index()
	{
		$data = array(
            'isi' => 'laporan/jual/v_lap_jual_filter'
        );

        $this->load->view('layout_manager/v_wrapper', $data, FALSE);
	}

	public function filter_lap_jual()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'lap_jual' => $this->m_lap_jual->get_data($bulan, $tahun),
            'isi' => 'laporan/jual/v_lap_jual'
        );

        $this->load->view('layout_manager/v_wrapper', $data, FALSE);
	}
}

?>