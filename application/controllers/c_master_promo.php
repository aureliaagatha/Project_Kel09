<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_promo extends CI_Controller {

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
            $this->load->model('m_master_promo');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'promo' => $this->m_master_promo->get_all_data(),
            'isi' => 'master/promo/v_master_promo'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "PR";

        $this->form_validation->set_rules('pr_nama', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pr_deksripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pr_jumlah', 'Jumlah', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pr_kode', 'Kode Promo', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_promo->autoID();

            $data = array(
                'pr_id'         => $kodeID.$id,
                'pr_nama'       => $this->input->post('pr_nama') ,
                'pr_deksripsi'    => $this->input->post('pr_deksripsi') ,
                'pr_jumlah'      => $this->input->post('pr_jumlah') ,
                'pr_kode'     => $this->input->post('pr_kode') ,
                'pr_status'     => 1
            );
            $this->m_master_promo->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_promo');
        }

        $data = array(
            'isi' => 'master/promo/v_master_promo_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($pr_id)
    {
        $this->form_validation->set_rules('pr_nama', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pr_deksripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pr_jumlah', 'Jumlah', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pr_kode', 'Kode Promo', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'pr_id'         => $pr_id,
                'pr_nama'       => $this->input->post('pr_nama') ,
                'pr_deksripsi'    => $this->input->post('pr_deksripsi') ,
                'pr_jumlah'      => $this->input->post('pr_jumlah') ,
                'pr_kode'     => $this->input->post('pr_kode') ,
                'pr_status'     => 1
            );
            $this->m_master_promo->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_promo');
        }

        $data = array(
            'promo' => $this->m_master_promo->get_data($pr_id),
            'isi' => 'master/promo/v_master_promo_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($pr_id)
    {
        $data = array(
            'pr_id'         => $pr_id,
            'pr_status'     => 0
        );
        
        $this->m_master_promo->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_promo');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'promo'=> $this-> m_master_promo -> search($search),
            'isi' => 'master/promo/v_master_promo'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Detail item
    public function detail($pr_id)
    {
        $data = array(
            'promo'=> $this-> m_master_promo -> detail($pr_id),
            'isi' => 'master/promo/v_master_promo_detail'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>