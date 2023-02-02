<?php

class M_home extends CI_Model{
    //menampilkan semua data furniture yang ada
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_furniture');
        $this->db->join('tb_brand_furniture', 'tb_brand_furniture.bf_id = tb_furniture.bf_id', 'left');
        $this->db->join('tb_kategori_furniture', 'tb_kategori_furniture.kf_id = tb_furniture.kf_id', 'left');
        $this->db->where('fn_status', '1');
        $this->db->order_by('fn_id', 'asc');
        return $this->db->get()->result();
    }
    
    //menampilkan detail furniture yang di klik
    public function detail_furniture($fn_id)
    {
        $this->db->select('*');
        $this->db->from('tb_furniture');
        $this->db->join('tb_brand_furniture', 'tb_brand_furniture.bf_id = tb_furniture.bf_id', 'left');
        $this->db->join('tb_kategori_furniture', 'tb_kategori_furniture.kf_id = tb_furniture.kf_id', 'left');
        $this->db->where('fn_id', $fn_id);
        return $this->db->get()->row();
    }

    //get semua data kategori furniture yang ada
    public function get_all_data_kategori(){
        $this->db->select('*');
        $this->db->from('tb_kategori_furniture');
        $this->db->where('kf_status', '1');
        $this->db->order_by('kf_id', 'asc');
        return $this->db->get()->result();
    }

    //get semua data brand furniture yang ada
    public function get_all_data_brand(){
        $this->db->select('*');
        $this->db->from('tb_brand_furniture');
        $this->db->where('bf_status', '1');
        $this->db->order_by('bf_id', 'asc');
        return $this->db->get()->result();
    }

    //menampilkan kategori furniture by id
    public function list_kategori($kf_id){
        $this->db->select('*');
        $this->db->from('tb_kategori_furniture');
        $this->db->where('kf_id', $kf_id);
        $this->db->order_by('kf_id', 'asc');
        return $this->db->get()->row();
    }

     //menampilkan semua data kategori furniture yang ada
    public function get_all_data_list_kategori($kf_id){
        $where = array('fn_status' => '1', 'kf_id' => $kf_id);
        $this->db->select('*');
        $this->db->from('tb_furniture');
        //$this->db->join('tb_brand_furniture', 'tb_brand_furniture.bf_id = tb_furniture.bf_id', 'left');
        //$this->db->join('tb_kategori_furniture', 'tb_kategori_furniture.kf_id = tb_furniture.kf_id', 'left');
        $this->db->where($where);
        $this->db->order_by('fn_id', 'asc');
        return $this->db->get()->result();
    }

    //menampilkan brand furniture by id
    public function list_brand($bf_id){
        $this->db->select('*');
        $this->db->from('tb_brand_furniture');
        $this->db->where('bf_id', $bf_id);
        $this->db->order_by('bf_id', 'asc');
        return $this->db->get()->row();
    }

     //menampilkan semua data brand furniture yang ada
    public function get_all_data_list_brand($bf_id){
        $where = array('fn_status' => '1', 'bf_id' => $bf_id);
        $this->db->select('*');
        $this->db->from('tb_furniture');
        // $this->db->join('tb_brand_furniture', 'tb_brand_furniture.bf_id = tb_furniture.bf_id', 'left');
        // $this->db->join('tb_kategori_furniture', 'tb_kategori_furniture.kf_id = tb_furniture.kf_id', 'left');
        $this->db->where($where);
        $this->db->order_by('fn_id', 'asc');
        return $this->db->get()->result();
    }

    //add ke database registrasi pelanggan baru
    public function add($data){
        $this->db->insert('tb_pelanggan', $data);
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(pl_id,5)) AS lastID FROM tb_pelanggan");
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

    //update data pelanggan
    public function edit($data){
        $this->db->where('pl_id', $data['pl_id']);
        $this->db->update('tb_pelanggan', $data);
    }

    //get data pelanggan by id
    public function get_data($pl_id){
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('pl_id', $pl_id);
        return $this->db->get()->row();
    }
}

?>