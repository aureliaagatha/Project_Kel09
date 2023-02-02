<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_brand_furniture extends CI_Controller {

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
            $this->load->model('m_master_brand_furniture');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'brand_furniture' => $this->m_master_brand_furniture->get_all_data(),
            'isi' => 'master/brand_furniture/v_master_brand_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "BF";

        $this->form_validation->set_rules('bf_nama', 'Brand Furniture', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_brand_furniture->autoID();

            $data = array(
                'bf_id'         => $kodeID.$id,
                'bf_nama'       => $this->input->post('bf_nama') ,
                'bf_status'     => 1
            );
            $this->m_master_brand_furniture->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_brand_furniture');
        }

        $data = array(
            'isi' => 'master/brand_furniture/v_master_brand_furniture_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($bf_id)
    {
        $this->form_validation->set_rules('bf_nama', 'Brand Furniture', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'bf_id'         => $bf_id,
                'bf_nama'       => $this->input->post('bf_nama') ,
                'bf_status'     => 1
            );
            $this->m_master_brand_furniture->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_brand_furniture');
        }

        $data = array(
            'brand_furniture' => $this->m_master_brand_furniture->get_data($bf_id),
            'isi' => 'master/brand_furniture/v_master_brand_furniture_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($bf_id)
    {
        $data = array(
            'bf_id'         => $bf_id,
            'bf_status'     => 0
        );
        
        $this->m_master_brand_furniture->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_brand_furniture');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'brand_furniture'=> $this-> m_master_brand_furniture -> search($search),
            'isi' => 'master/brand_furniture/v_master_brand_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>