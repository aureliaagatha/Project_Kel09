<?php

class M_master_jenis_pembayaran extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_jenis_pembayaran');
        $this->db->where('jb_status', '1');
        $this->db->order_by('jb_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($jb_id){
        $this->db->select('*');
        $this->db->from('tb_jenis_pembayaran');
        $this->db->where('jb_id', $jb_id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_jenis_pembayaran', $data);
    }

    public function edit($data){
        $this->db->where('jb_id', $data['jb_id']);
        $this->db->update('tb_jenis_pembayaran', $data);
    }

    public function delete($data){
        $this->db->where('jb_id', $data['jb_id']);
        $this->db->update('tb_jenis_pembayaran', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_jenis_pembayaran');
        $this->db->where('jb_status', '1');
        $this->db->like('jb_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('jb_id', $data)->get('tb_jenis_pembayaran');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(jb_id,5)) AS lastID FROM tb_jenis_pembayaran");
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