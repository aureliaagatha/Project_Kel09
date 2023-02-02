<?php

class M_master_furniture extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_all_data(){
        $this->db->select('*');
        $this->db->from('tb_furniture');
        $this->db->join('tb_brand_furniture', 'tb_brand_furniture.bf_id = tb_furniture.bf_id', 'left');
        $this->db->join('tb_kategori_furniture', 'tb_kategori_furniture.kf_id = tb_furniture.kf_id', 'left');
        $this->db->where('fn_status', '1');
        $this->db->order_by('fn_id', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($fn_id){
        $this->db->select('*');
        $this->db->from('tb_furniture');
        $this->db->join('tb_brand_furniture', 'tb_brand_furniture.bf_id = tb_furniture.bf_id', 'left');
        $this->db->join('tb_kategori_furniture', 'tb_kategori_furniture.kf_id = tb_furniture.kf_id', 'left');
        $this->db->where('fn_id', $fn_id);
        return $this->db->get()->row();
    }

    public function getAllKategori()
    {
        return $this->db->get_where("tb_kategori_furniture", ["kf_status" => 1 || 0])->result();
    }
    public function getAllBrand()
    {
        return $this->db->get_where("tb_brand_furniture", ["bf_status" => 1 || 0])->result();
    }

    public function add($data){
        $this->db->insert('tb_furniture', $data);
    }

    public function edit($data){
        $this->db->where('fn_id', $data['fn_id']);
        $this->db->update('tb_furniture', $data);
    }

    public function delete($data){
        $this->db->where('fn_id', $data['fn_id']);
        $this->db->update('tb_furniture', $data);
    }

    public function search($search){
        $this->db->select('*');
        $this->db->from('tb_furniture');
        $this->db->where('fn_status', '1');
        $this->db->like('fn_nama', $search);
        return $this->db->get()->result();
    }

    public function detail($data){
        $result = $this->db->where('fn_id', $data)->get('tb_furniture');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
    
    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(fn_id,5)) AS lastID FROM tb_furniture");
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