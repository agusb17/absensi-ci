<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function registeruser($data)
    {
        $this->db->insert('user', $data);
    }

    public function getKaryawan() {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getRekapHarian() {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->group_by('date');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapPerMinggu($start_date, $end_date) {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $query = $this->db->get();
        return $query->result();
    }

    // public function getRekapMingguan() {
    //     $query = $this->db->query("SELECT WEEK(tanggal) as minggu, COUNT(*) as total_absensi FROM absensi GROUP BY minggu");
    //     return $query->result_array();
    // }

    public function getRekapPerBulan($bulan) {
        $this->db->select('MONTH(date) as bulan, COUNT(*) as total_absensi');
        $this->db->from('absensi');
        $this->db->where('MONTH(date)', $bulan); // Menyaring data berdasarkan bulan
        $this->db->group_by('bulan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRekapHarianByBulan($bulan) {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('MONTH(absensi.date)', $bulan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function exportDataKaryawan() {
    }

    public function exportDataRekapHarian() {
    }

    public function exportDataRekapMingguan() {
    }

    public function exportDataRekapBulanan() {
    }
}