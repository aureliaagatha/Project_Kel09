<?php

class M_master_vendor extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_vendor');
        $this->db->where('vn_status', '1');
        $this->db->order_by('vn_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($vn_id){
        $this->db->select('*');
        $this->db->from('tb_vendor');
        $this->db->where('vn_id', $vn_id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_vendor', $data);
    }

    public function edit($data){
        $this->db->where('vn_id', $data['vn_id']);
        $this->db->update('tb_vendor', $data);
    }

    public function delete($data){
        $this->db->where('vn_id', $data['vn_id']);
        $this->db->update('tb_vendor', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_vendor');
        $this->db->where('vn_status', '1');
        $this->db->like('vn_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('vn_id', $data)->get('tb_vendor');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(vn_id,5)) AS lastID FROM tb_vendor");
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