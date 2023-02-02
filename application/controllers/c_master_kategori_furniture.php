<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_kategori_furniture extends CI_Controller {

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
            $this->load->model('m_master_kategori_furniture');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'kategori_furniture' => $this->m_master_kategori_furniture->get_all_data(),
            'isi' => 'master/kategori_furniture/v_master_kategori_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "KF";

        $this->form_validation->set_rules('kf_nama', 'Kategori Furniture', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_kategori_furniture->autoID();

            $data = array(
                'kf_id'         => $kodeID.$id,
                'kf_nama'       => $this->input->post('kf_nama') ,
                'kf_status'     => 1
            );
            $this->m_master_kategori_furniture->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_kategori_furniture');
        }

        $data = array(
            'isi' => 'master/kategori_furniture/v_master_kategori_furniture_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($kf_id)
    {
        $this->form_validation->set_rules('kf_nama', 'Kategori Furniture', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'kf_id'         => $kf_id,
                'kf_nama'       => $this->input->post('kf_nama') ,
                'kf_status'     => 1
            );
            $this->m_master_kategori_furniture->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_kategori_furniture');
        }

        $data = array(
            'kategori_furniture' => $this->m_master_kategori_furniture->get_data($kf_id),
            'isi' => 'master/kategori_furniture/v_master_kategori_furniture_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($kf_id)
    {
        $data = array(
            'kf_id'         => $kf_id,
            'kf_status'     => 0
        );
        
        $this->m_master_kategori_furniture->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_kategori_furniture');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'kategori_furniture'=> $this-> m_master_kategori_furniture -> search($search),
            'isi' => 'master/kategori_furniture/v_master_kategori_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>