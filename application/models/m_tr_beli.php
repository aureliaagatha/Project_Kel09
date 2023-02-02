<?php

class M_tr_beli extends CI_Model{
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

    //get vendor dari database
    public function getAllVendor()
    {
        return $this->db->get_where("tb_vendor", ["vn_status" => 1 || 0])->result();
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

    //save ke database transaksi beli
    public function simpan_transaksi($data){
        $this->db->insert('tb_tr_beli', $data);
    }

    //save ke database detail transaksi beli
    public function simpan_detail_transaksi($detail){
        $this->db->insert('tb_detail_beli', $detail);
    }

    //update stok
    public function stok_transaksi($jumlah, $fn_id){
        $this->db->query("update tb_furniture set fn_stok=fn_stok + $jumlah where fn_id = '$fn_id'");
    }
}

?>