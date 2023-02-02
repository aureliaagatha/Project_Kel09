<?php

class M_lap_beli extends CI_Model{
    //menampilkan semua data furniture yang ada
    public function get_data($bulan, $tahun){
        $this->db->select('*');
        $this->db->from('tb_tr_beli');
        $this->db->where('MONTH(tb_tanggal)', $bulan);
        $this->db->where('YEAR(tb_tanggal)', $tahun);
        return $this->db->get()->result();
    }
}

?>