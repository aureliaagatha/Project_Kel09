<?php

class M_master_kategori_furniture extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_kategori_furniture');
        $this->db->where('kf_status', '1');
        $this->db->order_by('kf_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($kf_id){
        $this->db->select('*');
        $this->db->from('tb_kategori_furniture');
        $this->db->where('kf_id', $kf_id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_kategori_furniture', $data);
    }

    public function edit($data){
        $this->db->where('kf_id', $data['kf_id']);
        $this->db->update('tb_kategori_furniture', $data);
    }

    public function delete($data){
        $this->db->where('kf_id', $data['kf_id']);
        $this->db->update('tb_kategori_furniture', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_kategori_furniture');
        $this->db->where('kf_status', '1');
        $this->db->like('kf_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('kf_id', $data)->get('tb_kategori_furniture');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(kf_id,5)) AS lastID FROM tb_kategori_furniture");
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
}

?>