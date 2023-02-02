<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_karyawan extends CI_Controller {

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
            $this->load->model('m_master_karyawan');
            $this->load->model('m_master_posisi');
        }        
    }

    // List all your items
    public function index()
    {
        $data = array(
            'karyawan' => $this->m_master_karyawan->get_all_data(),
            'isi' => 'master/karyawan/v_master_karyawan'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "KY";

        $ps_nama = $this->m_master_karyawan->getAllPosisi();
		$data['ps_nama'] = $ps_nama;

        $this->form_validation->set_rules('ky_username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_nama', 'Nama karyawan', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));

        
        if ($this->form_validation->run() == TRUE) 
        {
            $id = $this->m_master_karyawan->autoID();
            $upload_data = array ('uploads' => $this->upload->data());
            $data = array(
                'ky_id'         => $kodeID.$id,
                'ky_username'   => $this->input->post('ky_username') ,
                'ky_password'   => $this->input->post('ky_password') ,
                'ky_nama'       => $this->input->post('ky_nama') ,
                'ky_telepon'    => $this->input->post('ky_telepon') ,
                'ky_email'      => $this->input->post('ky_email') ,
                'ky_alamat'     => $this->input->post('ky_alamat') ,
                'ps_id'         => $this->input->post('ps_id') ,
                'ky_status'     => 1
            );
            $this->m_master_karyawan->add($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
            redirect('c_master_karyawan');
        } 

        $data = array(
            'posisi' => $this->m_master_posisi->get_all_data(),
            'isi' => 'master/karyawan/v_master_karyawan_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($ky_id)
    {
        $this->form_validation->set_rules('ky_username', 'Username', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_password', 'Password', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_nama', 'Nama karyawan', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_telepon', 'Telepon', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_email', 'Email', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('ky_alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi!'));
        
        if ($this->form_validation->run() == TRUE) 
        {
            $data = array(
                'ky_id'         => $ky_id,
                'ky_username'   => $this->input->post('ky_username') ,
                'ky_password'   => $this->input->post('ky_password') ,
                'ky_nama'       => $this->input->post('ky_nama') ,
                'ky_telepon'    => $this->input->post('ky_telepon') ,
                'ky_email'      => $this->input->post('ky_email') ,
                'ky_alamat'     => $this->input->post('ky_alamat') ,
                'ps_id'         => $this->input->post('ps_id') ,
                'ky_status'     => 1
            );
            $this->m_master_karyawan->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_karyawan');
        } 
        

        $data = array(
            'posisi' => $this->m_master_posisi->get_all_data(),
            'karyawan' => $this->m_master_karyawan->get_data($ky_id),
            'isi' => 'master/karyawan/v_master_karyawan_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($ky_id)
    {
        $data = array(
            'ky_id'         => $ky_id,
            'ky_status'     => 0
        );
        
        $this->m_master_karyawan->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_karyawan');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'karyawan'=> $this-> m_master_karyawan -> search($search),
            'isi' => 'master/karyawan/v_master_karyawan'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Detail item
    public function detail($ky_id)
    {
        $data = array(
            'posisi' => $this->m_master_posisi->get_all_data(),
            'karyawan'=> $this-> m_master_karyawan -> detail($ky_id),
            'isi' => 'master/karyawan/v_master_karyawan_detail'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>