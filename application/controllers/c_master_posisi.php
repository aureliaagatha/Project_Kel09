<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_posisi extends CI_Controller {

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
            $this->load->model('m_master_posisi');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'posisi' => $this->m_master_posisi->get_all_data(),
            'isi' => 'master/posisi/v_master_posisi'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "PS";

        $this->form_validation->set_rules('ps_nama', 'Posisi', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_posisi->autoID();

            $data = array(
                'ps_id'         => $kodeID.$id,
                'ps_nama'       => $this->input->post('ps_nama') ,
                'ps_status'     => 1
            );
            $this->m_master_posisi->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_posisi');
        }

        $data = array(
            'isi' => 'master/posisi/v_master_posisi_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($ps_id)
    {
        $this->form_validation->set_rules('ps_nama', 'Posisi', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'ps_id'         => $ps_id,
                'ps_nama'       => $this->input->post('ps_nama') ,
                'ps_status'     => 1
            );
            $this->m_master_posisi->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_posisi');
        }

        $data = array(
            'posisi' => $this->m_master_posisi->get_data($ps_id),
            'isi' => 'master/posisi/v_master_posisi_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($ps_id)
    {
        $data = array(
            'ps_id'         => $ps_id,
            'ps_status'     => 0
        );
        
        $this->m_master_posisi->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_posisi');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'posisi'=> $this-> m_master_posisi -> search($search),
            'isi' => 'master/posisi/v_master_posisi'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>