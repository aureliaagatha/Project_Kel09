<?php

class M_auth extends CI_Model{

    public function cek_login_karyawan()
    {
        $ky_username = set_value('ky_username');
        $ky_password = set_value('ky_password');

        $result      = $this->db->where('ky_username',$ky_username)
                                ->where('ky_password',$ky_password)
                                ->limit(1)
                                ->get('tb_karyawan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function cek_login_pelanggan()
    {
        $pl_username = set_value('pl_username');
        $pl_password = set_value('pl_password');

        $result      = $this->db->where('pl_username',$pl_username)
                                ->where('pl_password',$pl_password)
                                ->limit(1)
                                ->get('tb_pelanggan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
}