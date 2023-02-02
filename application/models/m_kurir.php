<?php

class M_kurir extends CI_Model
{
    public function kirim()
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        // $this->db->where('tj_status=1');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        // $this->db->where('tj_status=5');
        $this->db->order_by('tj_id', 'asc');
        return $this->db->get()->result();
    }
  
    public function update_pengiriman($data)
    {
        $this->db->where('tj_id', $data['tj_id']);
        $this->db->update('tb_tr_jual', $data);        
    }

    public function detail_pengiriman($tj_id)
    {
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where('tj_id', $tj_id);
        return  $this->db->get()->row();
    }
}