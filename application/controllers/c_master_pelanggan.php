<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_pelanggan extends CI_Controller {

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
            $this->load->model('m_master_pelanggan');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'pelanggan' => $this->m_master_pelanggan->get_all_data(),
            'isi' => 'master/pelanggan/v_master_pelanggan'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "PL";

        $this->form_validation->set_rules('pl_username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_nama', 'Nama', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
        //$this->form_validation->set_rules('pl_telepon', 'Telepon', array('max_length[13]' => '%s Maksimal 13 Angka!'));
        
        if ($this->form_validation->run() == TRUE) {
            $id = $this->m_master_pelanggan->autoID();

            $data = array(
                'pl_id'         => $kodeID.$id,
                'pl_username'   => $this->input->post('pl_username') ,
                'pl_password'   => $this->input->post('pl_password') ,
                'pl_nama'       => $this->input->post('pl_nama') ,
                'pl_telepon'    => $this->input->post('pl_telepon') ,
                'pl_email'      => $this->input->post('pl_email') ,
                'pl_alamat'     => $this->input->post('pl_alamat') ,
                'pl_status'     => 1
            );
            $this->m_master_pelanggan->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_pelanggan');
        }

        $data = array(
            'isi' => 'master/pelanggan/v_master_pelanggan_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($pl_id)
    {
        $this->form_validation->set_rules('pl_username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_nama', 'Nama Pelanggan', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('pl_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'pl_id'         => $pl_id,
                'pl_username'   => $this->input->post('pl_username') ,
                'pl_password'   => $this->input->post('pl_password') ,
                'pl_nama'       => $this->input->post('pl_nama') ,
                'pl_telepon'    => $this->input->post('pl_telepon') ,
                'pl_email'      => $this->input->post('pl_email') ,
                'pl_alamat'     => $this->input->post('pl_alamat') ,
                'pl_status'     => 1
            );
            $this->m_master_pelanggan->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_pelanggan');
        }

        $data = array(
            'pelanggan' => $this->m_master_pelanggan->get_data($pl_id),
            'isi' => 'master/pelanggan/v_master_pelanggan_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($pl_id)
    {
        $data = array(
            'pl_id'         => $pl_id,
            'pl_status'     => 0
        );
        
        $this->m_master_pelanggan->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_pelanggan');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'pelanggan'=> $this-> m_master_pelanggan -> search($search),
            'isi' => 'master/pelanggan/v_master_pelanggan'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Detail item
    public function detail($pl_id)
    {
        $data = array(
            'pelanggan'=> $this-> m_master_pelanggan -> detail($pl_id),
            'isi' => 'master/pelanggan/v_master_pelanggan_detail'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>