<?php

class M_master_posisi extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_posisi');
        $this->db->where('ps_status', '1');
        $this->db->order_by('ps_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($ps_id){
        $this->db->select('*');
        $this->db->from('tb_posisi');
        $this->db->where('ps_id', $ps_id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_posisi', $data);
    }

    public function edit($data){
        $this->db->where('ps_id', $data['ps_id']);
        $this->db->update('tb_posisi', $data);
    }

    public function delete($data){
        $this->db->where('ps_id', $data['ps_id']);
        $this->db->update('tb_posisi', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_posisi');
        $this->db->where('ps_status', '1');
        $this->db->like('ps_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('ps_id', $data)->get('tb_posisi');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(ps_id,5)) AS lastID FROM tb_posisi");
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