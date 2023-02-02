<?php

class C_tr_jual extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tr_jual');
	}

	//index
	public function index()
	{
		$data = array(
            'isi' => 'c_home'
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

	//melihat keranjang
	public function view_keranjang()
	{
		if (empty($this->cart->contents())){
			redirect('c_home');
		}
		$data = array(
            'isi' => 'transaksi/jual/v_keranjang'
        );

        $this->load->view('layout_home/v_wrapper', $data, FALSE);
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
		redirect('c_tr_jual/view_keranjang');
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
		redirect('c_tr_jual/view_keranjang');
	}

	//menghapus semua furniture dari keranjang
	public function delete_all_keranjang()
	{
		$this->cart->destroy();
		redirect('c_tr_jual/view_keranjang');
	}

	//checkout keranjang ke database
	public function view_checkout()
	{
		$data = array(
			'isi' => 'transaksi/jual/v_checkout'
		);

		$this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//checkout keranjang ke database
	public function checkout()
	{
		$kodeID = "TJ";

			$id = $this->m_tr_jual->autoID();

			//simpan ke tabel transaksi
			$data = array(
                'tj_id'         => $kodeID.$id,
                'pl_id'       	=> $this->input->post('pl_id'),
				'tj_tanggal'    => date('Y-m-d'),
				'tj_nama'     	=> $this->input->post('tj_nama'),
				'tj_alamat'     => $this->input->post('tj_alamat'),
				'tj_jarak'     	=> '0',
				'tj_ongkir'     => '0',
				'tj_telepon'    => $this->input->post('tj_telepon'),
				'tj_status'     => '1',
				'tj_total'     	=> $this->input->post('tj_total')
            );
			$this->m_tr_jual->simpan_transaksi($data);
			//$this->session->set_flashdata('pesan', 'Transaksi penjualan berhasil!');

			//simpan ke tabel detail transaksi
			$i = 1;
			$j = 1;
			foreach ($this->cart->contents() as $items) {
				$detail = array( 
					'tj_id'         => $kodeID.$id,
					'fn_id'         => $items['id'],
					'tj_jumlah'   	=> $this->input->post('qty'.$i++),
					'tj_subtotal'   => $this->input->post('subtotal'.$j++)
				);
				$this->m_tr_jual->stok_transaksi($detail['tj_jumlah'],$detail['fn_id']);
				$this->m_tr_jual->simpan_detail_transaksi($detail);
			}

			$this->cart->destroy();
			redirect('c_tr_jual/daftar_transaksi');
	}

	//data transaksi di pelanggan
	public function daftar_transaksi()
	{
		$data = array(
			'belumbayar' => $this->m_tr_jual->cust_belumbayar(),
			'diproses' => $this->m_tr_jual->cust_diproses(),
			'dikirim' => $this->m_tr_jual->cust_dikirim(),
			'selesai' => $this->m_tr_jual->cust_selesai(),
			'isi' => 'transaksi/jual/v_daftar_transaksi'
		);

		$this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//transaksi pembayaran di pelanggan
	public function cust_tr_bayar($tj_id)
	{

		$this->form_validation->set_rules('tj_atas_nama', 'Atas Nama', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('tj_nama_bank', 'Nama Bank', 'required', array('required' => '%s Harus Diisi!'));
		$this->form_validation->set_rules('tj_no_rek', 'No Rekening', 'required', array('required' => '%s Harus Diisi!'));

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2000';
            
            $this->upload->initialize($config);
            $field_name = 'tj_bukti_bayar';

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'transaksi' 	=> $this->m_tr_jual->detail_transaksi($tj_id),
					'rekening' 		=> $this->m_tr_jual->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'transaksi/bayar/v_tr_bayar'
                ); 
        
                $this->load->view('layout_home/v_wrapper', $data, FALSE);
            }
            else {
                $upload_data = array ('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'tj_id'         	=> $tj_id ,
                    'tj_atas_nama'		=> $this->input->post('tj_atas_nama') ,
                    'tj_nama_bank' 		=> $this->input->post('tj_nama_bank') ,
                    'tj_no_rek' 		=> $this->input->post('tj_no_rek') ,
                    'tj_bukti_bayar'	=> $upload_data['uploads']['file_name'],
                    'tj_status'     	=> '2'
                );
                $this->m_tr_jual->upload_buktibayar($data);
                // $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Diupload!');
                redirect('c_tr_jual/daftar_transaksi');
            }
        } 

		$data = array(
			'isi' => 'transaksi/bayar/v_tr_bayar',
			'transaksi' => $this->m_tr_jual->detail_transaksi($tj_id),
			'rekening' 	=> $this->m_tr_jual->rekening()
		);

		$this->load->view('layout_home/v_wrapper', $data, FALSE);
	}

	//ubah status di pelannggan
	public function selesai($tj_id)
	{
		$data = array(
			'tj_id' => $tj_id,
			'tj_status' => '0'			
		);
		$this->m_tr_jual->update_status($data);
		$this->session->set_flashdata('pesan', 'Pesanan Selesai !');

		redirect('c_tr_jual/daftar_transaksi');
	}
}

?>