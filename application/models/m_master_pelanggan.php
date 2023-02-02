<?php

class M_master_pelanggan extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('pl_status', '1');
        $this->db->order_by('pl_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($pl_id){
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('pl_id', $pl_id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_pelanggan', $data);
    }

    public function edit($data){
        $this->db->where('pl_id', $data['pl_id']);
        $this->db->update('tb_pelanggan', $data);
    }

    public function delete($data){
        $this->db->where('pl_id', $data['pl_id']);
        $this->db->update('tb_pelanggan', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('pl_status', '1');
        $this->db->like('pl_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('pl_id', $data)->get('tb_pelanggan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
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
}

?>