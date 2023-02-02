<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_furniture extends CI_Controller {

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
            $this->load->model('m_master_furniture');
            $this->load->model('m_master_kategori_furniture');
            $this->load->model('m_master_brand_furniture');
        }
    }

    // List all your items
    public function index()
    {
        $data = array(
            'furniture' => $this->m_master_furniture->get_all_data(),
            'isi' => 'master/furniture/v_master_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $kodeID = "FN";

        // Set ddl fk dari brand// Set ddl fk dari brand
		$kf_nama = $this->m_master_furniture->getAllKategori();
		$data['kf_nama'] = $kf_nama;

		$bf_nama = $this->m_master_furniture->getAllBrand();
		$data['bf_nama'] = $bf_nama;

        $this->form_validation->set_rules('fn_nama', 'Nama Furniture', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_harga_beli', 'Harga Beli', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_harga_jual', 'Harga Jual', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_stok', 'Stok', 'required', array('required' => '%s Harus Diisi!'));
        // $this->form_validation->set_rules('kf_id', 'Kategori', 'required', array('required' => '%s Harus Diisi!'));
        // $this->form_validation->set_rules('bf_id', 'Brand', 'required', array('required' => '%s Harus Diisi!'));

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2000';
            
            $this->upload->initialize($config);
            $field_name = "fn_gambar";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'kategori' => $this->m_master_kategori_furniture->get_all_data(),
                    'brand' => $this->m_master_brand_furniture->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'master/furniture/v_master_furniture_add'
                ); 
        
                $this->load->view('layout_admin/v_wrapper', $data, FALSE);
            }
            else {
                $id = $this->m_master_furniture->autoID();
                $upload_data = array ('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/image/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'fn_id'         => $kodeID.$id ,
                    'fn_nama'       => $this->input->post('fn_nama') ,
                    'fn_deskripsi'  => $this->input->post('fn_deskripsi') ,
                    'fn_harga_beli' => $this->input->post('fn_harga_beli') ,
                    'fn_harga_jual' => $this->input->post('fn_harga_jual') ,
                    'fn_stok'       => $this->input->post('fn_stok') ,
                    'fn_gambar'     => $upload_data['uploads']['file_name'],
                    'kf_id'         => $this->input->post('kf_id') ,
                    'bf_id'         => $this->input->post('bf_id'),
                    'fn_status'     => 1
                );
                $this->m_master_furniture->add($data);
                //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan.');
                redirect('c_master_furniture');
            }
        } 
        

        $data = array(
            'kategori' => $this->m_master_kategori_furniture->get_all_data(),
            'brand' => $this->m_master_brand_furniture->get_all_data(),
            'isi' => 'master/furniture/v_master_furniture_add'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Update one item
    public function edit($fn_id)
    {
        $this->form_validation->set_rules('fn_nama', 'Nama Furniture', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_harga_beli', 'Harga Beli', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_harga_jual', 'Harga Jual', 'required', array('required' => '%s Harus Diisi!'));
        $this->form_validation->set_rules('fn_stok', 'Stok', 'required', array('required' => '%s Harus Diisi!'));
        // $this->form_validation->set_rules('kf_id', 'Kategori', 'required', array('required' => '%s Harus Diisi!'));
        // $this->form_validation->set_rules('bf_id', 'Brand', 'required', array('required' => '%s Harus Diisi!'));

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/image/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '2000';
            
            $this->upload->initialize($config);
            $field_name = "fn_gambar";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'kategori' => $this->m_master_kategori_furniture->get_all_data(),
                    'brand' => $this->m_master_brand_furniture->get_all_data(),
                    'furniture' => $this->m_master_furniture->get_data($fn_id),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'master/furniture/v_master_furniture_edit'
                ); 
        
                $this->load->view('layout_admin/v_wrapper', $data, FALSE);
            }
            else {
                $upload_data = array ('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/image/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'fn_id'         => $fn_id,
                    'fn_nama'       => $this->input->post('fn_nama') ,
                    'fn_deskripsi'  => $this->input->post('fn_deskripsi') ,
                    'fn_harga_beli' => $this->input->post('fn_harga_beli') ,
                    'fn_harga_jual' => $this->input->post('fn_harga_jual') ,
                    'fn_stok'       => $this->input->post('fn_stok') ,
                    'fn_gambar'     => $upload_data['uploads']['file_name'],
                    'kf_id'         => $this->input->post('kf_id') ,
                    'bf_id'         => $this->input->post('bf_id'),
                    'fn_status'     => 1
                );
                $this->m_master_furniture->edit($data);
                //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
                redirect('c_master_furniture');
            }

            //tanpa edit gambar
            $data = array(
                'fn_id'         => $fn_id,
                'fn_nama'       => $this->input->post('fn_nama') ,
                'fn_deskripsi'  => $this->input->post('fn_deskripsi') ,
                'fn_harga_beli' => $this->input->post('fn_harga_beli') ,
                'fn_harga_jual' => $this->input->post('fn_harga_jual') ,
                'fn_stok'       => $this->input->post('fn_stok') ,
                'kf_id'         => $this->input->post('kf_id') ,
                'bf_id'         => $this->input->post('bf_id'),
                'fn_status'     => 1
            );
            $this->m_master_furniture->edit($data);
            //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Diubah.');
            redirect('c_master_furniture');
        } 
        

        $data = array(
            'kategori' => $this->m_master_kategori_furniture->get_all_data(),
            'brand' => $this->m_master_brand_furniture->get_all_data(),
            'furniture' => $this->m_master_furniture->get_data($fn_id),
            'isi' => 'master/furniture/v_master_furniture_edit'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Delete one item
    public function delete($fn_id)
    {
        $data = array(
            'fn_id'         => $fn_id,
            'fn_status'     => 0
        );
        
        $this->m_master_furniture->delete($data);
        //$this->session->$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus.');
        redirect('c_master_furniture');
    }

    //Search item
    public function search()
    {
        $search = $this->input->post('keyword');

        $data = array(
            'furniture'=> $this-> m_master_furniture -> search($search),
            'isi' => 'master/furniture/v_master_furniture'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }

    //Detail item
    public function detail($fn_id)
    {
        $data = array(
            'kategori' => $this->m_master_kategori_furniture->get_all_data(),
            'brand' => $this->m_master_brand_furniture->get_all_data(),
            'furniture'=> $this-> m_master_furniture -> detail($fn_id),
            'isi' => 'master/furniture/v_master_furniture_detail'
        );

        $this->load->view('layout_admin/v_wrapper', $data, FALSE);
    }
}

?>