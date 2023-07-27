<?php

class Karyawan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_data()
    {
        $this->db->select('sdm_user.nik, sdm_user.nama, sdm_user.status, rekap_nilai_karyawan.nilai, rekap_nilai_karyawan.tahun,
            CASE 
                WHEN rekap_nilai_karyawan.nilai <= 20 THEN "D"
                WHEN rekap_nilai_karyawan.nilai <= 40 THEN "C"
                WHEN rekap_nilai_karyawan.nilai <= 60 THEN "B"
                WHEN rekap_nilai_karyawan.nilai <= 80 THEN "A"
                WHEN rekap_nilai_karyawan.nilai <= 100 THEN "S"
            END AS grade', false);

        $this->db->from('sdm_user');
        $this->db->join('rekap_nilai_karyawan', 'sdm_user.id = rekap_nilai_karyawan.id_user');

        $query = $this->db->get();
        return $query->result();
    }
}