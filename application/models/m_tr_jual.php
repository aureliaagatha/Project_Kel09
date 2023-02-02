<?php

class M_tr_jual extends CI_Model{
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

    //auto id
    function autoID(){
        $checkID = $this->db->query("SELECT MAX(RIGHT(tj_id,5)) AS lastID FROM tb_tr_jual");
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

    //save ke database transaksi jual
    public function simpan_transaksi($data){
        $this->db->insert('tb_tr_jual', $data);
    }

    //save ke database detail transaksi jual
    public function simpan_detail_transaksi($detail){
        $this->db->insert('tb_detail_jual', $detail);
    }

    //update stok
    public function stok_transaksi($jumlah, $fn_id){
        $this->db->query("update tb_furniture set fn_stok=fn_stok - $jumlah where fn_id = '$fn_id'");
    }

    //view pelanggan transaksi belum dibayar
    public function cust_belumbayar(){
        $where = array('tj_status' => '1', 'pl_id' => $this->session->userdata('pl_id'));
        $this->db->select('*');
        $this->db->where( $where);
        $this->db->from('tb_tr_jual');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    //view pelanggan transaksi diproses
    public function cust_diproses(){
        $where = array('pl_id' => $this->session->userdata('pl_id'));
        $this->db->select('*');
        $this->db->where( $where);
        $this->db->from('tb_tr_jual');
        return $this->db->get()->result();
    }

    //view pelanggan transaksi dikirim
    public function cust_dikirim(){
        $where = array('tj_status' => '4', 'pl_id' => $this->session->userdata('pl_id'));
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where( $where);
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    //view pelanggan transaksi dikirim
    public function cust_selesai(){
        $where = array('pl_id' => $this->session->userdata('pl_id'));
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where( $where);
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function detail_transaksi($tj_id)
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where('tj_id', $tj_id);
        return  $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_pembayaran');
        return  $this->db->get()->result();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('tb_tr_jual', $data);
    }

    public function update_status($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('tb_tr_jual', $data);        
    }
}

?>