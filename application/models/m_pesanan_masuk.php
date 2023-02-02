<?php

class M_pesanan_masuk extends CI_Model
{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->where('ps_id', 'PS00003');
        $this->db->order_by('ky_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($ky_id){
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->where('ky_id', $ky_id);
        return $this->db->get()->row();
    }

    public function getAllKaryawan()
    {
        return $this->db->get_where("tb_karyawan", ["ky_status" => 1 || 0])->result();
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(tb_id,5)) AS lastID FROM tb_tr_beli");
        $generateID = "";
        if($checkID->num_rows()>0){
            foreach($checkID->result() as $resultID){
                $tmp = ((int)$resultID->lastID)+1;
                $generateID = sprintf("%05s", $tmp);
            }
        }else{
            $generateID = "00001";
        }
        return $generateID;
    }
    
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        // $this->db->where('tj_status=1');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        // $this->db->where('tj_status=3');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where('tj_status=4');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        // $this->db->where('tj_status=5');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function detail_pengiriman($tj_id)
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where('tj_id', $tj_id);
        return  $this->db->get()->row();
    }

    public function update_order($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('tb_tr_jual', $data);        
    }

    public function update_kirim($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('tb_tr_jual', $data);        
    }
}