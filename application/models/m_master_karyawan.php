<?php

class M_master_karyawan extends CI_Model{
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->join('tb_posisi', 'tb_posisi.ps_id = tb_karyawan.ps_id', 'left');
        $this->db->where('ky_status', '1');
        $this->db->order_by('ky_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($ky_id){
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->join('tb_posisi', 'tb_posisi.ps_id = tb_karyawan.ps_id', 'left');
        $this->db->where('ky_id', $ky_id);
        return $this->db->get()->row();
    }

    public function getAllPosisi()
    {
        return $this->db->get_where("tb_posisi", ["ps_status" => 1 || 0])->result();
    }

    public function add($data){
        $this->db->insert('tb_karyawan', $data);
    }

    public function edit($data){
        $this->db->where('ky_id', $data['ky_id']);
        $this->db->update('tb_karyawan', $data);
    }

    public function delete($data){
        $this->db->where('ky_id', $data['ky_id']);
        $this->db->update('tb_karyawan', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->where('ky_status', '1');
        $this->db->like('ky_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('ky_id', $data)->get('tb_karyawan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(ky_id,5)) AS lastID FROM tb_karyawan");
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