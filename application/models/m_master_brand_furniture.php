<?php

class M_master_brand_furniture extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_brand_furniture');
        $this->db->where('bf_status', '1');
        $this->db->order_by('bf_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($bf_id){
        $this->db->select('*');
        $this->db->from('tb_brand_furniture');
        $this->db->where('bf_id', $bf_id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_brand_furniture', $data);
    }

    public function edit($data){
        $this->db->where('bf_id', $data['bf_id']);
        $this->db->update('tb_brand_furniture', $data);
    }

    public function delete($data){
        $this->db->where('bf_id', $data['bf_id']);
        $this->db->update('tb_brand_furniture', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_brand_furniture');
        $this->db->where('bf_status', '1');
        $this->db->like('bf_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('bf_id', $data)->get('tb_brand_furniture');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(bf_id,5)) AS lastID FROM tb_brand_furniture");
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