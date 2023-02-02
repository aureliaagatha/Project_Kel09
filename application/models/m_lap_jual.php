<?php

class M_lap_jual extends CI_Model{
    //menampilkan semua data furniture yang ada
    public function get_data($bulan, $tahun){
        $this->db->select('*');
        $this->db->from('tb_tr_jual');
        $this->db->where('MONTH(tj_tanggal)', $bulan);
        $this->db->where('YEAR(tj_tanggal)', $tahun);
        $this->db->where('tj_status', 0);
        return $this->db->get()->result();
    }
}

?>