<?php

class C_auth extends CI_Controller{
    public function login_karyawan()
    {
        $this->form_validation->set_rules('ky_username','Username','required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('ky_password','Password','required', [
            'required' => 'Password wajib diisi!'
        ]);

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('login_karyawan');
        }else{
            $auth = $this->m_auth->cek_login_karyawan();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                Username atau Password Salah!
                </div>');
                redirect('c_auth/login_karyawan');
            }else{            
                if($auth){
                    $this->session->set_userdata('ky_id', $auth->ky_id);
                    $this->session->set_userdata('ky_username', $auth->ky_username);
                    $this->session->set_userdata('ky_nama', $auth->ky_nama);
                    $this->session->set_userdata('ps_id', $auth->ps_id);
                    $this->session->set_userdata('ky_status', $auth->ky_status);

                    if($auth->ky_status == 1)
                    {                     
                        if($auth->ps_id == 'PS00002'){
                            redirect('c_manager');
                        }else if($auth->ps_id == 'PS00001'){
                            redirect('c_admin');
                        }else if($auth->ps_id == 'PS00003'){
                            redirect('c_kurir');
                        }
                    }else{
                        $this->session->setAlert('pesan');
                    }
                }else{
                    $this->setAlert('User is not registered!', 'danger');
                    redirect('c_auth/login_karyawan');
                }
            }
        }
    }

    public function login_pelanggan()
    {
        $this->form_validation->set_rules('pl_username','Username','required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('pl_password','Password','required', [
            'required' => 'Password wajib diisi!'
        ]);

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('login_pelanggan');
        }else{
            $auth = $this->m_auth->cek_login_pelanggan();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                Username atau Password Salah!
                </div>');
                redirect('c_auth/login_pelanggan');
            }else{            
                if($auth){
                    $this->session->set_userdata('pl_id', $auth->pl_id);
                    $this->session->set_userdata('pl_username', $auth->pl_username);
                    $this->session->set_userdata('pl_nama', $auth->pl_nama);
                    $this->session->set_userdata('pl_status', $auth->pl_status);

                    if($auth->pl_status == 1)
                    {                     
                        redirect('c_home');
                    }else{
                        $this->session->setAlert('pesan');
                    }
                }else{
                    $this->setAlert('User is not registered!', 'danger');
                    redirect('c_auth/login_pelanggan');
                }
            }
        }
    }

    public function logout_karyawan()
    {
        $this->session->sess_destroy();
        redirect('c_auth/login_karyawan');
    }

    public function logout_pelanggan()
    {
        $this->session->sess_destroy();
        redirect('c_auth/login_pelanggan');
    }

    private function setAlert($message, $type)
    {
        $this->session->set_flashdata('message', "<div class='alert alert-$type role='alert'>
            <small>$message</small>
        </div>");
    }
}