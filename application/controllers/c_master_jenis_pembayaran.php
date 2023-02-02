<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_jenis_pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //cek session
        if($this->session->userdata('ps_id') != 'PS00001'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<span class="alert-text"><strong>Warning!</strong> Anda belum login!</span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('c_auth/login');
		}else{
            //Load Dependencies
            $this->load->model('m_master_jenis_pembayaran');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'jenis_pembayaran' => $this->m_master_jenis_pembayaran->get_all_data(),
            'isi' => 'master/jenis_pembayaran/v_master_jenis_pembayaran'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "JB";

        $this->form_validation->set_rules('jb_nama', 'Nama Rekening', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('jb_nomor', 'Nomor Rekening', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_jenis_pembayaran->autoID();

            $data = array(
                'jb_id'       => $kodeID.$id,
                'jb_nama'     => $this->input->post('jb_nama') ,
                'jb_nomor'    => $this->input->post('jb_nomor') ,
                'jb_status'   => 1
            );
            $this->m_master_jenis_pembayaran->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_jenis_pembayaran');
        }

        $data = array(
            'isi' => 'master/jenis_pembayaran/v_master_jenis_pembayaran_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($jb_id)
    {
        $this->form_validation->set_rules('jb_nama', 'Nama Rekening', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('jb_nomor', 'Nomor Rekening', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'jb_id'       => $jb_id,
                'jb_nama'     => $this->input->post('jb_nama') ,
                'jb_nomor'    => $this->input->post('jb_nomor') ,
                'jb_status'   => 1
            );
            $this->m_master_jenis_pembayaran->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_jenis_pembayaran');
        }

        $data = array(
            'jenis_pembayaran' => $this->m_master_jenis_pembayaran->get_data($jb_id),
            'isi' => 'master/jenis_pembayaran/v_master_jenis_pembayaran_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($jb_id)
    {
        $data = array(
            'jb_id'         => $jb_id,
            'jb_status'     => 0
        );
        
        $this->m_master_jenis_pembayaran->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_jenis_pembayaran');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'jenis_pembayaran'=> $this-> m_master_jenis_pembayaran -> search($search),
            'isi' => 'master/jenis_pembayaran/v_master_jenis_pembayaran'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Detail item
    public function detail($jb_id)
    {
        $data = array(
            'jenis_pembayaran'=> $this-> m_master_jenis_pembayaran -> detail($jb_id),
            'isi' => 'master/jenis_pembayaran/v_master_jenis_pembayaran_detail'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>