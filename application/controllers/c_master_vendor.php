<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_vendor extends CI_Controller {

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
            $this->load->model('m_master_vendor');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'vendor' => $this->m_master_vendor->get_all_data(),
            'isi' => 'master/vendor/v_master_vendor'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "VN";

        $this->form_validation->set_rules('vn_nama', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('vn_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('vn_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('vn_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
        //$this->form_validation->set_rules('vn_telepon', 'Telepon', array('max_length[13]' => '%s Maksimal 13 Angka!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_vendor->autoID();

            $data = array(
                'vn_id'         => $kodeID.$id,
                'vn_nama'       => $this->input->post('vn_nama') ,
                'vn_telepon'    => $this->input->post('vn_telepon') ,
                'vn_email'      => $this->input->post('vn_email') ,
                'vn_alamat'     => $this->input->post('vn_alamat') ,
                'vn_status'     => 1
            );
            $this->m_master_vendor->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_vendor');
        }

        $data = array(
            'isi' => 'master/vendor/v_master_vendor_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($vn_id)
    {
        $this->form_validation->set_rules('vn_nama', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('vn_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('vn_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('vn_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'vn_id'         => $vn_id,
                'vn_nama'       => $this->input->post('vn_nama') ,
                'vn_telepon'    => $this->input->post('vn_telepon') ,
                'vn_email'      => $this->input->post('vn_email') ,
                'vn_alamat'     => $this->input->post('vn_alamat') ,
                'vn_status'     => 1
            );
            $this->m_master_vendor->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_vendor');
        }

        $data = array(
            'vendor' => $this->m_master_vendor->get_data($vn_id),
            'isi' => 'master/vendor/v_master_vendor_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($vn_id)
    {
        $data = array(
            'vn_id'         => $vn_id,
            'vn_status'     => 0
        );
        
        $this->m_master_vendor->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_vendor');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'vendor'=> $this-> m_master_vendor -> search($search),
            'isi' => 'master/vendor/v_master_vendor'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Detail item
    public function detail($vn_id)
    {
        $data = array(
            'vendor'=> $this-> m_master_vendor -> detail($vn_id),
            'isi' => 'master/vendor/v_master_vendor_detail'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>